<?php
$dsn = "mysql:host=localhost;dbname=hotel_management;charset=utf8";
$username = "root"; // Thay bằng tên người dùng MySQL của bạn
$password = "";     // Thay bằng mật khẩu MySQL của bạn

try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}
$issetUser = false;
if (isset($_POST['submit'])) {
    $pass = sha1($_POST['password']);
    $passnew = sha1($_POST['passwordnew']);
    $confirmpass = sha1($_POST['confirmpassword']);
    $select_user = $conn->prepare("SELECT * FROM `customer` WHERE id_customer = ? AND password = ?");
    $select_user->execute([$_POST['id_customer'], $pass]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);
    if ($select_user->rowCount() > 0 && $row['password'] == $pass && $passnew == $confirmpass) {
        $stmt = $pdo->prepare("UPDATE customer SET password = :password
WHERE id_customer = :id_customer");
        $stmt->execute([
            ':password' => $passnew,
            ':id_customer' => $_POST['id_customer'],
        ]);
        // header('location: ./?');
        $message = "Đã đổi mật khẩu thành công";
        // exit();
    } else {
        if ($pass != $row["password"]) {
            // Kiểm tra mật khẩu nếu tên đăng nhập tồn tại
            $message = 'Mật khẩu không đúng!';
        } elseif ($passnew != $confirmpass) {
            $message = 'Xác nhận mật khẩu không đúng!';
        } else {
            $message = 'khong biet loi';
        }
    }
}
?>
<?php include './mvc/view/block/header.php' ?>
<main>
    <form class="m-auto shadow p-5 rounded-5 my-5" style="max-width: 30rem;" action="" method="POST">
        <input type="text" value="<?php echo $_SESSION['user_id'] ?>" name="id_customer" hidden>
        <h2 class="text-center">Đổi mật khẩu</h2>
        <!-- <p>Đăng ký miễn phí hoặc đăng nhập để nhận được các ưu đãi và quyền lợi hấp dẫn!</p> -->
        <!-- password -->
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu cũ</label>
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
        <div class="mb-3">
            <label for="passwordnew" class="form-label">Mật khẩu mới</label>
            <input type="password" name="passwordnew" class="form-control" id="passwordnew" value="<?php if (isset($_POST['passwordnew'])) {
                echo $_POST['passwordnew'];
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
        <div class="mb-3">
            <label for="confirmpassword" class="form-label">Xác nhận lại mật khẩu</label>
            <input type="password" name="confirmpassword" class="form-control" id="confirmpassword" value="<?php if (isset($_POST['confirmpassword'])) {
                echo $_POST['confirmpassword'];
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
            <button type="submit" name="submit" class="btn btn-primary w-100">Đổi mật khẩu</button>
        </div>
        <p class="mt-3">Bạn chưa có tài khoản? <a href="./index.php?page=register">Đăng kí ngay</a></p>
        <?php if (isset($message)): ?>
            <p class="mt-3"><?php echo $message ?></p>
        <?php endif; ?>
    </form>
</main>