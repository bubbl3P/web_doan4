# web_doan4
## Feature
1. FRONT-END
    - Shopping cart
    - Save cart with database
    - Customer login
    - Content: Page, Post, Product List, Product Details, Category,...
    - Product attributes: cost price, promotion price, detail,...
    - Feedback, Feedback for product, Feedback for order
    - Comment on Product, Post,...
    - Search, pagination,...
    - Checkout, PlaceOrder,...
    - Recommend System ( Collaborative-filtering )
    ...
    
=================================================================

2. BACKEND-ADMIN
    - Admin roles, permission
    - Product manager   (Create, delete, update)
    - Category manager  (Create, delete, update)
    - Order management  (Create, delete, update)
    - Comment manager   (Create, delete, update)
    - Feedback manager  (Create, delete, update)
    - User management   (Create, delete, update)
    - Template manager  (Create, update)
    - Backup database 
    ...
   <?php
## Edit Config
    Path: /lib/config/config.php

     define('BASE_URL', 'new-mvc-shop');
     define('PATH_URL', '/');
     define('PATH_URL_IMG', PATH_URL . 'public/upload/images/');
     define('PATH_URL_IMG_PRODUCT', PATH_URL . 'public/upload/products/');

## Edit Sendmail
    Path: /lib/config/sendmail.php

    define('SMTP_HOST','smtp.gmail.com');
    define('SMTP_PORT','465');
    define('SMTP_UNAME','add_your_mail');
    define('SMTP_PWORD','add_your_application_password_from_your_mail');

## Edit Database
    Path: /lib/config/database.php

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'shop_ktpm_3');
    
