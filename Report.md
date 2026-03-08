# Research Report: CMS & E-Commerce Frameworks
**Kyanon Digital – Trainee Entrance Assessment | Câu 1**

---

## Introduction

When starting a new web project, one of the earliest — and most consequential — decisions is choosing the right platform. Get it wrong and you spend months fighting the framework instead of building features. Two names that come up constantly in the PHP world are **Magento** and **Drupal**. They are both mature, open-source, and widely used in enterprise contexts, yet they solve entirely different problems. This report looks at what sets them apart, what a realistic production stack around them looks like, and why the industry is increasingly moving toward a Headless CMS approach.

---

## 1. Magento vs Drupal — Same Language, Different Jobs

It is easy to lump Magento and Drupal together because they are both built in PHP and both have large plugin ecosystems. But that is roughly where the similarity ends.

**Magento** (rebranded as Adobe Commerce) was built from the ground up for **online retail**. Everything in its architecture — product catalogs, inventory management, shopping carts, checkout flows, payment gateway integrations, order tracking — exists to support the act of selling. If a business needs a store, Magento is a natural fit. Nike and Ford use Magento-based solutions precisely because the platform handles the complexity of large-scale commerce out of the box.

**Drupal** takes a completely different angle. It is a **Content Management System**, meaning its core job is to help teams create, organize, and publish structured content. Think long-form articles, multilingual news sites, government portals with complex access controls, or university websites where dozens of editors manage thousands of pages. NASA and The Economist both run on Drupal because it handles that kind of structured, permission-heavy content workflow better than almost anything else.

So the practical question when choosing between them is simple: *Are you primarily selling something, or publishing something?* Magento answers the first question well; Drupal answers the second. Using one for the other's job is possible — but you will feel the friction.

---

## 2. The Tech Stack Behind the Platform

Neither Magento nor Drupal runs in isolation. In any real production environment, the framework sits at the center of a broader stack, and each layer of that stack has a specific role to play.

**Web Server — Nginx or Apache**

The web server is the front door for every incoming request. It receives a browser's HTTP request and hands it off to PHP for processing. Nginx has become the preferred choice for Magento deployments in particular, because its event-driven architecture handles high volumes of concurrent connections more efficiently than Apache's traditional process-per-request model.

**Database — MySQL / MariaDB**

All persistent data — products, user accounts, content nodes, orders, configurations — lives in a relational database. Both Magento and Drupal are built around MySQL, with MariaDB serving as a widely used open-source alternative that maintains full compatibility. The database is the single most critical part of the stack: slow queries here cascade into slow page loads everywhere.

**Caching Layer — Redis and Varnish**

This is where performance optimizations become visible to real users. Without caching, every page request triggers a chain of PHP execution and database queries — expensive on a busy site. Redis is commonly used to cache sessions and backend data objects in memory, cutting database round-trips significantly. Varnish works at a different layer, sitting in front of the web server as a reverse proxy that serves fully cached HTML pages almost instantly, without even waking PHP up. Together they can make a site feel dramatically faster under load.

---

## 3. The Headless Trend — Why Decoupling Matters

For most of its history, a CMS like Drupal did two things: it stored your content, and it rendered your web pages. The template system, the theme layer, the HTML output — all baked in. This worked fine when the web was the only channel that mattered.

That assumption no longer holds. A company today might need its content to appear on a website, a mobile app, a smart TV, a voice assistant, and a digital kiosk — all simultaneously. Managing separate backends for each of those is a maintenance nightmare.

**Headless CMS** is the architectural response to this problem. In a headless setup, the CMS does one thing only: manage and expose content through an API — typically REST or GraphQL. It has no opinion about how that content gets displayed. A React or Vue frontend, a native mobile app, or any other consumer fetches the data it needs and handles rendering on its own terms.

The practical benefits of this approach are significant:

- **True multi-channel delivery.** One content API, many frontends. Update the content once and it propagates everywhere.
- **Frontend freedom.** Teams can use Next.js, Nuxt, SvelteKit — whatever makes sense — without being locked into the CMS's templating language.
- **Performance gains.** Headless frontends are often statically generated or server-side rendered, which means faster initial load times and better SEO scores compared to traditional CMS-rendered pages.
- **Independent scaling.** If the frontend gets a traffic spike, you scale the frontend. The backend doesn't need to be touched. Each layer evolves at its own pace.

This is why Headless Drupal and Headless Magento are showing up more and more in enterprise projects. It is not just a trend for its own sake — it reflects a real shift in how organizations think about content as a product that needs to reach users across many surfaces, not just one website.

---

## Conclusion

Magento and Drupal are both capable, battle-tested platforms — but they reward you most when you use them for what they were designed for. Magento is optimized for commerce; Drupal is optimized for content. Around either one, a well-configured stack (web server, database, caching) is what turns a working application into a performant, production-ready one. And increasingly, headless architecture is the pattern that ties it all together — giving organizations the flexibility to deliver content anywhere, without being constrained by the rendering layer of any single framework. For anyone working in modern web development, understanding these three layers — platform choice, infrastructure, and architecture pattern — is a solid foundation to build on.
