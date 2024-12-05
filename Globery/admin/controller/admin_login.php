<?php
include '../model/connectdb.php';
session_start();
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $pass = sha1($_POST['pass']);
    $select_admin = $conn->prepare("SELECT * FROM `admins` WHERE name = ? AND password = ?");
    $select_admin->execute([$name, $pass]);
    $row = $select_admin->fetch(PDO::FETCH_ASSOC);
    if ($select_admin->rowCount() > 0) {
        $_SESSION['admin_id'] = $row['id_admin'];
        $_SESSION['admin_name'] = $row['name'];
        header('location: ../index.php');
        exit();
    } else {
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../view/css/bootstrap.min.css" />
</head>

<body>

    <div class="container-flude d-grid place-content-center" style="height: 100vh;">
        <form action="" method="post" class="form-control rounded-5 p-5 m-auto shadow"  style="max-width: 30rem;">
            <h2 class="input-title text-center">Đăng nhập Admin</h2>
            <div class="row row-cols-1">
                <div class="col my-3">
                    <div class="form-input w-100">
                        <input type="text" name="name"
                            value="<?php if (isset($_POST['name'])) {
                                echo $_POST['name'];
                            }
                            ; ?>"
                            class="form-control input-focus p-2" autocomplete="current-username"
                            placeholder="Tên đăng nhập">
                        <style>
                            .input-focus:focus {
                                border: 1px solid #6b757d;
                                box-shadow: none;
                            }
                        </style>
                    </div>
                </div>
                <div class="col my-3">
                    <div class="form-input w-100">
                        <input type="password" id="password" name="pass"
                            value="<?php if (isset($_POST['pass'])) {
                                echo $_POST['pass'];
                            }
                            ; ?>"
                            class="form-control input-focus p-2" autocomplete="current-password" placeholder="Mật khẩu">
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" class="btn btn-primary w-100 mt-3" value="Đăng nhập">
            <?php
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '
         <div class="message mt-3">
            <span class="text-danger p-3">' . $message . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
                }
            }
            ?>
    </div>
    </div>
    </form>
</body>

</html>