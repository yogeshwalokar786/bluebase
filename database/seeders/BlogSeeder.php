<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Designing Multi-Tenant SaaS Databases with Row-Level Security in PostgreSQL & Laravel',
                'slug' => 'designing-multi-tenant-saas-databases-row-level-security-postgresql-laravel',
                'category' => 'SaaS Architecture',
                'tags' => 'PostgreSQL, Laravel, Multi-Tenancy, Security, Database',
                'author' => 'Alex K.',
                'author_role' => 'Lead Software Architect &bull; Bluebase Technologies',
                'author_avatar' => 'AK',
                'read_time' => '8 min read',
                'is_featured' => true,
                'image' => 'images/stories/screens-clicks.jpg',
                'excerpt' => 'How we partition client data with zero cross-tenant leakage, enforce row-level security (RLS) policies at the database engine level, and achieve sub-10ms query execution across millions of records.',
                'is_published' => true,
                'published_at' => now()->subDays(3),
                'content' => <<<'HTML'
<h2>The Multi-Tenancy Isolation Conundrum</h2>
<p>In B2B SaaS engineering, choosing the right tenant isolation strategy is the single most critical architectural decision. Separate databases provide strict physical isolation but incur immense operational overhead, runaway connection pooling costs, and complex migration routines. Shared schemas with a conventional <code>tenant_id</code> column in WHERE clauses are simple, but introduce catastrophic risk: a single omitted WHERE clause or developer oversight exposes cross-tenant data.</p>

<p>At Bluebase Technologies, our default architecture leverages <strong>PostgreSQL Native Row-Level Security (RLS)</strong> coupled with transparent Eloquent middleware in Laravel. This guarantees that tenant boundaries are mathematically enforced by the database engine itself, regardless of whether a query originates from an Eloquent relationship, raw SQL, an async queue worker, or an ad-hoc reporting console.</p>

<div class="article-callout-box">
  <div class="callout-title">Core Architectural Principle</div>
  <p>Never rely on application-level filtering for security boundaries. If an application bug occurs, the database kernel must reject unauthorized row access automatically.</p>
</div>

<h2>Configuring PostgreSQL Row-Level Security</h2>
<p>To implement RLS, we enable row-level security on each multi-tenant table and establish a deterministic policy backed by a session variable:</p>

<div class="code-snippet-box">
  <div class="code-header-bar">
    <span>POSTGRESQL 16 DDL</span>
    <span>TENANT_ISOLATION_RLS.SQL</span>
  </div>
  <pre><code>-- 1. Enable RLS on the multi-tenant table
ALTER TABLE organization_invoices ENABLE ROW LEVEL SECURITY;

-- 2. Force RLS for all table owners and application roles
ALTER TABLE organization_invoices FORCE ROW LEVEL SECURITY;

-- 3. Define the deterministic tenant isolation policy
CREATE POLICY tenant_isolation_policy ON organization_invoices
  AS RESTRICTIVE
  USING (tenant_id = NULLIF(current_setting('app.current_tenant_id', true), '')::uuid)
  WITH CHECK (tenant_id = NULLIF(current_setting('app.current_tenant_id', true), '')::uuid);</code></pre>
</div>

<h2>Seamless Laravel Integration via Middleware</h2>
<p>In Laravel, each incoming HTTP request passes through our <code>SetTenantSessionContext</code> middleware. This middleware authenticates the tenant subdomain or header, sets the PostgreSQL session-level configuration variable on the active PDO connection, and handles connection cleanup on termination:</p>

<div class="code-snippet-box">
  <div class="code-header-bar">
    <span>LARAVEL 11 MIDDLEWARE</span>
    <span>SetTenantSessionContext.php</span>
  </div>
  <pre><code>namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SetTenantSessionContext
{
    public function handle(Request $request, Closure $next)
    {
        $tenantId = $request->user()?->organization_id;

        if ($tenantId) {
            DB::statement(
                "SET LOCAL app.current_tenant_id = ?",
                [(string) $tenantId]
            );
        }

        return $next($request);
    }
}</code></pre>
</div>

<h2>Performance Benchmarks &amp; Sub-10ms Queries</h2>
<p>A common misconception is that Row-Level Security degrades query performance. Because PostgreSQL integrates RLS directly into the query optimizer, adding a compound index on <code>(tenant_id, created_at)</code> enables the planner to prune non-matching table partitions and index leaves immediately.</p>

