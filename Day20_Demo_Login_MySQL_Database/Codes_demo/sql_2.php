# 6 - Xóa bảng
# DROP TABLE abc;
# 7 - Truy vấn INSERT: thêm dữ liệu vào bảng
# Bảng categories: id, name, description, created_at
# + Nguyên tắc chỉ thêm dữ liệu cho trường sinh ra thủ công
#INSERT INTO categories(name, description)
#VALUES('Tivi', 'Mô tả tivi'),
#      ('Tủ lạnh', 'Mô tả tủ lạnh'),
#      ('Điện thoại', 'Mô tả điện thoại');
# Bảng products: id, category_id, name, price, description, created_at
# - Với trường khóa ngoại, cần lấy giá trị tồn tại trong
# trường tương ứng của bảng mà nó liên kết
#INSERT INTO products(category_id,name,price,description)
#VALUES(1, 'Tivi samsung', 1000, 'Chi tiết tv samsung'),
#      (2, 'Tủ lạnh Daikin', 1000, 'Chi tiết daikin'),
#      (2, 'Tủ lạnh Toshiba', 2000, 'Chi tiết toshiba'),
#      (3, 'Laptop Asus', 3000, 'Chi tiết asus'),
#      (3, 'Laptop Dell', 4000, 'Chi tiết dell'),
#      (3, 'Laptop Lenovo', 5000, 'Chi tiết lenovo');
# 8 - Truy vấn SELECT: lấy dữ liệu ra
# + Lấy tất cả thông tin của tất cả sản phẩm:
SELECT * FROM products;
# + Lấy tên và giá của tất cả sản phẩm:
SELECT name, price FROM products;
# + Lấy 2 sản phẩm đầu tiên trong bảng: LIMIT
SELECT * FROM products LIMIT 2;
# + Lấy 3 sản phẩm tính từ bản ghi thứ 2 trở đi: LIMIT (OFFSET)
SELECT * FROM products LIMIT 2,3;
SELECT * FROM products LIMIT 3 OFFSET 2;
# + Lấy sản phẩm có id = 1;
SELECT * FROM products WHERE id = 1;
# + LẤy sản phẩm có id >= 2 và id <= 5:
SELECT * FROM products WHERE id >= 2 AND id <= 5;
# Dùng BETWEEN:
SELECT * FROM products WHERE id BETWEEN 2 AND 5;
# + Lấy sp có id = 2 hoặc id = 3 hoặc id = 5:
SELECT * FROM products WHERE id = 2 OR id = 3 OR id = 5;
# Dùng IN:
SELECT * FROM products WHERE id IN (2, 3, 5);
# + Tìm sp có tên chứa chuỗi op: LIKE
# - Ký tự % đại diện cho các ký tự bất kỳ
# abop, aopb, abop, op, abc -> false, oap -> false
SELECT * FROM products WHERE name LIKE '%op%';
# opa, opb, op, aop -> false
SELECT * FROM products WHERE name LIKE 'op%';
# aop, op, opa -> false
SELECT * FROM products WHERE name LIKE '%op';
# op
SELECT * FROM products WHERE name LIKE 'op';
# + Lấy sp theo thứ tự giảm dần về giá: ORDER BY
# DESC: descend, ASC: ascend
SELECT * FROM products ORDER BY price DESC;
# + Cơ chế JOIN khi SELECT:
# - Thực tế luôn cần lấy dữ liệu trên nhiều bảng có liên
# kết -> dùng JOIN
# + Lấy tất cả sp kèm theo tên danh mục tương ứng của sp:
# Có 3 kiểu JOIN chính:
# - INNER JOIN: lặp qua từng bản ghi của bảng gốc (products), mỗi lần đi qua từng bản ghi join vào bảng liên kết (categories), nếu tìm thấy bản ghi tương ứng thì trả về, ngược lại ko trả về
# + Là kiểu join chặt chẽ và toàn vẹn về mặt dữ liệu
# + Luôn cần chỉ định tên bảng trước tên trường khi JOIN
SELECT products.*, categories.name AS category_name
FROM products
INNER JOIN categories
ON products.category_id = categories.id;
# - LEFT JOIN: lặp qua từng bản ghi của bảng gốc (products), mỗi lần đi qua từng bản ghi join vào bảng liên kết (categories), nếu tìm thấy bản ghi tương ứng thì trả về, ngược lại vẫn trả về tuy nhiên giá trị của bảng liên kết sẽ bị null
SELECT products.*, categories.name FROM products
LEFT JOIN categories
ON products.category_id = categories.id;
# - RIGHT JOIN
SELECT products.*, categories.name FROM products
RIGHT JOIN categories
ON products.category_id = categories.id;
# - Một số hàm trong SQL: COUNT, MIN, MAX, AVG, SUM
# + Đếm tổng số sp đang có:
SELECT COUNT(id) AS count_id FROM products;
# + LẤy giá nhỏ nhất, lớn nhất, trung bình, tổng giá:
SELECT MIN(price), MAX(price), AVG(price), SUM(price)
FROM products;
# - Đếm các sản phẩm theo giá: GROUP BY
SELECT COUNT(id), price FROM products GROUP BY price;
# 12 - Truy vấn UPDATE: sửa dữ liệu
# + Cập nhật tên sp = abc, giá = 123 cho sp có id = 4
# Cần điều kiện đi kèm khi UPDATE nếu ko sẽ UPDATE toàn bộ bảng
UPDATE products SET name = 'abc', price = 123
WHERE id = 4;
# 13 - Truy vấn DELETE: xóa dữ liệu
# Xóa các sp có id > 6:
# Luôn chỉ định điều kiện khi DELETE, nếu ko sẽ xóa toàn bộ bảng
DELETE FROM products WHERE id > 6;
# 14 - Export và Import CSDL sử dụng PHPMyadmin:


