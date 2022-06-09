<?php
/**
 * note.php
 * Tạo cấu trúc file và thư mục cho MVC:
 * crud /
 *      /assets: lưu các file frontend: css, js, image, font ...
 *             /css
 *                 /style.css
 *             /js
 *                /script.js
 *             /images:
 *      /configs: chứa các cấu hình như CSDL, mail
 *              /Database.php: class chứa các hằng số kết nối CSDL
 *      /controllers: chứa class controller
 *                  /Controller.php : controller cha
 *                  /CategoryController.php: controller xử lý category
 *      /models: chứa các class model
 *             /Model.php: model cha
 *             /Category.php: model xử lý truy vấn category
 *      /views: chứa view
 *            /layouts
 *                    /main.php
 *            /categories:
 *                       /create.php
 *                       /update.php
 *                       /list.php
 *      .htaccess :rewrite url
 *      index.php: file index gốc của ứng dụng MVC
 *
 */