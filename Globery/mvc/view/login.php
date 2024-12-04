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

<!-- <script>
// Chuyển sang giao diện Đăng ký khi nhấn nút "Đăng Ký"

document.querySelector('.btn-signup').addEventListener('click', function() {
    //     const loginContainer = document.querySelector('.login-container');
    //     loginContainer.innerHTML = `
    //       <form class="register-form">
    //           <h2>Đăng nhập hoặc tạo tài khoản</h2>
    //           <p>Đăng ký miễn phí hoặc đăng nhập để nhận được các ưu đãi và quyền lợi hấp dẫn!</p>
    //           <label for="username">Tên đăng nhập:</label>
    //           <input type="text" id="username" placeholder="Nhập tên đăng nhập" required>
    //           <label for="password">Mật khẩu:</label>
    //           <input type="password" id="password" placeholder="Nhập mật khẩu" required>
    //           <label for="phone">Số điện thoại:</label>
    //           <input type="text" id="phone" placeholder="Nhập số điện thoại" required>
    //           <div class="options">
    //               <label><input type="checkbox"> Ghi nhớ tôi</label>
    //               <a href="#" class="back-to-login">Quay lại đăng nhập</a>
    //           </div>
    //           <button type="submit">Đăng Ký</button>
    //       </form>
    //   `;

    // Thêm sự kiện quay lại giao diện đăng nhập
    document.querySelector('.back-to-login').addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('.btn-login').click(); // Gọi hàm quay lại trang đăng nhập
    });

    // Xử lý sự kiện nhấn nút "Đăng Ký"
    document.querySelector('.register-form').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Đăng ký thành công!');
    });
});

// Hàm hiển thị giao diện Đăng nhập
document.querySelector('.btn-login').addEventListener('click', function showLoginForm() {
    const loginContainer = document.querySelector('.login-container');
    loginContainer.innerHTML = `
      <form class="login-form">
          <h2>Đăng nhập hoặc tạo tài khoản</h2>
          <p>Đăng ký miễn phí hoặc đăng nhập để nhận được các ưu đãi và quyền lợi hấp dẫn!</p>
          <label for="username">Tên đăng nhập:</label>
          <input type="text" id="username" placeholder="Nhập tên đăng nhập" required>
          <label for="password">Mật khẩu:</label>
          <input type="password" id="password" placeholder="Nhập mật khẩu" required>
          <div class="options">
              <label><input type="checkbox"> Ghi nhớ tôi</label>
              <a href="#">Quên mật khẩu?</a>
          </div>
          <button type="submit">Đăng Nhập</button>
          <p>Chưa có tài khoản? <a href="#" class="go-to-signup">Đăng ký ngay</a></p>
      </form>
  `;

    // Thêm sự kiện chuyển sang giao diện Đăng ký
    document.querySelector('.go-to-signup').addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('.btn-signup').click(); // Kích hoạt nút "Đăng Ký"
    });

    // Xử lý sự kiện nhấn nút "Đăng Nhập"
    document.querySelector('.login-form').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Đăng nhập thành công!');
    });
})

// Lắng nghe sự kiện khi nhấn vào nút đăng nhập
document.querySelector('.btn-login').addEventListener('click', function() {
    // Cập nhật màu nền của các nút
    document.querySelector('.btn-login').classList.add('active'); // Nút đăng nhập có màu xanh
    document.querySelector('.btn-signup').classList.remove('active'); // Nút đăng ký không có màu xanh
});

// Lắng nghe sự kiện khi nhấn vào nút đăng ký
document.querySelector('.btn-signup').addEventListener('click', function() {
    // Cập nhật màu nền của các nút
    document.querySelector('.btn-signup').classList.add('active'); // Nút đăng ký có màu xanh
    document.querySelector('.btn-login').classList.remove('active'); // Nút đăng nhập không có màu xanh
});
</script> -->