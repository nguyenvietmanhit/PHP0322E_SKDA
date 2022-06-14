<?php
/**
 * Các bước triển khai 1 Website với PHP:
 * - B1: Chuẩn bị giao diện tĩnh:
 * Backend: trang quản trị
 * Frontend: trang người dùng
 * - B2: Phân tích CSDL từ giao diện tĩnh: chủ yếu dựa vào frontend
 * để phân tích:
 * + Chạy tất cả trang con của frontend, với mỗi trang phân tích
 * từ trên xuống:
 * Nếu thông tin nào mà hay thay đổi, cần tạo bảng để lưu
 * lại các thông tin, code để tạo ra CRUD cho user có
 * thể sửa bằng giao diện, ngược lại ko cần tạo bảng, khi
 * sửa thì vào code để sửa trực tiếp
 * / Bảng menus: quản lý thông tin về menu:
 * id
 * title: tên menu con, VARCHAR
 * link: link cho menucon, VARCHAR
 * status: trạng thái menu con, TINYINT: 0 - ẩn, 1 - hiện
 * created_at
 * updated_at: thời gian cập nhật cuối cùng của bản ghi
 * / Bảng products: qly các thông tin về sản phẩm
 * id
 * avatar: tên file ảnh đại diện, VARCHAR
 * title: tên sp, VARCHAR
 * price: giá sp, INT
 * summary: mô tả ngắn cho sp, TEXT
 * description: chi tiết sp, TEXT
 * amount: tồn kho
 * seo_title: seo theo tiêu đề sp
 * seo_description: seo theo mô tả sp
 * seo_keywords: seo các từ khóa của sp:
 * status: trạng thái sp, TINYINT: 0 - ẩn, 1 - hiển thị
 * category_id: khóa ngoại liên kết đến bảng categories
 * created_at
 * updated_at
 * - Tạo CSDL php0322e_project bằng giao diện PHPMyadmin
 * Copy nội dung trong file file_create_db.html để chạy SQL
 * B3: Tạo khung MVC cho project:
 * mvc /
 *     /backend: khung MVC đã học
 *     /frontend: khung MVC đã học
 * B4: Code: thường code backend trc để có data
 * cho frontend lấy ra hiển thị
 */