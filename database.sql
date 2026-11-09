-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: bluebase_laravel_db
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
  `tags` varchar(255) DEFAULT NULL,
  `author` varchar(255) NOT NULL DEFAULT 'Bluebase Engineering',
  `author_role` varchar(255) DEFAULT 'Software Architect',
  `author_avatar` varchar(255) DEFAULT NULL,
  `read_time` varchar(255) NOT NULL DEFAULT '5 min read',
  `image` varchar(255) DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blogs_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,'How Hauni Cut Mobile Factory Latency by 80% with Offline-First Architecture','hauni-manufacturing-offline-first-case-study','Case Study',NULL,'Marcus Vance, Principal Architect','Software Architect',NULL,'6 min read','images/stories/hauni.jpg','A deep dive into how international tobacco and machinery giant Hauni modernized shop-floor terminal responsiveness across 14 manufacturing plants.','Manufacturing plants face harsh operational environments where reliable Wi-Fi cannot be taken for granted. By implementing Bluebase offline-first local SQLite sync with certified SAP RFC connectors, Hauni eliminated network timeouts completely and boosted operator velocity by 34%.',1,0,'2026-10-25 06:01:20','2026-11-06 06:01:20','2026-11-06 06:01:20'),(2,'Deterministic AI Agents: Moving Beyond Chatbots to Operational ERP Automation','deterministic-ai-agents-erp-automation','AI & Engineering',NULL,'Dr. Elena Rostova, VP of AI Systems','Software Architect',NULL,'8 min read','images/stories/screens-clicks.jpg','Why enterprises are replacing fragile screen-scraping bots with self-governing multi-agent workflows bounded by deterministic verification layers.','Large language models excel at reasoning over ambiguous unstructured inputs, but business transactions demand zero-tolerance accuracy. We explore how multi-agent supervisor architectures execute transactional API calls with strict guardrails and complete audit logs.',1,0,'2026-11-01 06:01:20','2026-11-06 06:01:20','2026-11-06 06:01:20'),(3,'The Strangler Fig Pattern: Modernizing SAP ECC Without Risky Big-Bang Re-platforming','strangler-fig-pattern-sap-modernization','Architecture',NULL,'Devon Shaw, Enterprise Migration Lead','Software Architect',NULL,'5 min read','images/stories/whitepaper-autonomous.png','How Fortune 500 supply chains systematically decouple brittle monolithic codebases into containerized microservices without a single second of customer downtime.','Big-bang enterprise re-platforming projects fail at an alarming 70% rate. Learn how decoupling high-transaction interfaces into high-speed modern APIs lets you migrate modules piece by piece while keeping backend accounting intact.',1,0,'2026-11-04 06:01:20','2026-11-06 06:01:20','2026-11-06 06:01:20'),(4,'Designing Multi-Tenant SaaS Databases with Row-Level Security in PostgreSQL & Laravel','designing-multi-tenant-saas-databases-row-level-security-postgresql-laravel','SaaS Architecture','PostgreSQL, Laravel, Multi-Tenancy, Security, Database','Alex K.','Lead Software Architect &bull; Bluebase Technologies','AK','8 min read','images/stories/screens-clicks.jpg','How we partition client data with zero cross-tenant leakage, enforce row-level security (RLS) policies at the database engine level, and achieve sub-10ms query execution across millions of records.','<h2>The Multi-Tenancy Isolation Conundrum</h2>\n<p>In B2B SaaS engineering, choosing the right tenant isolation strategy is the single most critical architectural decision. Separate databases provide strict physical isolation but incur immense operational overhead, runaway connection pooling costs, and complex migration routines. Shared schemas with a conventional <code>tenant_id</code> column in WHERE clauses are simple, but introduce catastrophic risk: a single omitted WHERE clause or developer oversight exposes cross-tenant data.</p>\n\n<p>At Bluebase Technologies, our default architecture leverages <strong>PostgreSQL Native Row-Level Security (RLS)</strong> coupled with transparent Eloquent middleware in Laravel. This guarantees that tenant boundaries are mathematically enforced by the database engine itself, regardless of whether a query originates from an Eloquent relationship, raw SQL, an async queue worker, or an ad-hoc reporting console.</p>\n\n<div class=\"article-callout-box\">\n  <div class=\"callout-title\">Core Architectural Principle</div>\n  <p>Never rely on application-level filtering for security boundaries. If an application bug occurs, the database kernel must reject unauthorized row access automatically.</p>\n</div>\n\n<h2>Configuring PostgreSQL Row-Level Security</h2>\n<p>To implement RLS, we enable row-level security on each multi-tenant table and establish a deterministic policy backed by a session variable:</p>\n\n<div class=\"code-snippet-box\">\n  <div class=\"code-header-bar\">\n    <span>POSTGRESQL 16 DDL</span>\n    <span>TENANT_ISOLATION_RLS.SQL</span>\n  </div>\n  <pre><code>-- 1. Enable RLS on the multi-tenant table\nALTER TABLE organization_invoices ENABLE ROW LEVEL SECURITY;\n\n-- 2. Force RLS for all table owners and application roles\nALTER TABLE organization_invoices FORCE ROW LEVEL SECURITY;\n\n-- 3. Define the deterministic tenant isolation policy\nCREATE POLICY tenant_isolation_policy ON organization_invoices\n  AS RESTRICTIVE\n  USING (tenant_id = NULLIF(current_setting(\'app.current_tenant_id\', true), \'\')::uuid)\n  WITH CHECK (tenant_id = NULLIF(current_setting(\'app.current_tenant_id\', true), \'\')::uuid);</code></pre>\n</div>\n\n<h2>Seamless Laravel Integration via Middleware</h2>\n<p>In Laravel, each incoming HTTP request passes through our <code>SetTenantSessionContext</code> middleware. This middleware authenticates the tenant subdomain or header, sets the PostgreSQL session-level configuration variable on the active PDO connection, and handles connection cleanup on termination:</p>\n\n<div class=\"code-snippet-box\">\n  <div class=\"code-header-bar\">\n    <span>LARAVEL 11 MIDDLEWARE</span>\n    <span>SetTenantSessionContext.php</span>\n  </div>\n  <pre><code>namespace App\\Http\\Middleware;\n\nuse Closure;\nuse Illuminate\\Http\\Request;\nuse Illuminate\\Support\\Facades\\DB;\n\nclass SetTenantSessionContext\n{\n    public function handle(Request $request, Closure $next)\n    {\n        $tenantId = $request->user()?->organization_id;\n\n        if ($tenantId) {\n            DB::statement(\n                \"SET LOCAL app.current_tenant_id = ?\",\n                [(string) $tenantId]\n            );\n        }\n\n        return $next($request);\n    }\n}</code></pre>\n</div>\n\n<h2>Performance Benchmarks &amp; Sub-10ms Queries</h2>\n<p>A common misconception is that Row-Level Security degrades query performance. Because PostgreSQL integrates RLS directly into the query optimizer, adding a compound index on <code>(tenant_id, created_at)</code> enables the planner to prune non-matching table partitions and index leaves immediately.</p>\n\n<div class=\"metric-highlight-grid\">\n  <div class=\"metric-card\">\n    <div class=\"metric-num\">0.84 ms</div>\n    <div class=\"metric-lbl\">Average Query Latency</div>\n  </div>\n  <div class=\"metric-card\">\n    <div class=\"metric-num\">100%</div>\n    <div class=\"metric-lbl\">Kernel Isolation Parity</div>\n  </div>\n  <div class=\"metric-card\">\n    <div class=\"metric-num\">10k+</div>\n    <div class=\"metric-lbl\">Tenants Per Cluster</div>\n  </div>\n</div>\n\n<h2>Production Checklist &amp; Key Takeaways</h2>\n<ul>\n  <li><strong>Always Use SET LOCAL:</strong> Ensure your session parameters are scoped strictly to the current transaction to prevent connection pool leakage under connection pooling proxies like PgBouncer.</li>\n  <li><strong>Bypass for System Auditing:</strong> Provision dedicated, narrowly-scoped DB roles with <code>BYPASSRLS</code> only for internal asynchronous billing reconciliation scripts.</li>\n  <li><strong>Automated Penetration Tests:</strong> Run continuous integration suites that deliberately execute tenant-agnostic queries and verify that 0 rows outside the tenant context are returned.</li>\n</ul>',1,1,'2026-11-05 06:37:23','2026-11-08 06:37:23','2026-11-08 06:37:23'),(5,'Building Sub-Second SaaS Backends: Redis Caching, Edge WAF & Async Queue Patterns','building-sub-second-saas-backends-redis-caching-edge-waf-async-queues','API & Backend','Redis, API Gateway, Cloudflare, Queues, Microservices','Marcus V.','Principal Distributed Systems Engineer','MV','6 min read','images/stories/whitepaper-autonomous.png','A comprehensive breakdown of how we architect high-throughput APIs to handle 10,000 requests per minute with Redis cluster invalidation and async workers.','<h2>Deconstructing 99th-Percentile Latency</h2>\n<p>Modern enterprise web applications must respond in under 200 milliseconds to preserve high conversion rates and maintain user engagement. When database queries, external integrations, and heavy business logic collide on the main request thread, latency degrades quickly under concurrency.</p>\n\n<p>Our distributed backend blueprint decouples synchronous HTTP requests into three deterministic tiers: Edge Caching via Cloudflare Workers, Near-Memory Invalidation with Redis Cluster, and Asynchronous Worker Offloading via Redis Streams.</p>\n\n<h2>The Asynchronous Invalidation Pattern</h2>\n<div class=\"code-snippet-box\">\n  <div class=\"code-header-bar\">\n    <span>PHP / LARAVEL CACHING</span>\n    <span>TieredCacheService.php</span>\n  </div>\n  <pre><code>public function getOrCompute(string $cacheKey, callable $computation, int $ttl = 3600)\n{\n    // Layer 1: Check memory-level Redis store\n    $cached = Redis::get($cacheKey);\n    if ($cached !== null) {\n        return json_decode($cached, true);\n    }\n\n    // Layer 2: Atomic lock to eliminate cache stampedes\n    $lock = Cache::lock(\"lock:{$cacheKey}\", 10);\n    \n    return $lock->get(function () use ($cacheKey, $computation, $ttl) {\n        $result = $computation();\n        Redis::setex($cacheKey, $ttl, json_encode($result));\n        return $result;\n    });\n}</code></pre>\n</div>\n\n<h2>Eliminating Queue Bottlenecks</h2>\n<p>Heavy operations such as PDF receipt generation, transactional email delivery, webhook fanouts, and search index ingestion must never execute in the HTTP request loop. By pushing these tasks to decoupled workers with exponential backoff retries, the user-facing response returns in under 35 milliseconds.</p>',1,0,'2026-11-02 06:37:23','2026-11-08 06:37:23','2026-11-08 06:37:23'),(6,'From Figma Tokens to Production Tailwind 4: Eliminating the UI Handover Void','from-figma-tokens-to-production-tailwind-4-eliminating-ui-handover','Frontend & Next.js','Tailwind CSS, Figma Tokens, Design Systems, Next.js, TypeScript','Elena L.','Head of Design Engineering','EL','7 min read','images/stories/hauni.jpg','How we automate design token synchronization between Figma variable modes and Tailwind CSS configuration to achieve 100% pixel-perfect design parity.','<h2>The Cost of Manual UI Handover</h2>\n<p>In traditional product teams, designers spend weeks perfecting spacing scales, color variants, and typography tokens in Figma, only for frontend developers to eyeball hex codes and approximate padding in CSS. The outcome is technical debt, visual discrepancies, and endless QA review cycles.</p>\n\n<p>By establishing a single source of truth for design variables, we compile design tokens directly into CSS variables consumed by Tailwind CSS v4 without any manual translation.</p>\n\n<h2>The Token Build Pipeline</h2>\n<p>We use GitHub Actions to trigger automated token builds whenever a Figma library publish event occurs:</p>\n<ul>\n  <li>Figma REST API extracts design tokens from component variable modes.</li>\n  <li>Tokens are parsed and typed using Style Dictionary.</li>\n  <li>Generated CSS tokens are committed to the design system package repository.</li>\n  <li>Tailwind CSS `@theme` variables are updated atomically with zero manual edits.</li>\n</ul>',1,0,'2026-10-30 06:37:23','2026-11-08 06:37:23','2026-11-08 06:37:23'),(7,'Zero-Trust Cloud Infrastructure: Secretless CI/CD with HashiCorp Vault & OIDC','zero-trust-cloud-infrastructure-secretless-cicd-vault-oidc','DevSecOps & Security','DevSecOps, HashiCorp Vault, AWS, GitHub Actions, Zero Trust','Vikram S.','Principal DevSecOps Engineer','VS','5 min read','images/stories/screens-clicks.jpg','Eliminate hardcoded cloud tokens forever. How our engineering teams authenticate ephemeral deployment runners using OIDC federation and dynamic STS credentials.','<h2>Why Long-Lived API Keys Must Die</h2>\n<p>Static AWS Access Keys or GCP service account credentials stored in repository secrets represent a major attack vector. If a repository or developer device is compromised, those long-lived secrets can grant attackers direct access to production clusters.</p>\n\n<p>Zero-Trust CI/CD replaces static keys with <strong>OpenID Connect (OIDC) identity federation</strong>. The CI runner obtains a cryptographically signed identity token from GitHub Actions and exchanges it with cloud providers for short-lived credentials that expire automatically in 15 minutes.</p>\n\n<h2>Key Benefits of Secretless Pipelines</h2>\n<ul>\n  <li><strong>Zero Static Secrets:</strong> No credentials stored in repo settings or developer laptops.</li>\n  <li><strong>Narrow Privilege Scopes:</strong> IAM roles are restricted to specific branches and repository environments.</li>\n  <li><strong>Full Audit Traceability:</strong> CloudTrail logs reflect the exact commit hash and pipeline run responsible for every cloud action.</li>\n</ul>',1,0,'2026-10-27 06:37:23','2026-11-08 06:37:23','2026-11-08 06:37:23'),(8,'Offline-First Mobile Architecture: SQLite Delta Sync Without Merge Conflicts','offline-first-mobile-architecture-sqlite-delta-sync-merge-conflicts','Mobile Engineering','React Native, SQLite, Offline First, CRDT, Synchronization','Priya R.','Staff Mobile Architect','PR','8 min read','images/stories/hauni.jpg','Practical patterns for warehouse and logistics apps operating in zero-connectivity environments with state-based CRDTs and atomic local transactions.','<h2>The Harsh Reality of Field Connectivity</h2>\n<p>Industrial supply chain applications rarely operate in pristine high-speed Wi-Fi zones. Warehouse operators traverse subterranean storage bays, cargo holds, and remote distribution docks where mobile connections drop out constantly.</p>\n\n<p>Rather than treating network failure as an exceptional error, our mobile engineering architecture treats local offline persistence as the default mode of operation.</p>\n\n<h2>Conflict-Free Synchronization Design</h2>\n<p>To eliminate data conflicts without blocking operators, we utilize Conflict-Free Replicated Data Types (CRDTs) paired with high-performance local SQLite engines:</p>\n<ul>\n  <li>Local writes execute in less than 2 milliseconds against local storage.</li>\n  <li>Outbound mutations are queued in an append-only transaction ledger.</li>\n  <li>Background sync daemons negotiate bi-directional delta synchronization once network connectivity returns.</li>\n</ul>',1,0,'2026-10-24 06:37:23','2026-11-08 06:37:23','2026-11-08 06:37:23'),(9,'Migrating Monoliths to Micro-Frontends: Vite Module Federation at Scale','migrating-monoliths-to-micro-frontends-vite-module-federation-at-scale','Architecture','Micro-frontends, Vite, Architecture, TypeScript, Monorepo','Arjun M.','Principal Frontend Architect','AM','6 min read','images/stories/whitepaper-autonomous.png','How we decomposed an enterprise dashboard into 5 independently deployable micro-apps with shared state containers, sub-100ms cold starts, and zero bundle bloat.','<h2>When Frontend Monoliths Stagnate Velocity</h2>\n<p>As enterprise engineering teams scale past 20 engineers, working in a single monolithic frontend repository creates friction: CI/CD build times balloon, conflicting package dependencies break builds, and team deployments step on each other.</p>\n\n<p>Micro-frontends decompose large web applications into autonomous sub-applications that compile independently and assemble seamlessly at runtime via Vite Module Federation.</p>',1,0,'2026-10-21 06:37:23','2026-11-08 06:37:23','2026-11-08 06:37:23'),(10,'Deterministic LLM Agent Workflows: Guardrails, JSON Schemas & Audit Logging','deterministic-llm-agent-workflows-guardrails-json-schemas-audit-logging','AI & Systems','Autonomous Agents, Python, FastAPI, JSON Schema, Enterprise AI','Dr. Elena Rostova','VP of AI Systems &bull; Bluebase Technologies','ER','9 min read','images/stories/screens-clicks.jpg','Why stochastic chatbots fail enterprise transactions, and how to build deterministic agent loops with Pydantic schemas, tool-calling guards, and human escalation.','<h2>Bridging Cognitive Reasoning and Transactional Integrity</h2>\n<p>Large language models possess unmatched capabilities in unstructured natural language reasoning, text extraction, and semantic classification. However, enterprise software requires 100% deterministic predictability: executing financial reconciliations or updating ERP ledgers cannot tolerate hallucinated parameters.</p>\n\n<p>We build production AI agent architectures bounded by strict operational boundaries, constrained schema decoding, and immutable audit logs.</p>\n\n<h2>The 4 Pillars of Deterministic Agents</h2>\n<ul>\n  <li><strong>Constrained JSON Schema Output:</strong> Enforcing strict Pydantic model validation on every model completion.</li>\n  <li><strong>Granular Tool Permissions:</strong> Agents can only invoke verified API endpoints with signed OAuth tokens.</li>\n  <li><strong>Human-in-the-Loop Triggers:</strong> High-value transactions automatically trigger multi-factor human approval before write operations execute.</li>\n  <li><strong>Immutable Execution Ledgers:</strong> Every tool call, model prompt, and response payload is recorded in tamper-evident audit logs.</li>\n</ul>',1,0,'2026-10-18 06:37:23','2026-11-08 06:37:23','2026-11-08 06:37:23');
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
  `status` varchar(255) NOT NULL DEFAULT 'new',
  `admin_notes` text DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_inquiries`
--

LOCK TABLES `contact_inquiries` WRITE;
/*!40000 ALTER TABLE `contact_inquiries` DISABLE KEYS */;
INSERT INTO `contact_inquiries` VALUES (1,'Michael Schmidt','michael.schmidt@daimler-supply.de','Daimler Supply Logistics','+49 711 1790','SAP Native Integration & Optimization','Looking to modernize our warehouse mobile terminals running on SAP ECC 6.0 with offline capabilities.','new','Priority prospect. Follow-up meeting scheduled for Friday.','127.0.0.1','2026-11-06 06:01:20','2026-11-06 06:01:20');
/*!40000 ALTER TABLE `contact_inquiries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `demo_bookings`
--

