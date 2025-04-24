# 🌐 SEO Product Listing Platform

A simple but scalable product listing website built with **CodeIgniter** that focuses on SEO best practices.  
This project demonstrates how to programmatically generate SEO-friendly pages for e-commerce platforms.

---

## 🚀 Live Demo

🔗 **[Product Listing Website](https://web-production-49134.up.railway.app/)**

---

## ⚙️ Setup Instructions

1. **Clone** this repo to your local environment:
   ```bash
   [git clone https://github.com/AkshitaJ0904/seo-product-listing-platform.git](https://github.com/AkshitaJ0904/seo-techintern-assessment.git)
   ```

2. The **database** is already hosted on Railway – connection details are in the config files.

3. If running **locally**, update your database settings in:
   ```
   application/config/database.php
   ```
   with your Railway credentials.

4. **Install dependencies** via Composer:
   ```bash
   composer install
   ```

5. Default **admin login** credentials:
   ```
   Username: admin
   Password: password
   ```

---

## 🧩 Features

- 🛍️ Public product listings with category navigation
- 🌐 SEO-friendly URLs for all pages (`/products/category-name/product-name`)
- 🛠️ Admin panel to manage products and categories
- 🔗 Automatic slug generation for new products

---

## 📈 SEO Techniques Used

- ✅ Clean URL structure (no query parameters)
- ✅ Auto-generated meta titles and descriptions
- ✅ JSON-LD product schema markup
- ✅ XML sitemap available at `/sitemap.xml`
- ✅ Robots.txt for crawler instructions
- ✅ Proper heading structure (`<h1>`, `<h2>`, etc.)

---

## ⚠️ Limitations

-  No image optimization features yet
-  Limited to one category per product
-  Basic search functionality

---

## 🔮 Future Improvements

-  Add product image gallery with alt text
-  Implement breadcrumb navigation
-  Add related products section
-  Create category hierarchy (parent/child categories)

---


