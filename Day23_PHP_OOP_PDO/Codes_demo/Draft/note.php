<?php
/**
 * note.php
 * Các phương pháp lập trình truyền thống
 * + Lập trình tuyến tính: code nghĩ gì viết nấy
 */
$number1 = 5;
$number2 = 4;
$sum = $number1 + $number2;
echo $sum;
// + Lập trình có cấu trúc/thủ tục: viết hàm
function sum($number1, $number2) {
  $sum = $number1 + $number2;
  return $sum;
}
echo sum(1, 2); //3
echo sum(2, 2); //4

function addBook() {}
function editBook() {}
function deleteBook() {}

// - Lập trình hướng đối tượng: lấy đối tượng làm trung tâm để tạo 1 ra cụm chức năng xoay quanh
// đối tượng này
