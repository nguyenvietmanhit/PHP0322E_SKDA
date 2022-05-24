# Comment trong SQL dùng #
# SQL ko phân biệt hoa thường, tuy nhiên từ khóa nên viết hoa
# Kết thúc mỗi truy vấn là ;
# 1 - Tạo CSDL:
# CREATE DATABASE abcf;
CREATE DATABASE IF NOT EXISTS php0322e
CHARACTER SET utf8
COLLATE utf8_general_ci;
# 2 - Xóa CSDL:
# DROP DATABASE abc;
# 3 - Truy cập CSDL: là bước bắt buộc để có thể thao tác
# đc với CSDL như tạo bảng, tạo trường, thêm data ...
# Với PHPMyadmin, lệnh USE ko có tác dụng, chỉ có tác dụng
# khi thao tác với CSDL hoàn toàn bằng dòng lệnh
USE php0322e;
# 4 - Các kiểu dữ liệu trong MySQL:
# + Kiểu số: lưu giá trị là số, hay dùng nhất là:
# TINYINT: tốn 1 Byte để lưu, phạm vi lưu từ -128 -> 127
# INT: tốn 4 Byte để lưu, phạm vi ~ -2 tỉ -> 2 tỉ
# + Kiểu chuỗi: lưu giá trị là chuỗi, hay dùng nhất là:
# VARCHAR: chuỗi có độ dài thay đổi, ko vượt quá 255 ký tự
# TEXT: lưu chuỗi lên tới ~ 65k
# + Kiểu thời gian: lưu thời gian, 2 kiểu chính:
# DATETIME: lưu ngày giờ theo kiểu thủ công
# TIMESTAMP: lưu ngày giờ tự động có kèm cho lưu múi giờ
# Chú ý về format để lưu đc vào kiểu thời gian, bắt buộc
# phải theo format sau: YYYY-MM-DD H:i:s
# VD: 12/03/2022 12:00:00 -> 2022-03-12 12:00:00
# 5 - Tạo bảng:
# categories(id, name, description, created_at)
CREATE TABLE IF NOT EXISTS categories(
id INT(11) AUTO_INCREMENT,
name VARCHAR(150) NOT NULL,
description TEXT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
# Khai báo khóa chính khóa ngoại nếu có
PRIMARY KEY (id)
);
# products(id, category_id, name, price, description, created_at)
CREATE TABLE IF NOT EXISTS products(
id INT(11) AUTO_INCREMENT,
category_id INT(11) DEFAULT NULL,
name VARCHAR(150) NOT NULL,
price INT(11) DEFAULT 0,
description TEXT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id),
FOREIGN KEY (category_id) REFERENCES categories(id)
);
# PHPMyadmin hỗ trợ xem lược đồ quan hệ giữa các bảng với
# điều kiện phải set khóa ngoại tường minh