DROP TABLE IF EXISTS `demo_bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `demo_bookings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `current_erp` varchar(255) DEFAULT NULL,
  `interested_product` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `admin_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `demo_bookings`
--

LOCK TABLES `demo_bookings` WRITE;
/*!40000 ALTER TABLE `demo_bookings` DISABLE KEYS */;
INSERT INTO `demo_bookings` VALUES (1,'Sarah Connor','sarah.connor@aerotech-defense.com','Aerotech Defense Systems','+1 (555) 432-8921','VP of IT Engineering','SAP S/4HANA Private Cloud','Bluebase DXP & Autonomous AI Agents','Need a live demonstration of multi-agent workflows executing transactional tasks with compliance audit trails.','confirmed','Assigned to Lead Solutions Architect. Demo environment provisioned.','2026-11-06 06:01:20','2026-11-06 06:01:20');
/*!40000 ALTER TABLE `demo_bookings` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_11_01_000001_create_bluebase_tables',1),(5,'2026_11_02_000001_create_cms_and_enhancements',1),(6,'2026_11_02_000002_create_seo_tables',1),(7,'2026_11_08_000001_add_metadata_to_blogs_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newsletter_subscribers`
--

DROP TABLE IF EXISTS `newsletter_subscribers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newsletter_subscribers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `newsletter_subscribers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newsletter_subscribers`
--

LOCK TABLES `newsletter_subscribers` WRITE;
/*!40000 ALTER TABLE `newsletter_subscribers` DISABLE KEYS */;
INSERT INTO `newsletter_subscribers` VALUES (1,'david.miller@enterprise-cloud.io','127.0.0.1',1,'2026-11-06 06:01:20','2026-11-06 06:01:20');
/*!40000 ALTER TABLE `newsletter_subscribers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_seos`
--

DROP TABLE IF EXISTS `page_seos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_seos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) NOT NULL,
  `route_name` varchar(255) NOT NULL,
  `url_path` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `canonical_url` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `robots` varchar(255) NOT NULL DEFAULT 'index, follow',
  `changefreq` varchar(255) NOT NULL DEFAULT 'weekly',
  `priority` decimal(2,1) NOT NULL DEFAULT 0.8,
  `is_in_sitemap` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_seos_route_name_unique` (`route_name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_seos`
--

LOCK TABLES `page_seos` WRITE;
/*!40000 ALTER TABLE `page_seos` DISABLE KEYS */;
INSERT INTO `page_seos` VALUES (1,'Web Development Services','services.web-development','/web-development','Web Development Services | Custom Web Applications & Websites | Bluebase Technologies','Bluebase Technologies provides custom web development services for startups and growing brands. We build scalable SaaS web applications, client portals, and fast websites with Laravel, React, Next.js, and Node.js.','custom web development, web application development, SaaS MVP development, Laravel web development, React web applications, custom website design, full stack engineering','https://bluebase.com/web-development','images/illustrations/workflow-canvas.jpg','index, follow','weekly',0.9,1,'2026-11-06 13:30:05','2026-11-06 13:30:05'),(2,'services.website-design','services.website-design','/website-design','Website Design & Build Services | Custom Responsive Websites | Bluebase Technologies','We design and build bespoke, high-converting websites for modern brands, founders, and startups. Core Web Vitals 90+ guaranteed, pixel-perfect responsive UI, and technical SEO.','custom website design, responsive web design, business website development, Tailwind CSS website, fast marketing website, modern website development studio','https://bluebasetech.com/website-design','/images/og-image.jpg','index, follow','weekly',0.9,1,'2026-11-06 13:50:41','2026-11-06 13:50:41'),(3,'services.mobile-app-development','services.mobile-app-development','/mobile-app-development','Mobile App Development Services | iOS & Android Apps | Bluebase Technologies','Custom cross-platform mobile app development with Flutter and React Native. Smooth smooth performance, offline sync, biometric security, and complete App Store release.','mobile app development, Flutter app development, React Native mobile apps, iOS app development, Android app development, cross platform mobile engineer','https://bluebasetech.com/mobile-app-development','/images/og-image.jpg','index, follow','weekly',0.9,1,'2026-11-06 13:50:41','2026-11-07 06:31:24'),(4,'services.saas-mvp-development','services.saas-mvp-development','/saas-mvp-development','SaaS MVP Development Services | Rapid 0 to 1 Launch | Bluebase Technologies','Turn your startup idea into a production-ready SaaS MVP in 3 to 6 weeks. Built with Laravel, React, Stripe billing, and scalable database schemas to validate with real users.','SaaS MVP development, startup MVP engineering, rapid software prototyping, Laravel SaaS, React SaaS application, 0 to 1 product development','https://bluebasetech.com/saas-mvp-development','/images/og-image.jpg','index, follow','weekly',0.9,1,'2026-11-06 13:50:41','2026-11-06 13:50:41'),(5,'services.ecommerce-development','services.ecommerce-development','/ecommerce-development','E-Commerce Development Services | Custom Online Stores | Bluebase Technologies','Custom e-commerce store development, custom storefronts, and payment gateway integrations with Stripe, Razorpay, and Shopify. Engineered for speed and maximum checkout conversions.','ecommerce development, custom online store, Shopify development, Laravel ecommerce, Stripe checkout integration, fast ecommerce website','https://bluebasetech.com/ecommerce-development','/images/og-image.jpg','index, follow','weekly',0.9,1,'2026-11-06 13:50:41','2026-11-06 13:50:41'),(6,'services.ui-ux-design','services.ui-ux-design','/ui-ux-design','UI/UX Product Design & Prototyping Services | Bluebase Technologies','Modern user experience and interface design for web and mobile products. Complete Figma design systems, wireframing, clickable prototypes, and developer-ready handoffs.','UI UX design, Figma design system, clickable prototype, product designer, web application UI design, mobile app UX design studio','https://bluebasetech.com/ui-ux-design','/images/og-image.jpg','index, follow','weekly',0.9,1,'2026-11-06 13:50:41','2026-11-06 13:50:41'),(7,'services.api-backend-development','services.api-backend-development','/api-backend-development','API & Backend Development Services | Scalable Architectures | Bluebase Technologies','High-performance backend systems, RESTful and GraphQL APIs, third-party integrations, and scalable database architectures engineered with Laravel, Node.js, and Redis.','API development, backend development, RESTful API, Laravel backend, Node.js backend, Redis caching, database indexing, third party integration','https://bluebasetech.com/api-backend-development','/images/og-image.jpg','index, follow','weekly',0.9,1,'2026-11-06 13:50:41','2026-11-06 13:50:41'),(8,'services.website-redesign','services.website-redesign','/website-redesign','Website Redesign & Speed Optimization Services | Bluebase Technologies','Revamp slow, outdated websites into fast, modern platforms. 90+ Google PageSpeed tuning, Core Web Vitals optimization, UI modernizations, and zero loss in existing SEO rankings.','website redesign, speed optimization, Google PageSpeed 90, Core Web Vitals optimization, slow website fix, modern UI refresh, technical SEO preservation','https://bluebasetech.com/website-redesign','/images/og-image.jpg','index, follow','weekly',0.9,1,'2026-11-06 13:50:41','2026-11-06 13:50:41'),(9,'services.maintenance-support','services.maintenance-support','/maintenance-support','Website & Web App Maintenance Services | Bluebase Technologies','Reliable ongoing maintenance, security updates, 24/7 uptime monitoring, automated backups, and priority bug fixes for websites and web applications.','website maintenance, web application support, security patching, uptime monitoring, automated backups, bug fixing retainer, code maintenance service','https://bluebasetech.com/maintenance-support','/images/og-image.jpg','index, follow','weekly',0.9,1,'2026-11-06 13:50:41','2026-11-06 13:50:41'),(10,'company.company','company','/company','About Bluebase Technologies | Digital Engineering Studio & Remote-First Team','Bluebase Technologies is an agile, remote-first digital engineering studio based in India. We architect custom websites, web applications, mobile apps, and scalable digital solutions for growing businesses worldwide.','about Bluebase, digital engineering startup India, remote first software developers, custom web engineering studio, hire dedicated developers India','https://bluebasetech.com/company','/images/og-image.jpg','index, follow','weekly',0.9,1,'2026-11-07 06:00:15','2026-11-07 06:01:54');
/*!40000 ALTER TABLE `page_seos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partner_applications`
--

DROP TABLE IF EXISTS `partner_applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner_applications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `partner_type` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'new',
  `admin_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partner_applications`
