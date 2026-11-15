-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: u171790771_bluebase_new
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `blog_categories`
--

DROP TABLE IF EXISTS `blog_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blog_categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_categories`
--

LOCK TABLES `blog_categories` WRITE;
/*!40000 ALTER TABLE `blog_categories` DISABLE KEYS */;
INSERT INTO `blog_categories` VALUES (1,'SaaS Architecture','saas-architecture','Architectural blueprints, multi-tenant database designs, distributed scaling patterns, and microservices for high-velocity B2B SaaS applications.','SaaS Architecture & Multi-Tenant Engineering — Bluebase Tech Blog','Deep dive into multi-tenant database isolation, distributed cache invalidation, and resilient cloud architectures for modern B2B SaaS platforms.',1,1,'2026-11-09 05:51:51','2026-11-09 05:51:51'),(2,'Frontend & Next.js','frontend-nextjs','Modern client-side engineering, Next.js Server Components, real-time hydration, and edge-rendered user experiences.','Frontend & Next.js Performance Engineering — Bluebase Tech Blog','Master Next.js App Router, streaming SSR, deterministic state machines, and micro-interactions with zero layout shift.',2,1,'2026-11-09 05:51:51','2026-11-09 05:51:51'),(3,'API & Backend','api-backend','High-throughput REST and GraphQL APIs, event streaming with Kafka/Redis, and PostgreSQL row-level security.','API & Distributed Backend Systems — Bluebase Tech Blog','Designing sub-10ms transactional APIs, idempotent event pipelines, and resilient distributed systems.',3,1,'2026-11-09 05:51:51','2026-11-09 05:51:51'),(4,'DevSecOps & Security','devsecops-security','Zero-trust cloud infrastructure, automated SOC2 compliance pipelines, container hardening, and audit logging.','DevSecOps & Cloud Security Architecture — Bluebase Tech Blog','Enterprise cloud security, immutable audit logs, CI/CD vulnerability scanning, and compliant Kubernetes deployments.',4,1,'2026-11-09 05:51:51','2026-11-09 05:51:51'),(5,'Mobile Engineering','mobile-engineering','Offline-first React Native and Flutter enterprise mobile apps, background synchronization, and native device bridge optimizations.','Enterprise Mobile App Engineering — Bluebase Tech Blog','Building offline-first enterprise mobile applications with biometric security and sub-millisecond local SQLite caches.',5,1,'2026-11-09 05:51:51','2026-11-09 05:51:51'),(6,'AI & Systems','ai-systems','Autonomous LLM agent loops, deterministic schema constraints, retrieval-augmented generation (RAG), and agentic workflows.','Autonomous AI Agents & Cognitive Systems — Bluebase Tech Blog','Practical implementation of deterministic AI copilots, tool-calling sandboxes, and enterprise vector retrieval systems.',6,1,'2026-11-09 05:51:51','2026-11-09 05:51:51'),(7,'Case Study','case-study','Real-world technical transformations, performance benchmark breakdowns, and ROI case studies from Bluebase engineering engagements.','Digital Engineering Case Studies & Benchmarks — Bluebase Tech Blog','In-depth case studies covering production deployments, latency reductions, and scalable architectures built by Bluebase.',7,1,'2026-11-09 05:51:51','2026-11-09 05:51:51'),(8,'Engineering','engineering','Core software engineering methodologies, design patterns, and full-stack software practices.','Software Engineering & Clean Code — Bluebase Tech Blog','Technical blueprints, modern full-stack engineering standards, and clean code principles.',8,1,'2026-11-09 05:51:51','2026-11-09 05:51:51');
/*!40000 ALTER TABLE `blog_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'Engineering',
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `author` varchar(255) NOT NULL DEFAULT 'Bluebase Engineering',
  `author_role` varchar(255) DEFAULT 'Software Architect',
  `author_avatar` varchar(255) DEFAULT NULL,
  `read_time` varchar(255) NOT NULL DEFAULT '5 min read',
  `image` varchar(255) DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `focus_keyword` varchar(255) DEFAULT NULL,
  `canonical_url` varchar(255) DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `robots` varchar(255) NOT NULL DEFAULT 'index, follow',
  `schema_type` varchar(255) NOT NULL DEFAULT 'TechArticle',
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blogs_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,'How Hauni Cut Mobile Factory Latency by 80% with Offline-First Architecture','hauni-manufacturing-offline-first-case-study','Case Study',7,NULL,'Marcus Vance, Principal Architect','Software Architect',NULL,'6 min read','images/stories/hauni.jpg','A deep dive into how international tobacco and machinery giant Hauni modernized shop-floor terminal responsiveness across 14 manufacturing plants.','Manufacturing plants face harsh operational environments where reliable Wi-Fi cannot be taken for granted. By implementing Bluebase offline-first local SQLite sync with certified SAP RFC connectors, Hauni eliminated network timeouts completely and boosted operator velocity by 34%.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'index, follow','TechArticle',1,0,'2026-10-25 06:01:20','2026-11-06 06:01:20','2026-11-09 05:51:51'),(2,'Deterministic AI Agents: Moving Beyond Chatbots to Operational ERP Automation','deterministic-ai-agents-erp-automation','AI & Engineering',6,NULL,'Dr. Elena Rostova, VP of AI Systems','Software Architect',NULL,'8 min read','images/stories/screens-clicks.jpg','Why enterprises are replacing fragile screen-scraping bots with self-governing multi-agent workflows bounded by deterministic verification layers.','Large language models excel at reasoning over ambiguous unstructured inputs, but business transactions demand zero-tolerance accuracy. We explore how multi-agent supervisor architectures execute transactional API calls with strict guardrails and complete audit logs.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'index, follow','TechArticle',1,0,'2026-11-01 06:01:20','2026-11-06 06:01:20','2026-11-09 05:51:51'),(3,'The Strangler Fig Pattern: Modernizing SAP ECC Without Risky Big-Bang Re-platforming','strangler-fig-pattern-sap-modernization','Engineering',8,NULL,'Devon Shaw, Enterprise Migration Lead','Software Architect',NULL,'5 min read','images/stories/whitepaper-autonomous.png','How Fortune 500 supply chains systematically decouple brittle monolithic codebases into containerized microservices without a single second of customer downtime.','Big-bang enterprise re-platforming projects fail at an alarming 70% rate. Learn how decoupling high-transaction interfaces into high-speed modern APIs lets you migrate modules piece by piece while keeping backend accounting intact.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'index, follow','TechArticle',1,0,'2026-11-04 06:01:20','2026-11-06 06:01:20','2026-11-09 05:51:51'),(4,'Designing Multi-Tenant SaaS Databases with Row-Level Security in PostgreSQL & Laravel','designing-multi-tenant-saas-databases-row-level-security-postgresql-laravel','SaaS Architecture',1,'PostgreSQL, Laravel, Multi-Tenancy, Security, Database','Alex K.','Lead Software Architect &bull; Bluebase Technologies','AK','8 min read','images/stories/screens-clicks.jpg','How we partition client data with zero cross-tenant leakage, enforce row-level security (RLS) policies at the database engine level, and achieve sub-10ms query execution across millions of records.','<h2>The Multi-Tenancy Isolation Conundrum</h2>\n<p>In B2B SaaS engineering, choosing the right tenant isolation strategy is the single most critical architectural decision. Separate databases provide strict physical isolation but incur immense operational overhead, runaway connection pooling costs, and complex migration routines. Shared schemas with a conventional <code>tenant_id</code> column in WHERE clauses are simple, but introduce catastrophic risk: a single omitted WHERE clause or developer oversight exposes cross-tenant data.</p>\n\n<p>At Bluebase Technologies, our default architecture leverages <strong>PostgreSQL Native Row-Level Security (RLS)</strong> coupled with transparent Eloquent middleware in Laravel. This guarantees that tenant boundaries are mathematically enforced by the database engine itself, regardless of whether a query originates from an Eloquent relationship, raw SQL, an async queue worker, or an ad-hoc reporting console.</p>\n\n<div class=\"article-callout-box\">\n  <div class=\"callout-title\">Core Architectural Principle</div>\n  <p>Never rely on application-level filtering for security boundaries. If an application bug occurs, the database kernel must reject unauthorized row access automatically.</p>\n</div>\n\n<h2>Configuring PostgreSQL Row-Level Security</h2>\n<p>To implement RLS, we enable row-level security on each multi-tenant table and establish a deterministic policy backed by a session variable:</p>\n\n<div class=\"code-snippet-box\">\n  <div class=\"code-header-bar\">\n    <span>POSTGRESQL 16 DDL</span>\n    <span>TENANT_ISOLATION_RLS.SQL</span>\n  </div>\n  <pre><code>-- 1. Enable RLS on the multi-tenant table\nALTER TABLE organization_invoices ENABLE ROW LEVEL SECURITY;\n\n-- 2. Force RLS for all table owners and application roles\nALTER TABLE organization_invoices FORCE ROW LEVEL SECURITY;\n\n-- 3. Define the deterministic tenant isolation policy\nCREATE POLICY tenant_isolation_policy ON organization_invoices\n  AS RESTRICTIVE\n  USING (tenant_id = NULLIF(current_setting(\'app.current_tenant_id\', true), \'\')::uuid)\n  WITH CHECK (tenant_id = NULLIF(current_setting(\'app.current_tenant_id\', true), \'\')::uuid);</code></pre>\n</div>\n\n<h2>Seamless Laravel Integration via Middleware</h2>\n<p>In Laravel, each incoming HTTP request passes through our <code>SetTenantSessionContext</code> middleware. This middleware authenticates the tenant subdomain or header, sets the PostgreSQL session-level configuration variable on the active PDO connection, and handles connection cleanup on termination:</p>\n\n<div class=\"code-snippet-box\">\n  <div class=\"code-header-bar\">\n    <span>LARAVEL 11 MIDDLEWARE</span>\n    <span>SetTenantSessionContext.php</span>\n  </div>\n  <pre><code>namespace App\\Http\\Middleware;\n\nuse Closure;\nuse Illuminate\\Http\\Request;\nuse Illuminate\\Support\\Facades\\DB;\n\nclass SetTenantSessionContext\n{\n    public function handle(Request $request, Closure $next)\n    {\n        $tenantId = $request->user()?->organization_id;\n\n        if ($tenantId) {\n            DB::statement(\n                \"SET LOCAL app.current_tenant_id = ?\",\n                [(string) $tenantId]\n            );\n        }\n\n        return $next($request);\n    }\n}</code></pre>\n</div>\n\n<h2>Performance Benchmarks &amp; Sub-10ms Queries</h2>\n<p>A common misconception is that Row-Level Security degrades query performance. Because PostgreSQL integrates RLS directly into the query optimizer, adding a compound index on <code>(tenant_id, created_at)</code> enables the planner to prune non-matching table partitions and index leaves immediately.</p>\n\n<div class=\"metric-highlight-grid\">\n  <div class=\"metric-card\">\n    <div class=\"metric-num\">0.84 ms</div>\n    <div class=\"metric-lbl\">Average Query Latency</div>\n  </div>\n  <div class=\"metric-card\">\n    <div class=\"metric-num\">100%</div>\n    <div class=\"metric-lbl\">Kernel Isolation Parity</div>\n  </div>\n  <div class=\"metric-card\">\n    <div class=\"metric-num\">10k+</div>\n    <div class=\"metric-lbl\">Tenants Per Cluster</div>\n  </div>\n</div>\n\n<h2>Production Checklist &amp; Key Takeaways</h2>\n<ul>\n  <li><strong>Always Use SET LOCAL:</strong> Ensure your session parameters are scoped strictly to the current transaction to prevent connection pool leakage under connection pooling proxies like PgBouncer.</li>\n  <li><strong>Bypass for System Auditing:</strong> Provision dedicated, narrowly-scoped DB roles with <code>BYPASSRLS</code> only for internal asynchronous billing reconciliation scripts.</li>\n  <li><strong>Automated Penetration Tests:</strong> Run continuous integration suites that deliberately execute tenant-agnostic queries and verify that 0 rows outside the tenant context are returned.</li>\n</ul>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'index, follow','TechArticle',1,1,'2026-11-05 06:37:23','2026-11-08 06:37:23','2026-11-09 05:51:51'),(5,'Building Sub-Second SaaS Backends: Redis Caching, Edge WAF & Async Queue Patterns','building-sub-second-saas-backends-redis-caching-edge-waf-async-queues','API & Backend',3,'Redis, API Gateway, Cloudflare, Queues, Microservices','Marcus V.','Principal Distributed Systems Engineer','MV','6 min read','images/stories/whitepaper-autonomous.png','A comprehensive breakdown of how we architect high-throughput APIs to handle 10,000 requests per minute with Redis cluster invalidation and async workers.','<h2>Deconstructing 99th-Percentile Latency</h2>\n<p>Modern enterprise web applications must respond in under 200 milliseconds to preserve high conversion rates and maintain user engagement. When database queries, external integrations, and heavy business logic collide on the main request thread, latency degrades quickly under concurrency.</p>\n\n<p>Our distributed backend blueprint decouples synchronous HTTP requests into three deterministic tiers: Edge Caching via Cloudflare Workers, Near-Memory Invalidation with Redis Cluster, and Asynchronous Worker Offloading via Redis Streams.</p>\n\n<h2>The Asynchronous Invalidation Pattern</h2>\n<div class=\"code-snippet-box\">\n  <div class=\"code-header-bar\">\n    <span>PHP / LARAVEL CACHING</span>\n    <span>TieredCacheService.php</span>\n  </div>\n  <pre><code>public function getOrCompute(string $cacheKey, callable $computation, int $ttl = 3600)\n{\n    // Layer 1: Check memory-level Redis store\n    $cached = Redis::get($cacheKey);\n    if ($cached !== null) {\n        return json_decode($cached, true);\n    }\n\n    // Layer 2: Atomic lock to eliminate cache stampedes\n    $lock = Cache::lock(\"lock:{$cacheKey}\", 10);\n    \n    return $lock->get(function () use ($cacheKey, $computation, $ttl) {\n        $result = $computation();\n        Redis::setex($cacheKey, $ttl, json_encode($result));\n        return $result;\n    });\n}</code></pre>\n</div>\n\n<h2>Eliminating Queue Bottlenecks</h2>\n<p>Heavy operations such as PDF receipt generation, transactional email delivery, webhook fanouts, and search index ingestion must never execute in the HTTP request loop. By pushing these tasks to decoupled workers with exponential backoff retries, the user-facing response returns in under 35 milliseconds.</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'index, follow','TechArticle',1,0,'2026-11-02 06:37:23','2026-11-08 06:37:23','2026-11-09 05:51:51'),(6,'From Figma Tokens to Production Tailwind 4: Eliminating the UI Handover Void','from-figma-tokens-to-production-tailwind-4-eliminating-ui-handover','Frontend & Next.js',2,'Tailwind CSS, Figma Tokens, Design Systems, Next.js, TypeScript','Elena L.','Head of Design Engineering','EL','7 min read','images/stories/hauni.jpg','How we automate design token synchronization between Figma variable modes and Tailwind CSS configuration to achieve 100% pixel-perfect design parity.','<h2>The Cost of Manual UI Handover</h2>\n<p>In traditional product teams, designers spend weeks perfecting spacing scales, color variants, and typography tokens in Figma, only for frontend developers to eyeball hex codes and approximate padding in CSS. The outcome is technical debt, visual discrepancies, and endless QA review cycles.</p>\n\n<p>By establishing a single source of truth for design variables, we compile design tokens directly into CSS variables consumed by Tailwind CSS v4 without any manual translation.</p>\n\n<h2>The Token Build Pipeline</h2>\n<p>We use GitHub Actions to trigger automated token builds whenever a Figma library publish event occurs:</p>\n<ul>\n  <li>Figma REST API extracts design tokens from component variable modes.</li>\n  <li>Tokens are parsed and typed using Style Dictionary.</li>\n  <li>Generated CSS tokens are committed to the design system package repository.</li>\n  <li>Tailwind CSS `@theme` variables are updated atomically with zero manual edits.</li>\n</ul>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'index, follow','TechArticle',1,0,'2026-10-30 06:37:23','2026-11-08 06:37:23','2026-11-09 05:51:51'),(7,'Zero-Trust Cloud Infrastructure: Secretless CI/CD with HashiCorp Vault & OIDC','zero-trust-cloud-infrastructure-secretless-cicd-vault-oidc','DevSecOps & Security',4,'DevSecOps, HashiCorp Vault, AWS, GitHub Actions, Zero Trust','Vikram S.','Principal DevSecOps Engineer','VS','5 min read','images/stories/screens-clicks.jpg','Eliminate hardcoded cloud tokens forever. How our engineering teams authenticate ephemeral deployment runners using OIDC federation and dynamic STS credentials.','<h2>Why Long-Lived API Keys Must Die</h2>\n<p>Static AWS Access Keys or GCP service account credentials stored in repository secrets represent a major attack vector. If a repository or developer device is compromised, those long-lived secrets can grant attackers direct access to production clusters.</p>\n\n<p>Zero-Trust CI/CD replaces static keys with <strong>OpenID Connect (OIDC) identity federation</strong>. The CI runner obtains a cryptographically signed identity token from GitHub Actions and exchanges it with cloud providers for short-lived credentials that expire automatically in 15 minutes.</p>\n\n<h2>Key Benefits of Secretless Pipelines</h2>\n<ul>\n  <li><strong>Zero Static Secrets:</strong> No credentials stored in repo settings or developer laptops.</li>\n  <li><strong>Narrow Privilege Scopes:</strong> IAM roles are restricted to specific branches and repository environments.</li>\n  <li><strong>Full Audit Traceability:</strong> CloudTrail logs reflect the exact commit hash and pipeline run responsible for every cloud action.</li>\n</ul>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'index, follow','TechArticle',1,0,'2026-10-27 06:37:23','2026-11-08 06:37:23','2026-11-09 05:51:51'),(8,'Offline-First Mobile Architecture: SQLite Delta Sync Without Merge Conflicts','offline-first-mobile-architecture-sqlite-delta-sync-merge-conflicts','Mobile Engineering',5,'React Native, SQLite, Offline First, CRDT, Synchronization','Priya R.','Staff Mobile Architect','PR','8 min read','images/stories/hauni.jpg','Practical patterns for warehouse and logistics apps operating in zero-connectivity environments with state-based CRDTs and atomic local transactions.','<h2>The Harsh Reality of Field Connectivity</h2>\n<p>Industrial supply chain applications rarely operate in pristine high-speed Wi-Fi zones. Warehouse operators traverse subterranean storage bays, cargo holds, and remote distribution docks where mobile connections drop out constantly.</p>\n\n<p>Rather than treating network failure as an exceptional error, our mobile engineering architecture treats local offline persistence as the default mode of operation.</p>\n\n<h2>Conflict-Free Synchronization Design</h2>\n<p>To eliminate data conflicts without blocking operators, we utilize Conflict-Free Replicated Data Types (CRDTs) paired with high-performance local SQLite engines:</p>\n<ul>\n  <li>Local writes execute in less than 2 milliseconds against local storage.</li>\n  <li>Outbound mutations are queued in an append-only transaction ledger.</li>\n  <li>Background sync daemons negotiate bi-directional delta synchronization once network connectivity returns.</li>\n</ul>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'index, follow','TechArticle',1,0,'2026-10-24 06:37:23','2026-11-08 06:37:23','2026-11-09 05:51:51'),(9,'Migrating Monoliths to Micro-Frontends: Vite Module Federation at Scale','migrating-monoliths-to-micro-frontends-vite-module-federation-at-scale','Engineering',8,'Micro-frontends, Vite, Architecture, TypeScript, Monorepo','Arjun M.','Principal Frontend Architect','AM','6 min read','images/stories/whitepaper-autonomous.png','How we decomposed an enterprise dashboard into 5 independently deployable micro-apps with shared state containers, sub-100ms cold starts, and zero bundle bloat.','<h2>When Frontend Monoliths Stagnate Velocity</h2>\n<p>As enterprise engineering teams scale past 20 engineers, working in a single monolithic frontend repository creates friction: CI/CD build times balloon, conflicting package dependencies break builds, and team deployments step on each other.</p>\n\n<p>Micro-frontends decompose large web applications into autonomous sub-applications that compile independently and assemble seamlessly at runtime via Vite Module Federation.</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'index, follow','TechArticle',1,0,'2026-10-21 06:37:23','2026-11-08 06:37:23','2026-11-09 05:51:51'),(10,'Deterministic LLM Agent Workflows: Guardrails, JSON Schemas & Audit Logging','deterministic-llm-agent-workflows-guardrails-json-schemas-audit-logging','AI & Systems',6,'Autonomous Agents, Python, FastAPI, JSON Schema, Enterprise AI','Dr. Elena Rostova','VP of AI Systems &bull; Bluebase Technologies','ER','9 min read','images/stories/screens-clicks.jpg','Why stochastic chatbots fail enterprise transactions, and how to build deterministic agent loops with Pydantic schemas, tool-calling guards, and human escalation.','<h2>Bridging Cognitive Reasoning and Transactional Integrity</h2>\n<p>Large language models possess unmatched capabilities in unstructured natural language reasoning, text extraction, and semantic classification. However, enterprise software requires 100% deterministic predictability: executing financial reconciliations or updating ERP ledgers cannot tolerate hallucinated parameters.</p>\n\n<p>We build production AI agent architectures bounded by strict operational boundaries, constrained schema decoding, and immutable audit logs.</p>\n\n<h2>The 4 Pillars of Deterministic Agents</h2>\n<ul>\n  <li><strong>Constrained JSON Schema Output:</strong> Enforcing strict Pydantic model validation on every model completion.</li>\n  <li><strong>Granular Tool Permissions:</strong> Agents can only invoke verified API endpoints with signed OAuth tokens.</li>\n  <li><strong>Human-in-the-Loop Triggers:</strong> High-value transactions automatically trigger multi-factor human approval before write operations execute.</li>\n  <li><strong>Immutable Execution Ledgers:</strong> Every tool call, model prompt, and response payload is recorded in tamper-evident audit logs.</li>\n</ul>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'index, follow','TechArticle',1,0,'2026-10-18 06:37:23','2026-11-08 06:37:23','2026-11-09 05:51:51');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat_sessions`
--

DROP TABLE IF EXISTS `chat_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat_sessions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `session_uuid` varchar(64) NOT NULL,
  `visitor_name` varchar(150) DEFAULT NULL,
  `visitor_email` varchar(150) DEFAULT NULL,
  `visitor_phone` varchar(50) DEFAULT NULL,
  `step` varchar(50) NOT NULL DEFAULT 'ask_name',
  `status` varchar(30) NOT NULL DEFAULT 'active',
  `ip_address` varchar(60) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `last_message_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chat_sessions_session_uuid_unique` (`session_uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `chat_messages`
--

DROP TABLE IF EXISTS `chat_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat_messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `chat_session_id` bigint(20) unsigned NOT NULL,
  `sender` enum('user','bot') NOT NULL DEFAULT 'user',
  `message` text NOT NULL,
  `metadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`metadata`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chat_messages_chat_session_id_foreign` (`chat_session_id`),
  CONSTRAINT `chat_messages_chat_session_id_foreign` FOREIGN KEY (`chat_session_id`) REFERENCES `chat_sessions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `client_logos`
--

DROP TABLE IF EXISTS `client_logos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_logos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `logo_path` varchar(255) NOT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_logos`
--

LOCK TABLES `client_logos` WRITE;
/*!40000 ALTER TABLE `client_logos` DISABLE KEYS */;
INSERT INTO `client_logos` VALUES (1,'Aarohi Classic Championship','images/clients/aarohi-logo.webp',NULL,1,1,1,'2026-11-09 06:45:13','2026-11-09 06:45:13'),(2,'Aarya Waste Innovations','images/clients/aarya-logo.webp',NULL,2,2,1,'2026-11-09 06:45:13','2026-11-09 06:45:13'),(3,'Austin Moto Premium','images/clients/austin-logo.webp',NULL,3,3,1,'2026-11-09 06:45:13','2026-11-09 06:45:13'),(4,'Diets by Dietitian','images/clients/diets-logo.webp',NULL,4,4,1,'2026-11-09 06:45:13','2026-11-09 06:45:13'),(5,'Dreamland Vacations','images/clients/dream-logo.webp',NULL,5,5,1,'2026-11-09 06:45:13','2026-11-09 06:45:13'),(6,'OMG Rental Bikes','images/clients/omg-logo.webp',NULL,6,6,1,'2026-11-09 06:45:13','2026-11-09 06:45:13'),(7,'Rednetik','images/clients/rednetik-logo.webp',NULL,7,7,1,'2026-11-09 06:45:13','2026-11-09 06:45:13'),(8,'Shinne Interior','images/clients/shine-interior-logo.png',NULL,8,8,1,'2026-11-09 06:45:13','2026-11-09 06:45:13'),(9,'Shristiyam','images/clients/shristiyam_logo.webp',NULL,9,9,1,'2026-11-09 06:45:13','2026-11-09 06:45:13'),(10,'Trevanta International','images/clients/trevanta_logo.webp',NULL,10,10,1,'2026-11-09 06:45:13','2026-11-09 06:45:13');
/*!40000 ALTER TABLE `client_logos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_inquiries`
--

DROP TABLE IF EXISTS `contact_inquiries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_inquiries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'new',
  `admin_notes` text DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_inquiries`
--

LOCK TABLES `contact_inquiries` WRITE;
/*!40000 ALTER TABLE `contact_inquiries` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_inquiries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_openings`
--

DROP TABLE IF EXISTS `job_openings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_openings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL DEFAULT 'Engineering',
  `category` varchar(50) NOT NULL DEFAULT 'backend',
  `location` varchar(255) NOT NULL DEFAULT 'Remote (India / Global)',
  `type` varchar(50) NOT NULL DEFAULT 'Full-time',
  `experience` varchar(100) DEFAULT 'Senior (3+ yrs)',
  `description` text DEFAULT NULL,
  `skills_tags` text DEFAULT NULL,
  `apply_email` varchar(255) DEFAULT 'info@bluebasetechnologies.com',
  `display_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `job_openings_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_openings`
--

LOCK TABLES `job_openings` WRITE;
/*!40000 ALTER TABLE `job_openings` DISABLE KEYS */;
INSERT INTO `job_openings` VALUES 
(1,'Staff Full-Stack Engineer (React / Go / Node)','staff-full-stack-engineer-react-go-node','Engineering','backend','Remote (India / Global)','Full-time','Lead (5+ yrs)','Lead architecture and implementation of high-throughput web applications and scalable microservices. You will work on real-time booking engines, client enterprise portals, and distributed transactional APIs.','Go, React / Next.js, PostgreSQL, Redis, Docker','info@bluebasetechnologies.com',1,1,'2026-11-15 05:00:00','2026-11-15 05:00:00'),
(2,'Principal AI & Agent Systems Architect','principal-ai-agent-systems-architect','AI Research & Labs','ai','Remote (India / Global)','Full-time','Principal (6+ yrs)','Architect autonomous multi-agent pipelines, build hybrid vector search RAG systems, and deploy fine-tuned open-weight models for enterprise production workloads with sub-second latencies.','Python, LangChain / LlamaIndex, Vector DBs (Qdrant), FastAPI, PyTorch','info@bluebasetechnologies.com',2,1,'2026-11-15 05:00:00','2026-11-15 05:00:00'),
(3,'Senior Cloud & DevOps Engineer','senior-cloud-devops-engineer','Infrastructure & SRE','mobile-cloud','Remote (India / Global)','Full-time','Senior (4+ yrs)','Own our multi-region Kubernetes clusters, automated GitOps CI/CD pipelines, Terraform infrastructure-as-code, and zero-trust security postures across AWS and Cloudflare.','Kubernetes, AWS / GCP, Terraform IaC, GitHub Actions, Prometheus','info@bluebasetechnologies.com',3,1,'2026-11-15 05:00:00','2026-11-15 05:00:00'),
(4,'Senior Mobile Engineer (Flutter / React Native)','senior-mobile-engineer-flutter-react-native','Mobile Engineering','mobile-cloud','Remote (India / Global)','Full-time','Senior (4+ yrs)','Develop responsive cross-platform native experiences, offline-first sync engines, biometric auth flows, and edge computing for logistics & fleet tracking mobile platforms.','Flutter / Dart, React Native, iOS / Android, GraphQL, SQLite','info@bluebasetechnologies.com',4,1,'2026-11-15 05:00:00','2026-11-15 05:00:00'),
(5,'Lead Product Designer & Design Systems','lead-product-designer-design-systems','Design & Experience','design','Remote (India / Global)','Full-time','Lead (5+ yrs)','Architect comprehensive Figma design token libraries, craft accessible data-dense enterprise dashboards, and establish cohesive motion guidelines for client applications.','Figma, Design Tokens, UX Research, Design Systems, Prototyping','info@bluebasetechnologies.com',5,1,'2026-11-15 05:00:00','2026-11-15 05:00:00'),
(6,'Data & Vector Systems Engineer (Python / Distributed DBs)','data-vector-systems-engineer-python-distributed-dbs','Data Infrastructure','backend','Remote (India / Global)','Full-time','Senior (4+ yrs)','Design event-driven data streaming pipelines, schema registries, and real-time analytical cubes with sub-second OLAP queries across millions of transactional events.','Python, Apache Kafka, ClickHouse, PostgreSQL, Vector Indexing','info@bluebasetechnologies.com',6,1,'2026-11-15 05:00:00','2026-11-15 05:00:00');
/*!40000 ALTER TABLE `job_openings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_11_01_000001_create_bluebase_tables',1),(5,'2026_11_02_000001_create_cms_and_enhancements',1),(6,'2026_11_02_000002_create_seo_tables',1),(7,'2026_11_08_000001_add_metadata_to_blogs_table',2),(8,'2026_11_09_000001_create_blog_categories_and_seo_fields',3),(9,'2026_11_09_000002_drop_services_table',4),(10,'2026_11_09_000003_drop_solutions_table',5),(11,'2026_11_09_000004_create_client_logos_table',5),(12,'2026_11_15_000001_create_job_openings_table',6),(13,'2026_11_15_000002_create_chat_conversations_tables',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `group` varchar(255) NOT NULL DEFAULT 'general',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `site_settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_settings`
--

LOCK TABLES `site_settings` WRITE;
/*!40000 ALTER TABLE `site_settings` DISABLE KEYS */;
INSERT INTO `site_settings` VALUES (1,'site_name','Bluebase Technologies','general','2026-11-06 06:01:20','2026-11-06 06:01:20'),(2,'site_tagline','Digital Engineering & Autonomous AI Services','general','2026-11-06 06:01:20','2026-11-06 06:01:20'),(3,'contact_email','contact@bluebase.com','general','2026-11-06 06:01:20','2026-11-06 06:01:20'),(4,'contact_phone','+1 (800) 555-BLUE','general','2026-11-06 06:01:20','2026-11-06 06:01:20'),(5,'support_email','support@bluebase.com','general','2026-11-06 06:01:20','2026-11-06 06:01:20'),(6,'office_address','742 Innovation Way, Suite 400, San Francisco, CA 94107','general','2026-11-06 06:01:20','2026-11-06 06:01:20'),(7,'business_hours','Monday - Friday: 8:00 AM - 6:00 PM PST','general','2026-11-06 06:01:20','2026-11-06 06:01:20'),(8,'linkedin_url','https://linkedin.com/company/bluebase','general','2026-11-06 06:01:20','2026-11-06 06:01:20'),(9,'twitter_url','https://twitter.com/bluebase_tech','general','2026-11-06 06:01:20','2026-11-06 06:01:20'),(10,'github_url','https://github.com/bluebase-tech','general','2026-11-06 06:01:20','2026-11-06 06:01:20'),(11,'hero_badge','NEXT-GEN ENTERPRISE PLATFORM','general','2026-11-06 06:01:20','2026-11-06 06:01:20'),(12,'hero_title','Empower Your Enterprise With Autonomous AI & Digital Engineering','general','2026-11-06 06:01:20','2026-11-06 06:01:20'),(13,'hero_subtitle','Turn complex legacy systems into ultra-fast, offline-capable, AI-augmented applications without downtime.','general','2026-11-06 06:01:20','2026-11-06 06:01:20'),(14,'sitemap_last_generated','2026-11-07 11:31:55','seo','2026-11-06 13:30:33','2026-11-07 06:01:55');
/*!40000 ALTER TABLE `site_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Bluebase Administrator','admin@bluebase.com','2026-11-06 06:01:20','$2y$12$GMPV8LBbYQPDzfux.vGAvuMQQmx1E.e4pejNUsf2GPRep0XlG.HF6',NULL,'2026-11-06 06:01:20','2026-11-06 06:01:20');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-11-09 12:22:32
