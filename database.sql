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
INSERT INTO `blog_categories` VALUES (1,'Websites & Digital Presence','websites-digital-presence','Practical advice on building modern, mobile-friendly business websites, landing pages, and turning online visitors into paying customers.','Websites & Digital Presence for Growing Businesses — Bluebase Guide','Clear, non-technical guides for business owners on creating fast, professional websites and building an authoritative online presence.',1,1,'2026-11-20 12:00:00','2026-11-20 12:00:00'),(2,'Business Growth & Marketing','business-growth-marketing','Tested strategies on Meta ads, Google Maps rankings, WhatsApp customer acquisition, and generating high-intent local inquiries.','Business Growth, Meta Ads & Local Customer Acquisition — Bluebase Guide','Learn how local and growing businesses generate consistent inquiries with targeted Meta advertising, Google Business Profile ranking, and WhatsApp funnels.',2,1,'2026-11-20 12:00:00','2026-11-20 12:00:00'),(3,'Software & Process Automation','software-process-automation','How growing businesses replace messy spreadsheets and manual paperwork with simple custom business software and save hours every day.','Business Software & Process Automation for Founders — Bluebase Guide','Simple, jargon-free guides on automating daily operations, booking portals, paperless customer agreements, and custom business portals.',3,1,'2026-11-20 12:00:00','2026-11-20 12:00:00'),(4,'Client Success Stories','client-success-stories','Real-world journeys and results from businesses we have helped grow with custom websites, digital systems, and targeted marketing funnels.','Real Client Stories & Business Transformations — Bluebase Technologies','Read how real companies like OMG Rental Bikes and Aarohi Classic scaled their operations and grew revenue with Bluebase.',4,1,'2026-11-20 12:00:00','2026-11-20 12:00:00'),(5,'Website Care & Support','website-care-support','Essential guides on keeping your business website fast, secure, backed up, and protected from costly downtime and lost sales.','Website Maintenance, Security & Uptime for Business Owners — Bluebase Guide','Understand why regular website maintenance, cloud backups, and uptime monitoring protect your digital sales and brand reputation.',5,1,'2026-11-20 12:00:00','2026-11-20 12:00:00');
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
  `helpful_count` int(10) unsigned NOT NULL DEFAULT 0,
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
INSERT INTO `blogs` (`id`, `title`, `slug`, `category`, `category_id`, `tags`, `author`, `author_role`, `author_avatar`, `read_time`, `image`, `excerpt`, `content`, `meta_title`, `meta_description`, `meta_keywords`, `focus_keyword`, `canonical_url`, `og_title`, `og_description`, `og_image`, `robots`, `schema_type`, `is_published`, `is_featured`, `published_at`, `created_at`, `updated_at`) VALUES (1,'Why Relying Only on Instagram or Facebook Is Risky for Your Business: The Value of an Owned Website','why-relying-only-on-instagram-facebook-is-risky-for-business','Websites & Digital Presence',1,'Business Website, Small Business Growth, Instagram vs Website, Online Credibility, Digital Office','Bluebase Growth Team','Digital Strategy & Client Success • Bluebase Technologies','BB','5 min read','images/stories/omg-rental-bikes-brand.png','Discover why building your entire business on social media leaves you vulnerable to sudden algorithm drops and account bans, and why a dedicated business website remains your most valuable 24/7 digital asset.','<h2>The Danger of Building on "Rented Land"</h2>
<p>Today, almost every business owner starts by creating an Instagram page or Facebook account. It is quick, free, and easy to post photos. But as your business grows, relying entirely on social media becomes one of the biggest hidden risks to your revenue.</p>

<p>Social media platforms are "rented land." You do not own your follower list, you do not control the platform, and you cannot dictate who sees your posts. Over the last three years, organic reach on social media has dropped significantly. On average, fewer than 5% to 10% of your own followers ever see what you post unless you pay to boost it.</p>

<div class="article-callout-box">
  <div class="callout-title">The Big Difference Between Followers and Customers</div>
  <p>Social media users are casually scrolling for entertainment. When someone searches Google for your service, they have an immediate problem and money in hand. An official website captures high-intent buyers, whereas social media feeds passive scrollers.</p>
</div>

<h2>4 Reasons Every Growing Business Needs an Official Website</h2>

<h3>1. Instant Credibility & Customer Trust</h3>
<p>When customers consider spending significant money on a service—whether interior design, legal advice, bike rentals, or medical treatments—the first thing they do is search your business name on Google.</p>
<p>If they find an official, beautifully designed website with clear pricing, completed projects, customer reviews, and contact details, their trust doubles instantly. If they only find an unverified Instagram handle or an outdated Facebook page, doubt creeps in. A professional website proves that you are a legitimate, established business that will be around tomorrow.</p>

<h3>2. Protection Against Account Bans & Algorithm Changes</h3>
<p>Social media accounts get hacked, restricted, or shadow-banned every day with zero explanation and no phone support to call. If your entire sales pipeline lives inside Instagram direct messages, losing your account can shut down your inquiries overnight.</p>
<p>A website with your own domain name (such as yourcompany.com) is <strong>100% owned by you</strong>. No third-party algorithm can take it down, hide your content, or restrict your reach.</p>

<h3>3. Your 24/7 Silent Sales Office</h3>
<p>You and your team cannot answer calls or reply to chats at 11:00 PM on a Sunday. But your potential customers are often researching services late at night from their couches.</p>
<p>A well-structured website acts as your tireless sales representative: it explains what services you offer, displays high-resolution photos of past work, answers common questions, and allows customers to send an inquiry directly to your WhatsApp or email while you sleep.</p>

<h3>4. Ranking on Google When Local Buyers Search</h3>
<p>Social media profiles rarely show up on the first page of Google when a buyer searches "best clinic near me" or "corporate website development". Having an optimized business website ensures your company appears directly in search results when local customers are ready to buy.</p>

<h2>How to Start Without Overcomplicating It</h2>
<p>You do not need a complicated, expensive 50-page portal on day one. A clean, mobile-friendly website with clear service descriptions, real customer photos, and a direct WhatsApp button is often all it takes to double your customer inquiries. At Bluebase Technologies, we help businesses build fast, trustworthy websites that pay for themselves within months.</p>','Why Social Media Is Not Enough: The Case for an Owned Business Website','Learn why growing businesses need their own professional website instead of relying solely on Instagram or Facebook pages for sales and credibility.','Business Website, Small Business Growth, Instagram vs Website, Online Credibility, Digital Office','Business Website','https://bluebasetechnologies.com/blog/why-relying-only-on-instagram-facebook-is-risky-for-business','Why Social Media Is Not Enough: The Case for an Owned Business Website','Learn why growing businesses need their own professional website instead of relying solely on Instagram or Facebook pages for sales and credibility.','images/stories/omg-rental-bikes-brand.png','index, follow','Article',1,1,'2026-11-20 10:00:00','2026-11-20 10:00:00','2026-11-20 18:30:00'),(2,'Stop Wasting Money on the "Boost Post" Button: How to Get Real Customer Inquiries on WhatsApp','stop-wasting-money-on-boost-post-get-real-whatsapp-inquiries','Business Growth & Marketing',2,'Meta Ads, Facebook Advertising, WhatsApp Lead Generation, Local Business Marketing, Cost Effective Ads','Bluebase Growth Team','Performance Marketing & Lead Strategy • Bluebase Technologies','BB','6 min read','images/stories/screens-clicks.jpg','Clicking the blue "Boost Post" button usually results in empty likes and random clicks from outside your area. Here is how smart businesses use targeted Meta ads and direct WhatsApp funnels to generate serious paying clients.','<h2>Why the Blue "Boost Post" Button Fails Most Businesses</h2>
<p>If you run a business Instagram or Facebook page, you have certainly seen the prompt: <em>"This post is performing better than 85% of your recent posts. Boost it for ₹500 to reach 4,000 more people."</em></p>

<p>You tap the button, pay the money, and 24 hours later your post has 300 likes and 50 new video views. But how many people actually called you? How many walked into your store or booked a service? For most business owners, the answer is zero.</p>

<p>Here is why: the "Boost Post" feature is specifically optimized by Meta for <strong>cheap engagement</strong> (likes and quick views). It shows your content to people who love double-tapping photos, not to people who have the intent or budget to hire your services. Worst of all, it often shows your post to people hundreds of kilometers away from your service city.</p>

<div class="article-callout-box">
  <div class="callout-title">The Rule of Profitable Advertising</div>
  <p>Likes do not pay your bills; conversations with qualified buyers do. A campaign that generates 8 genuine customer conversations on WhatsApp is infinitely more valuable than one with 1,000 likes and zero inquiries.</p>
</div>

<h2>The 3-Step Strategy That Actually Works for Local Businesses</h2>

<h3>1. Laser-Focused Local Radius Targeting</h3>
<p>If you run an interior design studio, rental service, dental clinic, or fitness center, you only care about people who can physically visit you or hire you in your city. Instead of boosting posts broadly, professional ad campaigns use geo-radius targeting (e.g., 5 to 12 km around your primary locations) and target high-income neighborhood areas.</p>

<h3>2. High-Trust Video Reels from Real Phone Footage</h3>
<p>You do not need an expensive Bollywood production. Everyday smartphone videos perform significantly better on social media than polished commercial stock clips:</p>
<ul>
  <li>Show a quick 20-second walkthrough of a project you just completed.</li>
  <li>Explain one common mistake customers make and how your service solves it.</li>
  <li>Show the owner or staff speaking authentically about what makes your service dependable.</li>
</ul>

<h3>3. Direct 1-Click WhatsApp Routing</h3>
<p>Traditional corporate contact forms with 10 fields create friction. Most customers on mobile phones do not want to fill out long forms and wait 2 days for an email reply. They want answers now.</p>
<p>By connecting your ad directly to a fast mobile landing page with a one-click WhatsApp button, interested buyers start a direct chat with your business desk within 30 seconds of seeing your ad.</p>

<h2>The 5-Minute Follow-Up Rule</h2>
<p>Here is a critical secret that separates businesses that win from those that lose: <strong>speed of response</strong>. When someone sends an inquiry on WhatsApp, they are actively looking at their phone right now. If your team replies within 5 minutes, your chances of closing the deal are 400% higher than if you reply 3 hours later when they have moved on to a competitor.</p>

<h2>Testing with a Small, Safe Pilot</h2>
<p>You do not need to invest ₹50,000 to get started. At Bluebase Technologies, we structure budget-friendly 30-day pilot campaigns starting with as little as ₹100 daily ad budget paired with professional creatives and WhatsApp integration so business owners can verify real inquiries before scaling.</p>','Stop Wasting Money on Boost Post: The WhatsApp Inquiries Guide','Why boosting social media posts rarely gets paying customers, and how a targeted ad campaign with direct WhatsApp routing delivers real client inquiries.','Meta Ads, Facebook Advertising, WhatsApp Lead Generation, Local Business Marketing, Cost Effective Ads','Meta Ads','https://bluebasetechnologies.com/blog/stop-wasting-money-on-boost-post-get-real-whatsapp-inquiries','Stop Wasting Money on Boost Post: The WhatsApp Inquiries Guide','Why boosting social media posts rarely gets paying customers, and how a targeted ad campaign with direct WhatsApp routing delivers real client inquiries.','images/stories/screens-clicks.jpg','index, follow','Article',1,1,'2026-11-19 10:00:00','2026-11-19 10:00:00','2026-11-20 18:30:00'),(3,'Is Your Business Trapped in Excel & WhatsApp Groups? How Custom Software Saves Hours Every Week','business-trapped-in-excel-whatsapp-how-custom-software-saves-hours','Software & Process Automation',3,'Custom Software, Business Automation, Replace Spreadsheets, Small Business ERP, Paperless Operations','Bluebase Solutions Team','Business Process Automation Lead • Bluebase Technologies','BB','7 min read','images/stories/omg-rental-bikes-brand.png','When customer orders, staff tasks, and billing records are scattered across WhatsApp chats and messy spreadsheets, mistakes happen. Learn how a simple custom business portal gives you total control.','<h2>The Breaking Point of Every Growing Business</h2>
<p>When you start a business, keeping records in a notebook or an Excel sheet works fine. You communicate with staff on WhatsApp, save customer documents on a phone, and remember things in your head.</p>

<p>Then your business starts succeeding. Instead of 5 customers a week, you have 50. Suddenly, the cracks appear:</p>
<ul>
  <li>Someone accidentally deletes a row in Excel, throwing off your revenue totals.</li>
  <li>A staff member forgets to note down a booking, leading to an angry customer arriving for an unavailable service.</li>
  <li>Customer identity documents (Aadhaar, driving licenses) are scattered across multiple personal WhatsApp chats with zero security.</li>
  <li>You spend 2 hours every evening just calling your staff to find out what happened during the day.</li>
</ul>

<div class="article-callout-box">
  <div class="callout-title">The Real Cost of Administrative Chaos</div>
  <p>Every hour you spend manually verifying receipts, searching for customer documents, or reconciling spreadsheet rows is an hour you did not spend finding new clients or growing your revenue.</p>
</div>

<h2>What Simple Custom Software Actually Looks Like</h2>
<p>Many business owners think "software" means spending millions of rupees on giant corporate systems like SAP or Salesforce. That is completely unnecessary.</p>
<p>Today, Bluebase builds streamlined, easy-to-use web applications that run directly in your mobile browser and do exactly what your business needs:</p>

<h3>1. Real-Time Availability & Booking Calendar</h3>
<p>Whether you manage rental vehicles, equipment, hotel rooms, or client consultation slots, your team sees a live visual calendar. When an item is booked, it is automatically locked, making double-booking physically impossible.</p>

<h3>2. Paperless Digital Agreements & KYC on Mobile Phones</h3>
<p>Instead of printing paper agreements and filing photocopies, your customer or field agent takes a photo of their ID with a smartphone. The system automatically creates a clean, digital agreement that the customer signs right on the phone screen with their finger. Both parties instantly receive a copy on WhatsApp.</p>

<h3>3. Automatic Payment Tracking & Security Deposits</h3>
<p>No more guessing whether a client paid their advance or if a security deposit was refunded. Every transaction is tied to the customer profile with instant status indicators (Paid, Pending, Refunded).</p>

<h2>Real-Life Example: OMG Rental Bikes</h2>
<p>OMG Rental Bikes operates a popular two-wheeler vehicle rental business. In their early days, hand-written paper registers caused confusion during busy tourist weekends: long customer queues, delayed security deposit refunds, and manual contract writing.</p>
<p>Bluebase built them a custom, lightweight fleet portal. Today, customers complete their verification online in 2 minutes, staff verify vehicles on smartphones, and the business operates smoothly with zero paper. They scaled their bookings by 400% with the exact same team size.</p>

<h2>You Own It Forever (No Costly Monthly Per-User Fees)</h2>
<p>Most commercial software platforms charge ₹2,000 to ₹5,000 per staff member every single month. When you have 10 employees, that is ₹50,000 leaving your bank account every month forever. A custom portal built for your business is <strong>100% owned by you</strong>, with zero per-user subscription fees.</p>','How Custom Business Software Replaces Spreadsheet Chaos — Bluebase','Discover how simple custom web portals help growing businesses replace messy Excel sheets, automate booking agreements, and save 20 hours every week.','Custom Software, Business Automation, Replace Spreadsheets, Small Business ERP, Paperless Operations','Custom Software','https://bluebasetechnologies.com/blog/business-trapped-in-excel-whatsapp-how-custom-software-saves-hours','How Custom Business Software Replaces Spreadsheet Chaos — Bluebase','Discover how simple custom web portals help growing businesses replace messy Excel sheets, automate booking agreements, and save 20 hours every week.','images/stories/omg-rental-bikes-brand.png','index, follow','Article',1,0,'2026-11-18 10:00:00','2026-11-18 10:00:00','2026-11-20 18:30:00'),(4,'How Local Businesses Rank #1 on Google Maps and Get Daily Calls from Nearby Customers','how-local-businesses-rank-on-google-maps-get-daily-calls','Business Growth & Marketing',2,'Google Business Profile, Google Maps Ranking, Local SEO, Nearby Customers, GMB Profile Creation','Bluebase Growth Team','Local Search & GMB Specialist • Bluebase Technologies','BB','5 min read','images/stories/screens-clicks.jpg','When someone nearby searches for your service on Google Maps, do they find you or your competitor? Discover 5 simple, proven steps to rank your Google Business Profile and get daily customer calls.','<h2>The Most Profitable Search on the Internet: "Near Me"</h2>
<p>Think about the last time you needed a car mechanic, an eye doctor, an interior designer, or a rental bike in a hurry. What did you do? You opened your phone and typed what you needed on Google or Google Maps.</p>

<p>You did not look past the top 3 map results. You tapped the call button on the one with great photos, high ratings, and clear information.</p>

<p>This is called the <strong>Google Local 3-Pack</strong>, and it generates more high-converting phone calls and store visits for local businesses than any billboard, flyer, or newspaper advertisement ever could. Best of all, listing your business on Google Maps is completely free.</p>

<div class="article-callout-box">
  <div class="callout-title">The Psychology of Local Search</div>
  <p>People searching Google Maps are not looking for entertainment. They have their wallet ready and want to hire someone today. Being visible in the top 3 results is like having a showroom on the busiest road in town.</p>
</div>

<h2>5 Simple Steps to Rank Higher on Google Maps</h2>

<h3>1. Complete 100% of Your Profile Information</h3>
<p>Google prioritizes businesses that give customers complete, transparent information. Make sure your profile has:</p>
<ul>
  <li>Your exact legal business name (avoid stuffing 10 fake keywords into your title, which can get you suspended).</li>
  <li>Accurate opening and closing hours, including special holiday timings.</li>
  <li>Your primary service category accurately selected (e.g., "Interior Designer" or "Motorcycle Rental Agency").</li>
  <li>A working phone number and verified business address.</li>
</ul>

<h3>2. Connect a Verified Official Business Website</h3>
<p>Many local businesses leave the "Website" field blank or paste a link to their personal Instagram profile. Google\'s search algorithms specifically check whether your business has a fast, responsive website matching your business name and address. Having an official website gives your Google profile an immediate authority boost over competitors who do not have one.</p>

<h3>3. Upload Real, High-Quality Photos Weekly</h3>
<p>Do not upload generic stock images. Google\'s image recognition algorithms easily detect stock photos. Upload authentic photos taken directly on your smartphone:</p>
<ul>
  <li>Your office, clinic, or showroom entrance and interior.</li>
  <li>Your staff working or greeting customers.</li>
  <li>Before-and-after photos of completed client projects.</li>
</ul>

<h3>4. Gather Real Customer Reviews with Specific Service Mentions</h3>
<p>A business with forty 5-star reviews will almost always outrank a business with three reviews. But here is an insider tip: when asking satisfied clients for a review, gently ask them to mention what service they received.</p>
<p>For example, a review that says <em>"Bluebase built our customized fleet booking website and it works smoothly"</em> helps Google rank that profile for "customized booking website" far more than a generic review saying <em>"Great service."</em></p>

<h3>5. Respond to Every Single Review (Positive & Negative)</h3>
<p>Google rewards active businesses. Take 2 minutes every week to reply politely to every review your business receives. If you ever receive an unfair negative review, respond professionally and offer to resolve the issue—potential customers read your response to judge how well you handle client relationships.</p>

<h2>Letting Experts Handle Your Local Visibility</h2>
<p>Maintaining high local rankings requires consistent profile optimization, geotagged photo updates, and review monitoring. At Bluebase Technologies, our team handles end-to-end Google Business Profile optimization and local digital presence so your phone keeps ringing with genuine inquiries.</p>','How to Rank on Google Maps (GMB) for Local Customers — Bluebase','A practical guide for local businesses to optimize Google Business Profile, rank higher on Google Maps, and get direct phone calls from nearby customers.','Google Business Profile, Google Maps Ranking, Local SEO, Nearby Customers, GMB Profile Creation','Google Business Profile','https://bluebasetechnologies.com/blog/how-local-businesses-rank-on-google-maps-get-daily-calls','How to Rank on Google Maps (GMB) for Local Customers — Bluebase','A practical guide for local businesses to optimize Google Business Profile, rank higher on Google Maps, and get direct phone calls from nearby customers.','images/stories/screens-clicks.jpg','index, follow','Article',1,0,'2026-11-17 10:00:00','2026-11-17 10:00:00','2026-11-20 18:30:00'),(5,'How Much Should a Business Website Cost in 2026? A Transparent Guide for Business Owners','how-much-business-website-cost-transparent-guide','Websites & Digital Presence',1,'Website Cost Guide, Small Business Website, Website Pricing, Web Design Investment, Agency vs Freelancer','Bluebase Advisory Team','Principal Business Consultant • Bluebase Technologies','BB','6 min read','images/stories/omg-rental-bikes-brand.png','Confused by website quotes ranging from ₹3,000 to ₹3,00,000? Here is an honest, transparent breakdown of what you actually need, what drives website costs, and how to avoid costly traps.','<h2>Why Website Pricing Is So Confusing</h2>
<p>If you have ever asked three different web developers for a quote, you probably received three wildly different numbers: one freelancer offered to do it for ₹3,000, another quoted ₹35,000, and an agency asked for ₹2,50,000.</p>

<p>How can the same project cost ₹3,000 from one person and ₹35,000 from another? What are you actually paying for, and how do you know if you are getting ripped off or getting a great deal?</p>

<div class="article-callout-box">
  <div class="callout-title">The Golden Rule of Web Investment</div>
  <p>A website is not an expense like office rent; it is an asset like a delivery van or showroom. A cheap website that brings zero inquiries is expensive at ₹3,000. A ₹25,000 website that brings 4 new clients every month has paid for itself within 60 days.</p>
</div>

<h2>The Danger of the "₹3,000 Cheap Website" Trap</h2>
<p>Every week, business owners come to Bluebase asking for help fixing a website built by someone who charged ₹3,000 to ₹5,000. Here is what almost always happens with ultra-cheap websites:</p>
<ul>
  <li><strong>Pirated Templates & Security Risks:</strong> Cheap developers use pirated WordPress themes downloaded from untrusted sites, which often contain hidden malware that eventually infects your site or gets it blacklisted by Google.</li>
  <li><strong>Slow Loading Times:</strong> They place your website on cheap, overcrowded shared servers, making your site take 8 to 10 seconds to open on a phone. Over 60% of mobile visitors close the tab before it even opens.</li>
  <li><strong>Broken Mobile Layout:</strong> Text cuts off on smartphones, buttons cannot be clicked, and contact forms fail silently.</li>
  <li><strong>The Disappearing Developer:</strong> Once you pay the money, the developer stops answering calls when something breaks a month later.</li>
</ul>

<h2>The 4 Real Building Blocks of a Quality Business Website</h2>

<h3>1. Domain Name (₹800 - ₹1,500 / year)</h3>
<p>This is your digital address (e.g., yourbusiness.com). Always register this under your own name or company email so you retain legal ownership of your brand name.</p>

<h3>2. Reliable Fast Hosting & Security SSL (₹3,000 - ₹8,000 / year)</h3>
<p>This is the server where your website files live. Quality hosting ensures your site loads in under 2 seconds on mobile phones and includes a secure green padlock (SSL certificate) so customers know their details are protected.</p>

<h3>3. Professional Design & Build (₹15,000 - ₹50,000 one-time)</h3>
<p>This is where the actual value lies. A professional web partner does not just paste text into a template; they:</p>
<ul>
  <li>Structure your service pages so visitors understand your value in 5 seconds.</li>
  <li>Write clear, high-converting headlines and service descriptions.</li>
  <li>Optimize every image and line of code for sub-2-second mobile load speed.</li>
  <li>Integrate direct WhatsApp chat buttons, Google Maps, and lead capture forms.</li>
  <li>Ensure your website looks sharp and readable across iPhones, Android phones, tablets, and laptops.</li>
</ul>

<h3>4. Ongoing Care & Maintenance (₹1,000 - ₹3,000 / month)</h3>
<p>Software needs periodic updates, security patches, and off-site backups to stay healthy and fast.</p>

<h2>How to Calculate Your Return on Investment (ROI)</h2>
<p>Ask yourself one simple question: <em>"What is the average profit I make from a single new client?"</em></p>
<p>If your average client brings you ₹15,000 in profit, your new website only needs to generate <strong>two clients in an entire year</strong> to completely pay for itself. Everything after that is pure profit for your business.</p>','How Much Does a Business Website Cost? Transparent 2026 Guide','A transparent guide for business owners explaining realistic website costs, the danger of cheap templates, and what to look for before hiring a developer.','Website Cost Guide, Small Business Website, Website Pricing, Web Design Investment, Agency vs Freelancer','Website Cost Guide','https://bluebasetechnologies.com/blog/how-much-business-website-cost-transparent-guide','How Much Does a Business Website Cost? Transparent 2026 Guide','A transparent guide for business owners explaining realistic website costs, the danger of cheap templates, and what to look for before hiring a developer.','images/stories/omg-rental-bikes-brand.png','index, follow','Article',1,0,'2026-11-16 10:00:00','2026-11-16 10:00:00','2026-11-20 18:30:00'),(6,'Why Websites Stop Working Silently: The Business Owner\'s Guide to Website Maintenance & Security','why-websites-stop-working-guide-to-website-maintenance-for-business-owners','Website Care & Support',5,'Website Maintenance, Uptime Protection, Cloud Backups, Website Security, Stop Lost Sales','Bluebase Support Desk','Technical Operations & Uptime Lead • Bluebase Technologies','BB','5 min read','images/stories/screens-clicks.jpg','A website is not a one-time printed brochure; it is your digital storefront. Learn why contact forms silently stop sending emails, why security updates matter, and how regular maintenance protects your income.','<h2>The Mystery of the "Silent Form Failure"</h2>
<p>A few months ago, a business owner called our office in frustration. For two straight weeks, their phone had stopped ringing with website inquiries. They assumed business was simply slow during that season.</p>

<p>When our team inspected their website, we found something alarming: their contact form had silently stopped working after an automated server update. Inquiries submitted by potential customers were disappearing into server error logs without notifying anyone. They had unknowingly lost dozens of high-value client inquiries over two weeks.</p>

<p>This happens all the time. Unlike a car that makes a loud noise when an engine part fails, <strong>websites break silently</strong>. A broken form or slow server will not send you an alert—it will simply cost you customers without you ever realizing it.</p>

<div class="article-callout-box">
  <div class="callout-title">A Website Is an Engine, Not a Billboard</div>
  <p>Your website runs on databases, hosting servers, programming scripts, and security certificates. Like an automobile that needs regular oil changes and tire checks, a website requires monthly care to stay fast, secure, and reliable.</p>
</div>

<h2>3 Common Things That Break When Websites Are Neglected</h2>

<h3>1. Expired Security Certificates ("Not Secure" Warnings)</h3>
<p>Every website requires an SSL certificate (the little padlock next to your web address). If this certificate expires, modern browsers like Google Chrome and Apple Safari immediately display a terrifying red warning screen to visitors: <em>"Your connection is not private. Attackers might be trying to steal your information."</em></p>
<p>Over 90% of visitors immediately leave the site when they see this warning, assuming the company is unsafe or out of business.</p>

<h3>2. Accumulating Junk & Slow Loading Speeds</h3>
<p>Over time, websites accumulate unoptimized images, database revisions, and outdated scripts. A website that loaded in 2 seconds when it was built can slow down to 7 or 8 seconds after a year of neglect. Google notices this slowdown and gradually pushes your website below faster competitors in search results.</p>

<h3>3. Security Vulnerabilities & Spam Hacks</h3>
<p>Automated hacker bots scan millions of websites every day searching for outdated software plugins. Once they find an unpatched site, they inject spam links or redirect your visitors to malicious foreign websites, leading Google to blacklist your domain name.</p>

<h2>What a Proper Website Care Plan Includes</h2>
<p>Good website maintenance is not complicated, but it must be done consistently by professionals:</p>
<ul>
  <li><strong>24/7 Automated Uptime Checks:</strong> Robot monitors checking your site every 60 seconds so if an outage occurs, technicians fix it before clients notice.</li>
  <li><strong>Automated Cloud Backups:</strong> Daily or weekly copies of your entire website stored safely on separate cloud storage, so if anything ever crashes, it can be restored with a single click.</li>
  <li><strong>Monthly Security Updates:</strong> Testing and applying updates safely so your site remains protected against new vulnerabilities.</li>
  <li><strong>Form Testing & Health Verification:</strong> Periodically submitting test inquiries to ensure emails and WhatsApp notifications arrive without delay.</li>
</ul>

<h2>Focus on Running Your Business, Let Experts Handle the Tech</h2>
<p>You should not have to spend your weekends worrying about server updates, SSL renewals, or database backups. Bluebase Technologies provides simple, affordable website care plans that protect your online revenue and ensure your site is always fast, secure, and open for business.</p>','Why Websites Stop Working Silently: Business Owner Maintenance Guide','A non-technical guide explaining why websites break silently, the importance of cloud backups, and how routine maintenance protects your inquiries.','Website Maintenance, Uptime Protection, Cloud Backups, Website Security, Stop Lost Sales','Website Maintenance','https://bluebasetechnologies.com/blog/why-websites-stop-working-guide-to-website-maintenance-for-business-owners','Why Websites Stop Working Silently: Business Owner Maintenance Guide','A non-technical guide explaining why websites break silently, the importance of cloud backups, and how routine maintenance protects your inquiries.','images/stories/screens-clicks.jpg','index, follow','Article',1,0,'2026-11-15 10:00:00','2026-11-15 10:00:00','2026-11-20 18:30:00'),(7,'Case Study: How OMG Rental Bikes Automated Fleet Operations and Scaled 400% with a Custom Booking Portal','case-study-how-omg-rental-bikes-automated-fleet-operations-scaled-400-percent','Client Success Stories',4,'Case Study, Vehicle Rental Software, Fleet Management, Digital KYC, Client Success','Bluebase Client Success Team','Head of Client Implementations • Bluebase Technologies','BB','6 min read','images/stories/omg-rental-bikes-brand.png','Read the real journey of how an urban bike rental business eliminated manual registers, stopped double-booking vehicles, and made customer checkouts paperless and fast.','<h2>The Story of an Ambitious Rental Business</h2>
<p>OMG Rental Bikes (<a href="https://omgrentalbikes.com" target="_blank" rel="noopener">omgrentalbikes.com</a>) is one of the fastest-growing two-wheeler vehicle rental services in Central India. Whether travelers need a comfortable scooter for a day of local sightseeing or an enthusiast needs a premium motorcycle for a weekend road trip, OMG Rental Bikes is their first choice.</p>

<p>However, as their vehicle fleet expanded past dozens of bikes, their operational paperwork started overwhelming their front-desk team.</p>

<h2>The 3 Challenges They Faced Every Day</h2>

<h3>1. The Weekend Booking Rush</h3>
<p>During peak holiday weekends, their phone lines were non-stop busy. Staff were writing down reservations on notepad sheets while simultaneously handing over keys. Inevitably, two different staff members would promise the same Royal Enfield to two different customers, causing customer frustration and stressful arguments.</p>

<h3>2. The Paperwork & Verification Nightmare</h3>
<p>For every rental, staff had to take physical photocopies of driving licenses and Aadhaar cards, manually fill out three-page paper lease forms, and collect cash deposits. Finding an agreement from three months ago meant digging through dusty folders of physical paperwork.</p>

<h3>3. Slow Vehicle Returns</h3>
<p>When returning a bike, calculating extra hours, inspecting fuel levels, and refunding security deposits took 15 to 20 minutes per customer, creating long queues at their service counter.</p>

<div class="article-callout-box">
  <div class="callout-title">The Goal</div>
  <p>Build a clean, lightning-fast digital system that allows customers to reserve vehicles online, upload their documents from their phone, and pick up their keys in under 2 minutes.</p>
</div>

<h2>What Bluebase Built for OMG Rental Bikes</h2>
<p>Bluebase Technologies partnered with the leadership team at OMG Rental Bikes to build a tailored digital operating system:</p>

<ul>
  <li><strong>Live Online Booking Engine:</strong> Customers visit <a href="https://omgrentalbikes.com" target="_blank" rel="noopener">omgrentalbikes.com</a>, select their preferred bike model, pick their rental dates, and reserve in 60 seconds with live vehicle availability.</li>
  <li><strong>Instant Mobile KYC:</strong> Customers upload their driving license and selfie right from their phone camera. Documents are securely saved and organized digitally with zero physical paper.</li>
  <li><strong>Digital Lease Signing:</strong> Rental terms and conditions are accepted electronically, and a digital agreement copy is instantly sent to the customer\'s WhatsApp.</li>
  <li><strong>Fleet Dashboard on Smartphone:</strong> Branch managers can check vehicle status, upcoming returns, and payment records from their mobile phones anytime, anywhere.</li>
</ul>

<h2>The Real-World Business Results</h2>
<div class="table-responsive" style="margin: 28px 0;">
  <table class="table" style="width: 100%; border-collapse: collapse; font-size: 0.95rem;">
    <thead>
      <tr style="background: #0A0F24; color: #ffffff;">
        <th style="padding: 12px 16px; text-align: left;">Operational Metric</th>
        <th style="padding: 12px 16px; text-align: left;">Before Bluebase</th>
        <th style="padding: 12px 16px; text-align: left;">After Bluebase System</th>
      </tr>
    </thead>
    <tbody>
      <tr style="border-bottom: 1px solid #e2e8f0;">
        <td style="padding: 12px 16px; font-weight: 600;">Customer Pickup Time</td>
        <td style="padding: 12px 16px; color: #dc2626;">15 - 20 minutes</td>
        <td style="padding: 12px 16px; color: #059669; font-weight: 600;">Under 2 minutes</td>
      </tr>
      <tr style="border-bottom: 1px solid #e2e8f0;">
        <td style="padding: 12px 16px; font-weight: 600;">Double-Booking Conflicts</td>
        <td style="padding: 12px 16px; color: #dc2626;">Frequent during rush</td>
        <td style="padding: 12px 16px; color: #059669; font-weight: 600;">0% (Completely eliminated)</td>
      </tr>
      <tr style="border-bottom: 1px solid #e2e8f0;">
        <td style="padding: 12px 16px; font-weight: 600;">Paper Agreement Costs</td>
        <td style="padding: 12px 16px; color: #dc2626;">High printing &amp; storage</td>
        <td style="padding: 12px 16px; color: #059669; font-weight: 600;">100% Paperless &amp; Digital</td>
      </tr>
      <tr style="border-bottom: 1px solid #e2e8f0;">
        <td style="padding: 12px 16px; font-weight: 600;">Online Booking Volume</td>
        <td style="padding: 12px 16px; color: #dc2626;">Manual phone calls only</td>
        <td style="padding: 12px 16px; color: #059669; font-weight: 600;">400% growth in 90 days</td>
      </tr>
    </tbody>
  </table>
</div>

<h2>What This Means for Your Business</h2>
<p>OMG Rental Bikes\' success proves that you do not have to be a multinational corporation to benefit from custom digital systems. Any business that deals with appointments, bookings, field staff, or customer paperwork can streamline operations, impress clients, and unlock massive revenue growth with the right digital partner.</p>','Case Study: How OMG Rental Bikes Scaled 400% with Bluebase','How Bluebase built an automated rental booking portal and paperless digital KYC system for OMG Rental Bikes, scaling bookings by 400%.','Case Study, Vehicle Rental Software, Fleet Management, Digital KYC, Client Success','Case Study','https://bluebasetechnologies.com/blog/case-study-how-omg-rental-bikes-automated-fleet-operations-scaled-400-percent','Case Study: How OMG Rental Bikes Scaled 400% with Bluebase','How Bluebase built an automated rental booking portal and paperless digital KYC system for OMG Rental Bikes, scaling bookings by 400%.','images/stories/omg-rental-bikes-brand.png','index, follow','Article',1,0,'2026-11-14 10:00:00','2026-11-14 10:00:00','2026-11-20 18:30:00');
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