--

LOCK TABLES `partner_applications` WRITE;
/*!40000 ALTER TABLE `partner_applications` DISABLE KEYS */;
INSERT INTO `partner_applications` VALUES (1,'System Integrator (SI)','Nordic Integrations AB','Elin Lindqvist','partnerships@nordic-integrations.se','+46 8 123 4567','Sweden','We are an established SAP Gold Partner in Scandinavia and want to certify our consultants on Bluebase DXP.','new','Schedule introductory call with VP of Global Partnerships.','2026-11-06 06:01:20','2026-11-06 06:01:20');
/*!40000 ALTER TABLE `partner_applications` ENABLE KEYS */;
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
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `services_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Custom Web & Cloud Engineering','custom-web-cloud-engineering','High-velocity cloud native architectures','code-square','High-performance web applications, distributed cloud backends, and microservices architectures built for infinite scale and 99.99% reliability.','Architecting and deploying resilient, scalable web applications and cloud-native distributed microservices on AWS, Azure, and Google Cloud with deterministic enterprise security.','[\"Multi-cloud cloud-native architectures\",\"Microservices & event-driven data streaming\",\"High-concurrency API gateways & GraphQL\",\"99.99% SLA uptime with automated failover\"]',1,1,'2026-11-06 06:01:20','2026-11-06 06:01:20'),(2,'Autonomous AI Agents & Copilots','ai-agents-copilots','Enterprise-grade LLMs and autonomous multi-agent workflows','cpu','Multi-agent AI workflows that connect directly to your databases and APIs, automating complex multi-step operational tasks with deterministic safety.','Bridge the gap between enterprise data and cognitive automation. Our AI agents execute multi-step workflows, retrieve real-time context from ERPs, and run autonomous decision cycles safely.','[\"Deterministic retrieval-augmented generation (RAG)\",\"Multi-agent task orchestration & tool calling\",\"Native ERP & database operational access\",\"Guardrailed compliance and human-in-the-loop audit trails\"]',1,2,'2026-11-06 06:01:20','2026-11-06 06:01:20'),(3,'Legacy Modernization & Cloud Migration','legacy-modernization','De-risk legacy migrations with zero downtime','arrow-repeat','Phased strangler-fig migrations that decouple legacy monoliths into cloud-native microservices with zero operational downtime and zero data loss.','Transform dated monoliths and mission-critical legacy applications into agile, modern cloud stacks without interrupting everyday business operations.','[\"Strangler fig modernization patterns\",\"Mainframe & legacy ERP decoupling\",\"Zero-downtime database replication & cutover\",\"Containerization on Kubernetes & serverless\"]',1,3,'2026-11-06 06:01:20','2026-11-06 06:01:20'),(4,'Offline-First Enterprise Mobility','offline-first-mobility','Rugged industrial mobile apps that never drop out','phone','Mission-critical iOS and Android applications with local SQLite synchronization and hardware barcode/RFID verification that never drop out.','Keep your frontline teams productive in remote plants, deep underground warehouses, and off-grid facilities with guaranteed two-way delta sync.','[\"Hardware barcode, RFID & Bluetooth peripheral integration\",\"Robust conflict resolution & delta data synchronization\",\"Native iOS, Android & ruggedized Zebra\\/Honeywell device support\",\"Sub-millisecond local SQLite transaction response\"]',1,4,'2026-11-06 06:01:20','2026-11-06 06:01:20'),(5,'SAP Native Integration & Optimization','sap-native-integration','Direct ABAP integration without complex middleware','layers','Connect modern digital frontends directly to SAP S/4HANA and ECC using certified ABAP APIs, slashing latency and eliminating costly middleware licensing.','Unlock direct, certified communication between your front-end customer experiences and SAP ERP backbones without paying middleware bloat.','[\"Direct ABAP RFC \\/ OData certified connectors\",\"Sub-second transactional round-trip response times\",\"Preservation of SAP security roles and authorization matrix\",\"Bypass third-party API integration tolls\"]',1,5,'2026-11-06 06:01:20','2026-11-06 06:01:20'),(6,'Enterprise UI/UX & Design Systems','design-systems-dxp','Consumer-grade ergonomics for mission-critical enterprise tools','palette','Transform frustrating green-screen and cluttered ERP interfaces into sleek, intuitive, accessible design systems that cut training costs by 80%.','Design user journeys that maximize frontline velocity and eliminate user fatigue. We engineer cohesive component libraries and accessible design systems.','[\"Component design systems with Figma & Storybook sync\",\"WCAG 2.1 AA accessibility compliance\",\"Touch-optimized industrial UI for rugged handheld terminals\",\"Rapid interactive prototyping and user velocity benchmarking\"]',1,6,'2026-11-06 06:01:20','2026-11-06 06:01:20');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
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
-- Table structure for table `solutions`
--

DROP TABLE IF EXISTS `solutions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solutions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `solutions_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solutions`
--

