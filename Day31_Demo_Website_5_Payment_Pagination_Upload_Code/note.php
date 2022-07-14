<?php
/**
 * note.php
 * 1 / Composer:
 * + Là công cụ quản lý thư viện 1 cách tự động, giống npm của
 * Node JS
 * + Command line:
 * composer install
 * composer update
 * + Hầu hết các framework và CMS của PHP đều sử dụng Composer
 * 2 / Laravel:
 * + Là 1 framework viết bằng PHP, dựa trên mô hình MVC
 * + Là FW phổ biến nhất
 * + Laravel hay kết hợp VueJS để tạo ra 1 website hoàn chỉnh
 * 3 / Code:
 *  - Tạo CSDL: php0322e_laravel
 *  - Tạo bảng products: id, name, price, created_at, updated_at
 * , sử dụng cơ chế migrate của Laravel để tạo
 * -> sử dụng công cụ artisan của Laravel
 * php artisan make:migration create_table_products --create=products
 * , nằm trong database/migrations/<tên-file>
 * - Cài đặt môi trường tại file .env
 * - Chạy lệnh sau để thực thi các file migrate:
 * php artisan migrate
 */
?>