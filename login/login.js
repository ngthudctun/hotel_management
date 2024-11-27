// Chuyển sang giao diện Đăng ký khi nhấn nút "Đăng Ký"

document.querySelector('.btn-signup').addEventListener('click', function () {
  const loginContainer = document.querySelector('.login-container');
  loginContainer.innerHTML = `
      <form class="register-form">
          <h2>Đăng nhập hoặc tạo tài khoản</h2>
          <p>Đăng ký miễn phí hoặc đăng nhập để nhận được các ưu đãi và quyền lợi hấp dẫn!</p>
          <label for="username">Tên đăng nhập:</label>
          <input type="text" id="username" placeholder="Nhập tên đăng nhập" required>
          <label for="password">Mật khẩu:</label>
          <input type="password" id="password" placeholder="Nhập mật khẩu" required>
          <label for="phone">Số điện thoại:</label>
          <input type="text" id="phone" placeholder="Nhập số điện thoại" required>
          <div class="options">
              <label><input type="checkbox"> Ghi nhớ tôi</label>
              <a href="#" class="back-to-login">Quay lại đăng nhập</a>
          </div>
          <button type="submit">Đăng Ký</button>
      </form>
  `;

  // Thêm sự kiện quay lại giao diện đăng nhập
  document.querySelector('.back-to-login').addEventListener('click', function (e) {
      e.preventDefault();
      document.querySelector('.btn-login').click(); // Gọi hàm quay lại trang đăng nhập
  });

  // Xử lý sự kiện nhấn nút "Đăng Ký"
  document.querySelector('.register-form').addEventListener('submit', function (e) {
      e.preventDefault();
      alert('Đăng ký thành công!');
  });
});

// Hàm hiển thị giao diện Đăng nhập
document.querySelector('.btn-login').addEventListener ('click', function showLoginForm() {
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
  document.querySelector('.go-to-signup').addEventListener('click', function (e) {
      e.preventDefault();
      document.querySelector('.btn-signup').click(); // Kích hoạt nút "Đăng Ký"
  });

  // Xử lý sự kiện nhấn nút "Đăng Nhập"
  document.querySelector('.login-form').addEventListener('submit', function (e) {
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