LOCK TABLES `solutions` WRITE;
/*!40000 ALTER TABLE `solutions` DISABLE KEYS */;
INSERT INTO `solutions` VALUES (1,'Warehouse & Yard Management Mobility','warehouse-yard-management','High-velocity receiving, picking, putaway, and cycle counting','box-seam','End-to-end mobile barcode scanning and inventory movement apps with offline synchronization for fast warehouse execution.','Streamline every stock movement inside your fulfillment centers and logistics yards with real-time barcode scanning and instant ERP synchronization.','[\"Real-time bin location tracking & automated route pick optimization\",\"Instant SAP IM \\/ WM \\/ EWM delta synchronization\",\"Cycle counting with discrepancy alerts\"]',1,1,'2026-11-06 06:01:20','2026-11-06 06:01:20'),(2,'Predictive Asset Health & Maintenance','asset-health-maintenance','Maximize asset uptime with IoT sensors and AI diagnosis','tools','Empower field engineers with predictive maintenance schedules, equipment telemetry history, and digital work order sign-offs.','Prevent catastrophic machinery failures with AI-driven anomaly alerts and mobile-first work order execution directly tied to Plant Maintenance (PM).','[\"Automated work order creation from sensor thresholds\",\"Offline equipment manuals & interactive schematic diagrams\",\"Photo and audio capture for maintenance evidence\",\"Digital signatures & regulatory compliance documentation\"]',1,2,'2026-11-06 06:01:20','2026-11-06 06:01:20'),(3,'Secure Supplier & Vendor Portals','supplier-vendor-portals','Frictionless collaboration for global procurement networks','people','Self-service supplier onboarding, purchase order confirmations, advance shipping notifications (ASN), and automated invoice matching.','Cut down procurement email overhead by 70%. Provide suppliers a branded, secure portal for PO acknowledgement, order tracking, and discrepancy resolution.','[\"Self-service vendor profile & tax certification management\",\"PO flip to electronic invoice with 3-way matching\",\"Real-time delivery milestone notifications\",\"Multi-currency and global tax jurisdiction support\"]',1,3,'2026-11-06 06:01:20','2026-11-06 06:01:20'),(4,'Global Inventory & Supply Chain Sync','inventory-supply-chain','Real-time multi-echelon stock visibility and forecasting','globe2','Unify inventory across regional warehouses, transit hubs, and retail points for accurate fulfillment promises and reduced carrying costs.','Eliminate phantom stock and costly stockouts with bi-directional real-time data sync across all your ERP instances, 3PL partners, and sales channels.','[\"Multi-location aggregated stock availability\",\"Safety stock dynamic recalculation based on lead time variance\",\"Inter-company transfer order automation\",\"Comprehensive audit trail with serialized unit tracking\"]',1,4,'2026-11-06 06:01:20','2026-11-06 06:01:20');
/*!40000 ALTER TABLE `solutions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) NOT NULL,
  `client_role` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `quote` text NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `avatar` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (1,'Henrik Møller','Global IT Director','Hauni Maschinenbau GmbH','Bluebase delivered our offline-first shop floor suite ahead of schedule. Our plant operators experienced an immediate 80% reduction in scan-to-verify latency.',5,NULL,1,1,'2026-11-06 06:01:20','2026-11-06 06:01:20'),(2,'Claire Dupont','VP Supply Chain Digitalization','Bell Foods International','The autonomous AI inventory agents saved our logistics team over 40 hours of manual reconciliation every single week. Seamless SAP integration.',5,NULL,1,2,'2026-11-06 06:01:20','2026-11-06 06:01:20'),(3,'Arthur Pendelton','Chief Technology Officer','Rust-Oleum Europe','Unbelievably clean code, lightning-fast execution, and an intuitive UI that required zero user training. A game-changer for our manufacturing operations.',5,NULL,1,3,'2026-11-06 06:01:20','2026-11-06 06:01:20');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trial_requests`
--

DROP TABLE IF EXISTS `trial_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trial_requests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `company` varchar(255) NOT NULL,
  `cloud_platform` varchar(255) DEFAULT NULL,
  `sap_version` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `admin_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trial_requests`
--

LOCK TABLES `trial_requests` WRITE;
/*!40000 ALTER TABLE `trial_requests` DISABLE KEYS */;
INSERT INTO `trial_requests` VALUES (1,'Alex Turner','alex.turner@cloudscale-logistics.com','+1 (415) 890-1122','CloudScale Logistics Inc.','AWS','S/4HANA 2023','active','14-day enterprise sandbox provisioned on cluster eu-central-1.','2026-11-06 06:01:20','2026-11-06 06:01:20');
/*!40000 ALTER TABLE `trial_requests` ENABLE KEYS */;
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

-- Dump completed on 2026-11-09 10:58:53
