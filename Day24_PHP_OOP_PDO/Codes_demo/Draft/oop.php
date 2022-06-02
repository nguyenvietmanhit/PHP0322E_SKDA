<?php
//oop.php
// 1/ Lập trình hướng đối tượng:
// - Object Oriented Programming - OOP, là 1 phương pháp lập trình hiện đại, luôn đc sử dụng để dựng
//ra các website hiện nay

// 2 / Các phương pháp lập trình truyền thống
// Lập trình để hiển thị tên của 1 người
// - Lập trình tuyến tính: nghĩ gì viết nấy, code chạy nhanh, nhược điểm: ko làm đc các web lớn,
//ko có tính sử dụng, bảo trì khó
$fullname = 'manhnv';
echo "Tên của bạn là: $fullname";
// - Lập trình có cấu trúc(thủ tục): viết hàm, phân tích 1 website thành các chức năng nhỏ hơn,
// mỗi 1 chức năng tương đương với 1 hàm -> dùng để code ra website -> website lớn thì phải gọi
//hàm qua lại -> phức tạp hệ thống
function showFullname($fullname) {
  return "Tên của bạn là: $fullname";
}
echo showFullname("abc");
echo showFullname("def");
// - Lập trình hướng đối tượng: cần thay đổi tư duy lập trình, phân tích để tìm ra các đối
//tượng của bài toán -> xây dựng dựa trên đối tượng này: đặc điểm (thuộc tính) + hành vi (phương thức)
// Object = con người, có đặc điểm là name, age ..,  có hành vi đi, ăn, uống ...