<div class="metric-highlight-grid">
  <div class="metric-card">
    <div class="metric-num">0.84 ms</div>
    <div class="metric-lbl">Average Query Latency</div>
  </div>
  <div class="metric-card">
    <div class="metric-num">100%</div>
    <div class="metric-lbl">Kernel Isolation Parity</div>
  </div>
  <div class="metric-card">
    <div class="metric-num">10k+</div>
    <div class="metric-lbl">Tenants Per Cluster</div>
  </div>
</div>

<h2>Production Checklist &amp; Key Takeaways</h2>
<ul>
  <li><strong>Always Use SET LOCAL:</strong> Ensure your session parameters are scoped strictly to the current transaction to prevent connection pool leakage under connection pooling proxies like PgBouncer.</li>
  <li><strong>Bypass for System Auditing:</strong> Provision dedicated, narrowly-scoped DB roles with <code>BYPASSRLS</code> only for internal asynchronous billing reconciliation scripts.</li>
  <li><strong>Automated Penetration Tests:</strong> Run continuous integration suites that deliberately execute tenant-agnostic queries and verify that 0 rows outside the tenant context are returned.</li>
</ul>
HTML
            ],
            [
                'title' => 'Building Sub-Second SaaS Backends: Redis Caching, Edge WAF & Async Queue Patterns',
                'slug' => 'building-sub-second-saas-backends-redis-caching-edge-waf-async-queues',
                'category' => 'API & Backend',
                'tags' => 'Redis, API Gateway, Cloudflare, Queues, Microservices',
                'author' => 'Marcus V.',
                'author_role' => 'Principal Distributed Systems Engineer',
                'author_avatar' => 'MV',
                'read_time' => '6 min read',
                'is_featured' => false,
                'image' => 'images/stories/whitepaper-autonomous.png',
                'excerpt' => 'A comprehensive breakdown of how we architect high-throughput APIs to handle 10,000 requests per minute with Redis cluster invalidation and async workers.',
                'is_published' => true,
                'published_at' => now()->subDays(6),
                'content' => <<<'HTML'
<h2>Deconstructing 99th-Percentile Latency</h2>
<p>Modern enterprise web applications must respond in under 200 milliseconds to preserve high conversion rates and maintain user engagement. When database queries, external integrations, and heavy business logic collide on the main request thread, latency degrades quickly under concurrency.</p>

<p>Our distributed backend blueprint decouples synchronous HTTP requests into three deterministic tiers: Edge Caching via Cloudflare Workers, Near-Memory Invalidation with Redis Cluster, and Asynchronous Worker Offloading via Redis Streams.</p>

<h2>The Asynchronous Invalidation Pattern</h2>
<div class="code-snippet-box">
  <div class="code-header-bar">
    <span>PHP / LARAVEL CACHING</span>
    <span>TieredCacheService.php</span>
  </div>
  <pre><code>public function getOrCompute(string $cacheKey, callable $computation, int $ttl = 3600)
{
    // Layer 1: Check memory-level Redis store
    $cached = Redis::get($cacheKey);
    if ($cached !== null) {
        return json_decode($cached, true);
    }

    // Layer 2: Atomic lock to eliminate cache stampedes
    $lock = Cache::lock("lock:{$cacheKey}", 10);
    
    return $lock->get(function () use ($cacheKey, $computation, $ttl) {
        $result = $computation();
        Redis::setex($cacheKey, $ttl, json_encode($result));
        return $result;
    });
}</code></pre>
</div>

<h2>Eliminating Queue Bottlenecks</h2>
<p>Heavy operations such as PDF receipt generation, transactional email delivery, webhook fanouts, and search index ingestion must never execute in the HTTP request loop. By pushing these tasks to decoupled workers with exponential backoff retries, the user-facing response returns in under 35 milliseconds.</p>
HTML
            ],
            [
                'title' => 'From Figma Tokens to Production Tailwind 4: Eliminating the UI Handover Void',
                'slug' => 'from-figma-tokens-to-production-tailwind-4-eliminating-ui-handover',
                'category' => 'Frontend & Next.js',
                'tags' => 'Tailwind CSS, Figma Tokens, Design Systems, Next.js, TypeScript',
                'author' => 'Elena L.',
                'author_role' => 'Head of Design Engineering',
                'author_avatar' => 'EL',
                'read_time' => '7 min read',
                'is_featured' => false,
                'image' => 'images/stories/hauni.jpg',
                'excerpt' => 'How we automate design token synchronization between Figma variable modes and Tailwind CSS configuration to achieve 100% pixel-perfect design parity.',
                'is_published' => true,
                'published_at' => now()->subDays(9),
                'content' => <<<'HTML'
<h2>The Cost of Manual UI Handover</h2>
<p>In traditional product teams, designers spend weeks perfecting spacing scales, color variants, and typography tokens in Figma, only for frontend developers to eyeball hex codes and approximate padding in CSS. The outcome is technical debt, visual discrepancies, and endless QA review cycles.</p>

<p>By establishing a single source of truth for design variables, we compile design tokens directly into CSS variables consumed by Tailwind CSS v4 without any manual translation.</p>

<h2>The Token Build Pipeline</h2>
<p>We use GitHub Actions to trigger automated token builds whenever a Figma library publish event occurs:</p>
<ul>
  <li>Figma REST API extracts design tokens from component variable modes.</li>
  <li>Tokens are parsed and typed using Style Dictionary.</li>
  <li>Generated CSS tokens are committed to the design system package repository.</li>
  <li>Tailwind CSS `@theme` variables are updated atomically with zero manual edits.</li>
</ul>
HTML
            ],
            [
                'title' => 'Zero-Trust Cloud Infrastructure: Secretless CI/CD with HashiCorp Vault & OIDC',
                'slug' => 'zero-trust-cloud-infrastructure-secretless-cicd-vault-oidc',
                'category' => 'DevSecOps & Security',
                'tags' => 'DevSecOps, HashiCorp Vault, AWS, GitHub Actions, Zero Trust',
                'author' => 'Vikram S.',
                'author_role' => 'Principal DevSecOps Engineer',
                'author_avatar' => 'VS',
                'read_time' => '5 min read',
                'is_featured' => false,
                'image' => 'images/stories/screens-clicks.jpg',
                'excerpt' => 'Eliminate hardcoded cloud tokens forever. How our engineering teams authenticate ephemeral deployment runners using OIDC federation and dynamic STS credentials.',
                'is_published' => true,
                'published_at' => now()->subDays(12),
                'content' => <<<'HTML'
<h2>Why Long-Lived API Keys Must Die</h2>
<p>Static AWS Access Keys or GCP service account credentials stored in repository secrets represent a major attack vector. If a repository or developer device is compromised, those long-lived secrets can grant attackers direct access to production clusters.</p>

<p>Zero-Trust CI/CD replaces static keys with <strong>OpenID Connect (OIDC) identity federation</strong>. The CI runner obtains a cryptographically signed identity token from GitHub Actions and exchanges it with cloud providers for short-lived credentials that expire automatically in 15 minutes.</p>

<h2>Key Benefits of Secretless Pipelines</h2>
<ul>
  <li><strong>Zero Static Secrets:</strong> No credentials stored in repo settings or developer laptops.</li>
  <li><strong>Narrow Privilege Scopes:</strong> IAM roles are restricted to specific branches and repository environments.</li>
  <li><strong>Full Audit Traceability:</strong> CloudTrail logs reflect the exact commit hash and pipeline run responsible for every cloud action.</li>
</ul>
HTML
            ],
            [
                'title' => 'Offline-First Mobile Architecture: SQLite Delta Sync Without Merge Conflicts',
                'slug' => 'offline-first-mobile-architecture-sqlite-delta-sync-merge-conflicts',
                'category' => 'Mobile Engineering',
                'tags' => 'React Native, SQLite, Offline First, CRDT, Synchronization',
                'author' => 'Priya R.',
                'author_role' => 'Staff Mobile Architect',
                'author_avatar' => 'PR',
                'read_time' => '8 min read',
                'is_featured' => false,
                'image' => 'images/stories/hauni.jpg',
                'excerpt' => 'Practical patterns for warehouse and logistics apps operating in zero-connectivity environments with state-based CRDTs and atomic local transactions.',
                'is_published' => true,
                'published_at' => now()->subDays(15),
                'content' => <<<'HTML'
<h2>The Harsh Reality of Field Connectivity</h2>
<p>Industrial supply chain applications rarely operate in pristine high-speed Wi-Fi zones. Warehouse operators traverse subterranean storage bays, cargo holds, and remote distribution docks where mobile connections drop out constantly.</p>

<p>Rather than treating network failure as an exceptional error, our mobile engineering architecture treats local offline persistence as the default mode of operation.</p>

<h2>Conflict-Free Synchronization Design</h2>
<p>To eliminate data conflicts without blocking operators, we utilize Conflict-Free Replicated Data Types (CRDTs) paired with high-performance local SQLite engines:</p>
<ul>
  <li>Local writes execute in less than 2 milliseconds against local storage.</li>
  <li>Outbound mutations are queued in an append-only transaction ledger.</li>
  <li>Background sync daemons negotiate bi-directional delta synchronization once network connectivity returns.</li>
</ul>
HTML
            ],
            [
                'title' => 'Migrating Monoliths to Micro-Frontends: Vite Module Federation at Scale',
                'slug' => 'migrating-monoliths-to-micro-frontends-vite-module-federation-at-scale',
                'category' => 'Architecture',
                'tags' => 'Micro-frontends, Vite, Architecture, TypeScript, Monorepo',
                'author' => 'Arjun M.',
                'author_role' => 'Principal Frontend Architect',
                'author_avatar' => 'AM',
                'read_time' => '6 min read',
                'is_featured' => false,
                'image' => 'images/stories/whitepaper-autonomous.png',
                'excerpt' => 'How we decomposed an enterprise dashboard into 5 independently deployable micro-apps with shared state containers, sub-100ms cold starts, and zero bundle bloat.',
                'is_published' => true,
                'published_at' => now()->subDays(18),
                'content' => <<<'HTML'
<h2>When Frontend Monoliths Stagnate Velocity</h2>
<p>As enterprise engineering teams scale past 20 engineers, working in a single monolithic frontend repository creates friction: CI/CD build times balloon, conflicting package dependencies break builds, and team deployments step on each other.</p>

<p>Micro-frontends decompose large web applications into autonomous sub-applications that compile independently and assemble seamlessly at runtime via Vite Module Federation.</p>
HTML
            ],
            [
                'title' => 'Deterministic LLM Agent Workflows: Guardrails, JSON Schemas & Audit Logging',
                'slug' => 'deterministic-llm-agent-workflows-guardrails-json-schemas-audit-logging',
                'category' => 'AI & Systems',
                'tags' => 'Autonomous Agents, Python, FastAPI, JSON Schema, Enterprise AI',
                'author' => 'Dr. Elena Rostova',
                'author_role' => 'VP of AI Systems &bull; Bluebase Technologies',
                'author_avatar' => 'ER',
                'read_time' => '9 min read',
                'is_featured' => false,
                'image' => 'images/stories/screens-clicks.jpg',
                'excerpt' => 'Why stochastic chatbots fail enterprise transactions, and how to build deterministic agent loops with Pydantic schemas, tool-calling guards, and human escalation.',
                'is_published' => true,
                'published_at' => now()->subDays(21),
                'content' => <<<'HTML'
<h2>Bridging Cognitive Reasoning and Transactional Integrity</h2>
<p>Large language models possess unmatched capabilities in unstructured natural language reasoning, text extraction, and semantic classification. However, enterprise software requires 100% deterministic predictability: executing financial reconciliations or updating ERP ledgers cannot tolerate hallucinated parameters.</p>

<p>We build production AI agent architectures bounded by strict operational boundaries, constrained schema decoding, and immutable audit logs.</p>

<h2>The 4 Pillars of Deterministic Agents</h2>
<ul>
  <li><strong>Constrained JSON Schema Output:</strong> Enforcing strict Pydantic model validation on every model completion.</li>
  <li><strong>Granular Tool Permissions:</strong> Agents can only invoke verified API endpoints with signed OAuth tokens.</li>
  <li><strong>Human-in-the-Loop Triggers:</strong> High-value transactions automatically trigger multi-factor human approval before write operations execute.</li>
  <li><strong>Immutable Execution Ledgers:</strong> Every tool call, model prompt, and response payload is recorded in tamper-evident audit logs.</li>
</ul>
HTML
            ]
        ];

        foreach ($articles as $art) {
            Blog::updateOrCreate(
                ['slug' => $art['slug']],
                $art
            );
        }
    }
}
