<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $data = [
        'name' => htmlspecialchars($_POST['username'] ?? ''),
        'username' => htmlspecialchars($_POST['username'] ?? ''),
        'password' => sha1($_POST['password'] ?? ''),
        'email' => filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL),
        'tel' => htmlspecialchars($_POST['tel'] ?? ''),
    ];

    $register = new Register();
    try {
        $register->register($data);
        $message = 'Bạn đã đăng kí thành công!';
    } catch (Exception $e) {
        $message = 'Đăng ký thất bại: ' . $e->getMessage();
    }
}

?>
<?php include './mvc/view/block/header.php' ?>
<main>
    <form class="m-auto shadow p-5 rounded-5 my-5" style="max-width: 30rem;" action="" method="POST">
        <h2>Tạo tài khoản</h2>
        <p>Đăng ký miễn phí hoặc đăng nhập để nhận được các ưu đãi và quyền lợi hấp dẫn!</p>
        <!-- username -->
        <div class="mb-3">
            <label for="username" class="form-label">Tên đăng nhập</label>
            <input type="text" name="username" class="form-control" id="username" value="<?php if (isset($_POST['username']))
                echo $_POST['username'] ?>">
            </div>
            <!-- password -->
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" name="password" class="form-control" id="password" value="<?php if (isset($_POST['password']))
                echo $_POST['password'] ?>">
            </div>
            <div class="mb-3">
                <label for="confirm-password" class="form-label">Xác nhận lại mật khẩu</label>
                <input type="password" name="confirm_password" class="form-control" id="confirm-password" value="<?php if (isset($_POST['confirm_password']))
                echo $_POST['confirm_password'] ?>">
            </div>
            <!-- email -->
            <div class="mb-3">
                <label for="email" class="form-label">Tài khoản email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php if (isset($_POST['email']))
                echo $_POST['email'] ?>">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <!-- tel -->
            <div class="mb-3">
                <label for="tel" class="form-label">Số điện thoại</label>
                <input type="number" class="form-control" id="tel" name="tel" value="<?php if (isset($_POST['tel']))
                echo $_POST['tel'] ?>">
            </div>
            <div class="mt-3">
                <button type="submit" name="submit" class="btn btn-primary w-100">Đăng kí</button>
            </div>

        <?php if (isset($message)) {
                echo '<p>' . $message . '</p>';
            } ?>
        <p class="mt-3">Đã có tài khoản? <a href="./index.php?page=login">Đăng nhập ngay</a></p>
    </form>
</main>