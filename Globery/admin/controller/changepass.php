<?php

include './../model/connectdb.php';
session_start();
$admin_id = $_SESSION['admin_id'];
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
if (isset($_POST['submit'])) {
    $pass = sha1($_POST['password']);
    $passnew = sha1($_POST['passwordnew']);
    $confirmpass = sha1($_POST['confirmpassword']);
    $select_user = $conn->prepare("SELECT * FROM `admins` WHERE id_admin = ? AND password = ?");
    $select_user->execute([$_POST['id_admin'], $pass]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);
    if ($select_user->rowCount() > 0 && $row['password'] == $pass && $passnew == $confirmpass) {
        $stmt = $pdo->prepare("UPDATE admins SET password = :password
WHERE id_admin = :id_admin");
        $stmt->execute([
            ':password' => $passnew,
            ':id_admin' => $_POST['id_admin'],
        ]);
        // header('location: ./?');
        $message = "Đã đổi mật khẩu thành công";
        // exit();
    } else {
        if ($row && $pass != $row["password"]) {
            // Kiểm tra mật khẩu nếu tên đăng nhập tồn tại
            $message = 'Mật khẩu không đúng!';
        } elseif ($passnew != $confirmpass) {
            $message = 'Xác nhận mật khẩu không đúng!';
        } else {
            $message = 'Mật khẩu không đúng';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="sr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" href="./../view/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body data-bs-theme="light" class="position-relative d-flex flex-column w-100">
    <main>
        <form class="m-auto shadow p-5 rounded-5 my-5" style="max-width: 30rem;" action="" method="POST">
            <input type="text" value="<?php echo $admin_id ?>" hidden name="id_admin">
            <h2 class="text-center">Đổi mật khẩu</h2>
            <!-- <p>Đăng ký miễn phí hoặc đăng nhập để nhận được các ưu đãi và quyền lợi hấp dẫn!</p> -->
            <!-- password -->
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu cũ</label>
                <input type="password" name="password" class="form-control" id="password" value="<?php if (isset($_POST['password'])) {
                    echo $_POST['password'];
                }
                ; ?>">

            </div>
            <div class="mb-3">
                <label for="passwordnew" class="form-label">Mật khẩu mới</label>
                <input type="password" name="passwordnew" class="form-control" id="passwordnew" value="<?php if (isset($_POST['passwordnew'])) {
                    echo $_POST['passwordnew'];
                }
                ; ?>">

            </div>
            <div class="mb-3">
                <label for="confirmpassword" class="form-label">Xác nhận lại mật khẩu</label>
                <input type="password" name="confirmpassword" class="form-control" id="confirmpassword" value="<?php if (isset($_POST['confirmpassword'])) {
                    echo $_POST['confirmpassword'];
                }
                ; ?>">

            </div>
            <div class="mt-3">
                <button type="submit" name="submit" class="btn btn-primary w-100">Đổi mật khẩu</button>
            </div>
            <p class="mt-3"><a href="./../index.php?page=dashboard">Quay lại trang quản trị</a></p>
            <?php if (isset($message)): ?>
                <p class="mt-3"><?php echo $message ?></p>
            <?php endif; ?>
        </form>
    </main>


    <?php include './../view/block/footer.php' ?>