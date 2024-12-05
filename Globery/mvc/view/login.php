<?php
// include '../model/connectdb.php';
// INSERT INTO `users` (`id`, `name`, `password`) VALUES (NULL, 'KhacHung', SHA1('111'));
$issetUser = false;
if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $pass = sha1($_POST['password']);
    $select_user = $conn->prepare("SELECT * FROM `customer` WHERE username = ? AND password = ?");
    $select_user->execute([$name, $pass]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);
    if ($select_user->rowCount() > 0) {
        $_SESSION['user_id'] = $row['id_customer'];
        $_SESSION['user_name'] = $row['username'];
        header('location: ./?');
        exit();
    } else {
        $select_username = $conn->prepare("SELECT * FROM `customer` WHERE username = ?");
        $select_username->execute([$name]);
        $username = $select_username->fetch(PDO::FETCH_ASSOC);
        if ($username) {
            $issetUser = true;
            // Kiểm tra mật khẩu nếu tên đăng nhập tồn tại
            $message = 'Mật khẩu không đúng!';
        } else {
            $message = 'Tên đăng nhập không tồn tại!';
        }
    }
}
?>
<?php include './mvc/view/block/header.php' ?>
<main>
    <form class="m-auto shadow p-5 rounded-5 my-5" style="max-width: 30rem;" action="" method="POST">

        <h2>Đăng nhập hoặc tạo tài khoản</h2>
        <p>Đăng ký miễn phí hoặc đăng nhập để nhận được các ưu đãi và quyền lợi hấp dẫn!</p>
        <!-- username -->
        <div class="mb-3">
            <label for="username" class="form-label">Tên đăng nhập</label>
            <input type="text" name="username" class="form-control" id="username" value="<?php if (isset($_POST['username'])) {
                echo $_POST['username'];
            }
            ; ?>">
            <?php if (isset($message) && !$issetUser) {
                echo '<div class="message mt-3 text-danger">
                <span class="text-danger">' . $message . '</span>
                <i class="fas fa-times cursor-pointer" onclick="this.parentElement.remove();"></i>
            </div>';
            }
            ?>
        </div>
        <!-- password -->
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" name="password" class="form-control" id="password" value="<?php if (isset($_POST['password'])) {
                echo $_POST['password'];
            }
            ; ?>">
            <?php if ($issetUser && isset($message)) {
                echo '<div class="message mt-3 text-danger">
                <span class="text-danger">' . $message . '</span>
                <i class="fas fa-times cursor-pointer" onclick="this.parentElement.remove();"></i>
            </div>';
            }
            ?>
        </div>
        <div class="mt-3">
            <button type="submit" name="submit" class="btn btn-primary w-100">Đăng nhập</button>
        </div>
        <p class="mt-3">Bạn chưa có tài khoản? <a href="./index.php?page=register">Đăng kí ngay</a></p>
    </form>
</main>
