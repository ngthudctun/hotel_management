<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_management";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra nếu có yêu cầu thêm, sửa, xóa banner
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add_banner"])) {
        // Thêm banner
        $image = $_FILES["banner_image"]["name"];
        $targetFile = "./../mvc/view/banner/" . basename($image);
        if (move_uploaded_file($_FILES["banner_image"]["tmp_name"], $targetFile)) {
            $sql = "INSERT INTO banner (img) VALUES ('$targetFile')";
            if ($conn->query($sql) === TRUE) {
                $message = "Banner mới đã được thêm!";
            } else {
                $message = "Lỗi: " . $conn->error;
            }
        } else {
            $message = "Lỗi khi tải ảnh lên!";
        }
    } elseif (isset($_POST["edit_banner"])) {
        // Sửa banner
        $banner_id = $_POST["banner_id"];
        $image = $_FILES["banner_image"]["name"];
        $targetFile = "img/" . basename($image);
        if (move_uploaded_file($_FILES["banner_image"]["tmp_name"], $targetFile)) {
            $sql = "UPDATE banner SET img = '$targetFile' WHERE id = $banner_id";
            if ($conn->query($sql) === TRUE) {
                $message = "Banner đã được sửa!";
            } else {
                $message = "Lỗi: " . $conn->error;
            }
        } else {
            $message = "Lỗi khi tải ảnh lên!";
        }
    } elseif (isset($_POST["delete_banner"])) {
        // Xóa banner
        $banner_id = $_POST["banner_id"];
        $sql = "DELETE FROM banner WHERE id = $banner_id";
        if ($conn->query($sql) === TRUE) {
            $message = "Banner đã được xóa!";
        } else {
            $message = "Lỗi: " . $conn->error;
        }
    }
}

// Lấy danh sách banner
$sql = "SELECT * FROM banner";
$result = $conn->query($sql);
$banners = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $banners[] = $row;
    }
}
$conn->close();
?>


<style>
    .carousel-inner {
        height: 400px;
    }

    .carousel-item img {
        object-fit: cover;
        height: 100%;
    }

    .form-section {
        margin-top: 30px;
    }

    .form-control {
        width: 80%;
    }

    .carousel-caption {
        position: absolute;
        top: 10px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1;
    }
</style>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="container mt-5">
        <h1 class="text-center">Quản lý Banner</h1>

        <!-- Form thêm banner -->
        <div class="form-section">
            <h3>Thêm Banner</h3>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="banner_image">Chọn ảnh:</label>
                    <input type="file" class="form-control" name="banner_image" required>
                </div>
                <button type="submit" name="add_banner" class="btn btn-primary mt-3">Thêm Banner</button>
            </form>
        </div>

        <hr>

        <!-- Hiển thị các banner hiện tại -->
        <h3>Danh sách Banner</h3>
        <?php if(isset($message)): ?>
            <span><?php echo $message ?></span>
            <?php endif; ?>
        <div id="carouselExample" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php if (!empty($banners)): ?>
                    <?php foreach ($banners as $index => $banner): ?>
                        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                            <div class="carousel-caption">
                                <!-- Form sửa và xóa banner nằm ở đây -->
                                <form method="POST" enctype="multipart/form-data" class="d-inline-block">
                                    <input type="hidden" name="banner_id" value="<?php echo $banner['id']; ?>">
                                    <div class="form-group">
                                        <label for="banner_image">Chọn ảnh mới:</label>
                                        <input type="file" class="form-control" name="banner_image" required>
                                    </div>
                                    <button type="submit" name="edit_banner" class="btn btn-warning">Sửa Banner</button>
                                </form>
                                <form method="POST" class="d-inline-block ml-2">
                                    <input type="hidden" name="banner_id" value="<?php echo $banner['id']; ?>">
                                    <button type="submit" name="delete_banner" class="btn btn-danger">Xóa Banner</button>
                                </form>
                            </div>
                            <img src="<?php echo htmlspecialchars($banner['img']); ?>" class="d-block w-100" alt="Banner <?php echo $index + 1; ?>">
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="carousel-item active">
                        <p class="text-center">Không có banner nào để hiển thị.</p>
                     </div>
                <?php endif; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
</main>