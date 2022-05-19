<!--mysql.php-->
1 - Cơ sở dữ liệu
+ Dùng để lưu trữ thông tin
+ Quản lý dữ liệu tốt hơn và dữ liệu có tính lâu dài
+ Một số CSDL thông dụng: MySQL, MongoDB (json), SQL Server,
Oracle, SQLite, PostgreSQL ...
+ Với PHP phổ biến nhất vẫn là MySQL, vì miễn phí
+ Cài đặt MySQL: cài XAMPP
+ Để tương tác đc với CSDL, bắt buộc phải dùng câu truy vấn
+ Với dev bắt buộc phải học truy vấn
2 - Thuật ngữ liên quan tới CSDL:
+ database: tên CSDL
+ Trong database có các table/bảng
VD: Database = php0322e, có 2 bảng:
users: lưu trữ thông tin của các học viên
teachers: lưu trữ thông tin của các giảng viên
+ Trong table có:
column/field/trường: mô tả các thông tin mà bảng quản lý
record/row/bản ghi: dữ liệu cụ thể của 1 đối tượng trong bảng
VD:
Bảng users có các trường: id, name, gender, birthday ...
Bảng users có 1 bản ghi: id=1, name=abc, gender=nữ, birthday=
20-10-1990
+ Trong bảng có:
- Khóa chính/primary key: là 1 trường dùng để phân biệt các bản ghi,
thường đặt tên là id
- Khóa ngoại/foreign key: là 1 trường dùng để liên kết đến
bảng khác, đặt tên theo dạng <tên bảng số ít>_id
    VD: category_id, product_id, user_id
3 - Ngôn ngữ truy vấn SQL:
+ Structure Query Language, là 1 ngôn ngữ dùng tương tác với
CSDL
+ Với các CSDL khác nhau thì có các câu truy vấn SQL khác nhau
+ Viết SQL để tương tác với CSDL MySQL ở đâu ?
    - Dùng command line
    - Dùng 1 phần mềm quản trị CSDL MySQL: PHPMyadmin, Navicat,
    MySQL Workbench ... -> sử dụng PHPMyadmin vì có sẵn khi
    cài XAMPP
    Truy cập PHPMyadmin bằng url sau: phải start module MySQL của
    XAMPP lên:
    http://localhost/phpmyadmin
    - Sử dụng tab SQL của PHPMyadmin để viết truy vấn
    - Cách học: viết truy vấn SQL thuần trước -> dùng giao diện
    đồ họa của PHPMyadmin