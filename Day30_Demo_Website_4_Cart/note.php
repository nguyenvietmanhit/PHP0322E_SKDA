<?php
/**
 * - Chức năng giỏ hàng:
 * + Lưu giỏ hàng bằng cách thức nào? cookie, session,
 * database ...
 * -> sử dụng session
 * + Kết hợp kỹ thuật Ajax khi Thêm sp vào giỏ hàng,
 * tạo hiệu ứng tốt cho user
 * + Cấu trúc của giỏ hàng:
 */
$_SESSION['cart'] = [
    5 => [
        'name' => 'IPhone X',
        'avatar' => 'ip.png',
        'price' => 1000,
        'quantity' => 3
    ],
    2 => [
        'name' => 'IPhone X2',
        'avatar' => 'ip2.png',
        'price' => 2000,
        'quantity' => 2
    ]
];
