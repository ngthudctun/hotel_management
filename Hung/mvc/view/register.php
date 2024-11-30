<main>
    <div class="login-container">
        <form class="login-form">
            <h2>Tạo tài khoản</h2>
            <p>Đăng ký miễn phí hoặc đăng nhập để nhận được các ưu đãi và quyền lợi hấp dẫn!</p>
            <label for="username">Tên đăng nhập</label>
            <input type="text" id="username" placeholder="Nhập tên đăng nhập" required>
            <label for="password">Mật khẩu</label>
            <input type="password" id="password" placeholder="Nhập mật khẩu" required>
            <label for="confirm_password">Xác nhận mật khẩu</label>
            <input type="confirm_password" id="confirm_password" placeholder="Xác nhận mật khẩu" required>
            <button type="submit" class="mt-3">Đăng Kí</button>
            <p>Đã có tài khoản? <a href="./index.php?page=login">Đăng nhập ngay</a></p>
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