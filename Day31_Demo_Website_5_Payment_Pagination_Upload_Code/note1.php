<?php
/**
 * 1 - Cách upload code từ local lên server:
 * + Cài đặt phần mềm upload file: FileZilla, ngoài ra có thể
 * dùng VS hoặc PHPStorm
 * + Các thuật ngữ:
 * - Domain: tên miền website, thay vì phải dùng địa chỉ IP thì dùng
 * domain dễ nhớ hơn
 * - Hosting/VPS/Cloud ...: máy chủ lưu trữ source code của web
 * + Trên localhost, domain = localhost, hosting = thư mục
 *htdocs của XAMPP
 * + ITPlus hỗ trợ tài khoản upload code lên server sử dụng
 * giao thức FTP (FTPS SSH)
 * + Cần đẩy code vào thư mục public_html của server
 * + Sửa thông tin DB tương ứng, đẩy lại file config này lên server
 *
 *  - Cách dùng PHPStorm upload code lên server:
 * + Dùng PHPStorm mở source code muốn upload
 * + Menu Tools/Deployment/Configuration
 * + Sau khi kết nối thành công, vào menu Tools - Deployments -
 * Browse Remote Host
 */