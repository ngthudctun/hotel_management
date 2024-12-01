<?php
include '../model/connectdb.php';
// INSERT INTO `admins` (`id`, `name`, `password`) VALUES (NULL, 'KhacHung', SHA1('111'));
session_start();
if(isset($_POST['submit'])){
   $name = $_POST['name'];
   $pass = sha1($_POST['pass']);
   $select_admin = $conn->prepare("SELECT * FROM `admins` WHERE name = ? AND password = ?");
   $select_admin->execute([$name, $pass]);
   $row = $select_admin->fetch(PDO::FETCH_ASSOC);
   if($select_admin->rowCount() > 0){
      $_SESSION['admin_id'] = $row['id'];
      $_SESSION['admin_name'] = $row['name'];
      header('location: ../index.php');
      exit();
   }else{
    $select_username = $conn->prepare("SELECT * FROM `admins` WHERE name = ?");
    $select_username->execute([$name]);
    $username = $select_username->fetch(PDO::FETCH_ASSOC);
    if ($username) {
        // Kiểm tra mật khẩu nếu tên đăng nhập tồn tại
            $message[] = 'Mật khẩu không đúng!';
    } else {
        $message[] = 'Tên đăng nhập không tồn tại!';
    }
   }
}
?>

<main>
    <div class="login-container">
        <form class="login-form">
            <h2>Đăng nhập hoặc tạo tài khoản</h2>
            <p>Đăng ký miễn phí hoặc đăng nhập để nhận được các ưu đãi và quyền lợi hấp dẫn!</p>
            <label for="username">Tên đăng nhập</label>
            <input type="text" id="username" placeholder="Nhập tên đăng nhập" required>
            <label for="password">Mật khẩu</label>
            <input type="password" id="password" placeholder="Nhập mật khẩu" required>
            <div class="options">
                <label><input type="checkbox"> Ghi nhớ tôi</label>
                <a href="#">Quên mật khẩu?</a>
            </div>
            <button type="submit">Đăng Nhập</button>
            <p>Chưa có tài khoản? <a href="./index.php?page=register">Đăng ký ngay</a></p>
        </form>
    </div>
</main>

<style>
    /* Nút Đăng Nhập */
    .btn-login {
        background-color: transparent;
        color: #333;
    }

    /* .btn-login.active,
    .btn-login:hover {
        background-color: #4CAF50;
        color: white;
    } */

    /* Nút Đăng Ký */
    /* .btn-signup {
        background-color: transparent;
        color: #333;
    } */

    /* Login/Register Container */
    .login-container {
        background-color: rgba(255, 255, 255, 0.9);
        padding: 30px;
        width: 350px;
        margin: 50px auto;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    .login-form h2,
    .register-form h2 {
        margin: 0 0 10px 0;
    }

    .login-form label,
    .register-form label {
        display: block;
        margin: 10px 0 5px 0;
    }

    .login-form input,
    .register-form input {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
    }

    .options label {
        display: flex;
        align-items: center;
        /* Căn giữa checkbox với văn bản */
        font-size: 14px;
        white-space: nowrap;
        /* Ngăn văn bản bị xuống dòng */
    }

    .options input[type="checkbox"] {
        margin-right: 5px;
        /* Thêm khoảng cách giữa checkbox và văn bản */
    }

    .options a {
        font-size: 14px;
        color: #4CAF50;
        text-decoration: none;
        white-space: nowrap;
        /* Ngăn văn bản bị xuống dòng */
    }

    .login-form button,
    .register-form button {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .login-form button:hover,
    .register-form button:hover {
        background-color: #45a049;
        /* Màu nền đậm hơn khi hover */
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        /* Hiệu ứng đổ bóng */
    }
</style>
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