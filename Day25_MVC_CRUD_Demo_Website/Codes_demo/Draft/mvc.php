<?php
//mvc.php
/**
 * 1/ Mô hình MVC
 * - Tạo ra 1 chuẩn giúp cho project dễ mở rộng và phát triển hơn
 * - M - Model, V - View , C - Controller
 * - LÀ kiến trúc phần mềm 3 lớp
 * - Tách ứng dụng thành 3 thành phần riêng biệt
 * - Với PHP, MVC là chuẩn để tạo ra 1 website
 * - MVC dựa trên OOP
 * 2/ Thành phần:
 * - Model: xử lý mọi thao tác liên quan đến CSDL như kết nối,
 * truy vấn ...
 * - View: hiển thị ra giao diện
 * - Controller: tầng trung gian giữa Model và View, luân chuyển
 * dữ liệu và xử lý logic
 * 3/ Luồng xử lý dữ liệu theo MVC
 * 4 / Cấu trúc thư mục code MVC:
 * - Phụ thuộc vào ng triển khai mô hình MVC
 * 5/ Demo:
 * Xây dựng ứng dụng CRUD danh mục theo MVC
 * crud /
 *      /assets: chứa các file liên quan đến frontend:
 *               css,js,ảnh tĩnh
 *             /css: chứa các file css
 *                 /style.css
 *             /js: chứa các file js
 *                 /script.js
 *             /images: chứa các ảnh tĩnh
 *      /configs/: chứa cấu hình hệ thống: CSDL, mail ...
 *              /Database.php: class chứa hằng số kết nối CSDL
 *      /controllers/: chứa các class controller
 *                  /Controller.php: class controller cha
 *                  /CategoryController.php:
 *      /models/: chứa các class model
 *             /Model.php: class model cha
 *             /Category.php: model xử lý category
 *      /views/: chứa các file view
 *            /layouts: chứa các file layout
 *                    /main.php : file layout chính
 *            /categories: chứa các file của category
 *                       /create.php: form thêm mới
 *                       /update.php: sửa
 *                       /index.php: liệt kê
 *                       /detail.php: chi tiết
 *     /.htaccess: cấu hình server + rewrite url
 *     /index.php: file index gốc của ứng dụng,
 *                  bắt buộc phải là index.php
 *
 *
 *
 */
