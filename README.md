**SEO Product Listing Platform**

A simple but scalable product listing website built with CodeIgniter that focuses on SEO best practices. This project demonstrates how to programmatically generate SEO-friendly pages for e-commerce sites.
Setup

This is a deployed version of the **Product Listing Website**. You can check it out live at the link below:

🔗 **Live Demo:** [Product Listing Website](https://web-production-49134.up.railway.app/)


Clone this repo to your local environment
The database is already set up on Railway - connection details are in the config files
If running locally, you'll need to update database settings in application/config/database.php with your Railway credentials
Run composer install to install dependencies
Default admin login is admin/password

Features

Public product listings with category navigation
SEO-friendly URLs for all pages (/products/category-name/product-name)
Admin panel to manage products and categories
Automatic slug generation for new products

SEO Techniques Used

Clean URL structure without query parameters
Auto-generated meta titles and descriptions
JSON-LD product schema markup
XML sitemap at /sitemap.xml
Robots.txt file
Proper heading structure (H1, H2, etc.)

Limitations

No image optimization features yet
Limited to one category per product
Basic search functionality

Future Improvements

Add product image gallery with alt text
Implement breadcrumb navigation
Add related products section
Create category hierarchy (parent/child categories)
