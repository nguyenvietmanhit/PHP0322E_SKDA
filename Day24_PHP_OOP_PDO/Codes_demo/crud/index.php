<!--
CRUD: Create Read Update Delete, code cả giao diện và PHP
CRUD cho user:
+ CSDL: php0322e_crud
+ Bảng users: id, fullname, age, avatar, created_at
crud
    /connection.php: kết nối CSDL, sử dụng biến kết nối
    /index.php: ds user
    /create.php: form thêm mới user
    /update.php: form sửa user
    /delete.php: xóa user
-->
<?php
//index.php
session_start();
require_once 'connection.php';
// - Kết nối CSDL để lấy tất cả user
// + Viết truy vấn:
$sql_select_all = "SELECT * FROM users ORDER BY created_at DESC";
// + Thực thi truy vấn: SELECT trả về obj trung gian
$result_all = mysqli_query($connection, $sql_select_all);
// + Trả về mảng 2 chiều chứa nhiều bản ghi:
$users = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
echo '<pre>';
print_r($users);
echo '</pre>';
?>
<h3 style="color: green">
    <?php
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    ?>
</h3>
<h3 style="color: red">
    <?php
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>
</h3>
<a href="create.php">Thêm mới user</a>
<h2>Danh sách user</h2>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Fullname</th>
        <th>Age</th>
        <th>Avatar</th>
        <th>Created_at</th>
        <th></th>
    </tr>
    <?php foreach($users AS $user): ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['fullname']; ?></td>
            <td><?php echo $user['age']; ?></td>
            <td>
                <img src="uploads/<?php echo $user['avatar']?>"
                     height="60px" />
            </td>
            <td>
<!--                26/05/2022 20:41:00-->
<!--             2022-05-26 20:41:00   -->
                <?php
                echo date('d/m/Y H:i:s', strtotime($user['created_at']));
                ?>
            </td>
            <td>
<!--                update.php?id=1 -->
                <a href="update.php?id=<?php echo $user['id']; ?>">Sửa</a>
                <a href="delete.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Xóa?')">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
