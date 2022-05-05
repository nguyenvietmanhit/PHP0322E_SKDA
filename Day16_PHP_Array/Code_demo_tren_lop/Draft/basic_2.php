<?php
// PHP cơ bản
// 1 / Toán tử:
// + Toán tử số học: giống hệt JS
// Các toán tử số học là + - * / % ++ --
// + Toán tử so sánh: trả về true/false
// > >= < <= == !=
// + Toán tử logic: kết hợp nhiều biểu thức so sánh -> true/false
// && || !
// + Toán tử gán:
// = += -= *= /= %=
//2 / Câu lệnh điều kiện: là các biểu thức để thực hiện các hành động khác nhau dựa trên
//các điều kiện khác nhau: if elseif else switch case
$number = 5;
// If dùng cho 1 case duy nhất
if ($number > 0) {
  echo "Biến number > 0";
}
// If...else: dùng cho 2 case
if ($number % 2 == 0) {
  echo "Số chẵn";
} else {
  echo "Số lẻ";
}
// If...elseif...else: >= 3 case
$day = 3;
if ($day == 1) {
  echo "Chủ nhật";
} elseif ($day == 2) {
  echo "Thứ hai";
} elseif ($day == 3) {
  echo "Thứ ba";
} else {
  echo "Không phải cn, t2, t3";
}
// Switch case: cũng cho >= 3 case
$day = 3;
switch ($day) {
  case 1: echo "Chủ nhật";break;
  case 2: echo "Thứ hai";break;
  case 3: echo "Thứ ba";break;
  default: echo "Không phải cn, t2, t3";
}
// Toán tử điều kiện: ? : , thay thế cho if...else khi logic của if else đơn giản
if ($number % 2 == 0) {
  echo "Số chẵn";
} else {
  echo "Số lẻ";
}
echo $number % 2 == 0 ? "Số chẵn" : "Số lẻ";
// Cú pháp viết tắt của câu lệnh điều kiện khi hiển thị 1 khối HTML phức tạp
// Check nếu biểu thức đúng thì hiển thị ra 1 cấu bảng 1 hàng 2 cột
// + Viết thẳng HTML bằng echo trong PHP: dễ bị sai sót -> vỡ cấu trúc trang
$number = 4;
if ($number % 2 == 0) {
  echo "<table border='1' cellpadding='6' cellspacing='0'>";
  echo "<tr>";
  echo "<td>Hàng 1 cột 1</td>";
  echo "<td>Hàng 1 cột 2</td>";
  echo "</tr>";
  echo "</table>";
}
// + Viết tách PHP và HTML sử dụng cú pháp viết tắt trong PHP
?>

<?php if ($number % 2 == 0): ?>
  <table border="1" cellspacing="0" cellpadding="6">
    <tr>
      <td>Hàng 1 cột 1</td>
      <td>Hàng 1 cột 2</td>
    </tr>
  </table>
<?php endif; ?>

<!--If else-->
<?php if ($number % 2 == 0): ?>
  <h1>Number là số chẵn</h1>
<?php else: ?>
  <h1>Number là số lẻ</h1>
<?php endif; ?>

<!--If elseif else-->
<?php if ($number == 1): ?>
  <h1>Number = 1</h1>
<?php elseif ($number == 2): ?>
  <h1>Number = 2</h1>
<?php elseif ($number == 3): ?>
  <h1>Number = 3</h1>
<?php else: ?>
  <h1>Number ko phải 1, 2, 3</h1>
<?php endif; ?>

<?php
// 3 - Vòng lặp: for do...while while
// PHP rất ít khi sử dụng 3 vòng lặp trên!
// 4 - Từ khóa break-continue trong vòng lặp:can thiệp vào luồng lặp
// Break: thoát hẳn vòng lặp
// Continue: bỏ qua lần lặp hiện tại, nhảy tới lần lặp kết tiếp
// -> thoát hẳn vòng lặp + bỏ qua lần lặp: ko chạy code phía sau từ khóa break/continue
?>
