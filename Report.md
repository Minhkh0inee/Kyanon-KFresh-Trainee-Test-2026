# Research Report: CMS & E-Commerce Frameworks
**Kyanon Digital – Trainee Entrance Assessment | Câu 1**

---

## Introduction

Choosing the right platform early in a web project is critical. Two widely used PHP frameworks in enterprise contexts are **Magento** and **Drupal**. While both are open-source and mature, they solve fundamentally different problems.

---

## 1. Magento vs Drupal

**Magento** (now Adobe Commerce) was built specifically for **e-commerce** — product catalogs, inventory, checkout flows, and payment integrations are all first-class features. Brands like Nike and Ford use it because it handles large-scale retail complexity out of the box.

**Drupal** is a **Content Management System** designed for structured content publishing — multilingual sites, role-based editorial workflows, and complex page hierarchies. Organizations like NASA and The Economist rely on it for exactly that reason.

The deciding question is simple: *Are you selling something, or publishing something?* Using either platform for the other's purpose is possible, but friction will show.

---

## 2. The Production Tech Stack

Both platforms rely on a surrounding infrastructure stack to perform at scale:

- **Web Server (Nginx / Apache):** Handles incoming HTTP requests and forwards them to PHP. Nginx is preferred for Magento due to its efficient handling of concurrent connections.
- **Database (MySQL / MariaDB):** Stores all persistent data — products, content, users, orders. Slow queries here directly cause slow page loads.
- **Caching (Redis + Varnish):** Redis caches backend data objects in memory to reduce database round-trips. Varnish sits in front of the web server, serving fully cached HTML pages without invoking PHP at all — dramatically improving performance under load.

---

## 3. The Headless Architecture Trend

Traditionally, a CMS both stored content and rendered web pages. This model breaks down when content needs to reach multiple surfaces — websites, mobile apps, smart TVs, voice assistants — simultaneously.

**Headless CMS** decouples the backend from the frontend. The CMS exposes content via REST or GraphQL APIs; any frontend (Next.js, Nuxt, native apps) consumes and renders it independently. Key benefits:

- **Multi-channel delivery** — one API, many frontends
- **Frontend freedom** — teams choose their own stack
- **Better performance** — statically generated or SSR frontends load faster
- **Independent scaling** — frontend and backend scale separately

Headless Drupal and Headless Magento are increasingly common in enterprise projects, reflecting a shift toward treating content as a product delivered across many surfaces.

---

## Conclusion

Magento excels at commerce; Drupal excels at content. A well-configured stack (web server, database, caching) turns either into a production-ready system. Headless architecture then adds the flexibility to deliver that content anywhere — making it an essential pattern in modern web development.
