<?php
// Các phương pháp lập trình
// VD: tính tổng 2 số
// + Lập trình tuần tự/tuyến tính: nghĩ gì code nấy
$number1 = 1;
$number2 = 2;
$sum = $number1 + $number2;
echo $sum;

$number1 = 2;
$number2 = 2;
$sum = $number1 + $number2;
echo $sum;
// + Lập trình hướng thủ tục / hàm / chức năng:
function sum($number1, $number2) {
    $sum = $number1 + $number2;
    return $sum;
}
$sum1 = sum(1, 2);
echo $sum1;
// -> nhược điểm: do phân tích hệ thống để đưa ra các chức năng,
//mỗi chức năng là 1 hàm, các hàm gọi qua lại -> code khó để
//debug, khó để mở rộng
// + Lập trình hướng đối tượng:
class Number {
    public $number1;
    public $number2;
    public function sum() {
        $sum = $this->number1 + $this->number2;
        return $sum;
    }
}
$obj = new Number();
$obj->number1 = 2;
$obj->number2 = 3;
$sum1 = $obj->sum();
echo $sum1; //5
// -> OOP giúp code dễ mở rộng và debug hơn, code theo tư duy
//thực tế hơn
// - > OOP khó ở 2 đặc điểm chính:
// + Tư duy tiếp cận: xây dựng CRUD cho user
// Tiếp cận theo thủ tục: hàm thêm, sửa, xóa, liệt kê, kết nối
// csdl ...
// Tiếp cận theo OOP: dựa trên đối tượng để phân tích ra đặc
//điểm và hành vi của đối tượng đó: obj chính là user, có
//đặc điểm/thuộc tính là id, fullname, age, avatar, created_at;
//hành vi/phương thức là thêm sửa xóa liệt kê kết nối csdl ...
// + Nhiều thuật ngữ