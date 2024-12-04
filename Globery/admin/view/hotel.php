<?php
// Kết nối cơ sở dữ liệu
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


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $hotels = $admin_db->search('hotel', $_POST['searchName']);
} else {
    // Xử lý yêu cầu
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'] ?? '';

        if ($action === 'add') {
            // Thêm khách sạn
            $image_name = null;
            if (!empty($_FILES['image_hotel']['tmp_name'])) {
                $image_name = time() . "_" . basename($_FILES['image_hotel']['name']);
                move_uploaded_file($_FILES['image_hotel']['tmp_name'], "./../mvc/view/img/" . $image_name);
            }

            $stmt = $pdo->prepare("INSERT INTO hotel (name, image_hotel, tel, email, address, average_rating, total_room, review, description) 
                               VALUES (:name, :image_hotel, :tel, :email, :address, :average_rating, :total_room, :review, :description)");
            $stmt->execute([
                ':name' => $_POST['name'],
                ':image_hotel' => $image_name ?: 'default_image.jpg', // Nếu không có hình ảnh, dùng hình ảnh mặc định
                ':tel' => $_POST['tel'],
                ':email' => $_POST['email'],
                ':address' => $_POST['address'],
                ':average_rating' => $_POST['average_rating'],
                ':total_room' => $_POST['total_room'],
                ':review' => $_POST['review'],
                ':description' => $_POST['description'],
            ]);
        } elseif ($action === 'edit') {
            // Sửa khách sạn
            $image_name = $_POST['old_image'];
            if (!empty($_FILES['image_hotel']['tmp_name'])) {
                $image_name = time() . "_" . basename($_FILES['image_hotel']['name']);
                move_uploaded_file($_FILES['image_hotel']['tmp_name'], "./../mvc/view/img/" . $image_name);
            }

            $stmt = $pdo->prepare("UPDATE hotel SET name = :name, image_hotel = :image_hotel, tel = :tel, email = :email, 
    address = :address, average_rating = :average_rating, total_room = :total_room, review = :review, description = :description 
WHERE id_hotel = :id_hotel");
            $stmt->execute([
                ':name' => $_POST['name'],
                ':image_hotel' => $image_name ?: $_POST['old_image'], // Nếu không có hình ảnh mới, giữ nguyên hình ảnh cũ
                ':tel' => $_POST['tel'],
                ':email' => $_POST['email'],
                ':address' => $_POST['address'],
                ':average_rating' => $_POST['average_rating'],
                ':total_room' => $_POST['total_room'],
                ':review' => $_POST['review'],
                ':description' => $_POST['description'],
                ':id_hotel' => $_POST['id_hotel'],
            ]);
        } elseif ($action === 'delete') {
            // Xóa khách sạn
            $stmt = $pdo->prepare("DELETE FROM hotel WHERE id_hotel = :id_hotel");
            $stmt->execute([':id_hotel' => $_POST['id_hotel']]);
        }

        // header("Location: ./index.php?page=hotel");
        exit;
    }

    // Lấy danh sách khách sạn
    $stmt = $pdo->query("SELECT id_hotel, name, image_hotel, tel, email, address FROM hotel");
    $hotels = $stmt->fetchAll();
}
?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-3">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Danh sách sản phẩm</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button id="btn-toggle" type="button" class="btn btn-primary" onclick="toggleForm();">Thêm Khách
                Sạn</button>
        </div>
    </div>
    <form action="./?page=hotel" method="post" class="mb-3">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="searchName" placeholder="Nhập tên người dùng">
            <button class="btn btn-outline-secondary" type="submit" name="search">Tìm kiếm</button>
        </div>
    </form>
    <form id="addHotel" hidden action="" method="post" enctype="multipart/form-data">
        <input class="form-control" type="hidden" name="id_hotel" value="">
        <div>
            <label for="name">Tên khách sạn:</label>
            <input class="form-control" type="text" name="name" id="name" required>
        </div>
        <div class="mt-3">
            <label for="image_hotel">Hình ảnh:</label>
            <input class="form-control" type="file" name="image_hotel" id="image_hotel">
        </div>
        <div class="mt-3">
            <label for="tel">Số điện thoại:</label>
            <input class="form-control" type="number" name="tel" id="tel" required>
        </div>
        <div class="mt-3">
            <label for="email">Email:</label>
            <input class="form-control" type="email" name="email" id="email" required>
        </div>
        <div class="mt-3">
            <label for="address">Địa chỉ:</label>
            <input class="form-control" type="text" name="address" id="address" required>
        </div>
        <div class="mt-3">
            <label for="average_rating">Đánh giá trung bình:</label>
            <input class="form-control" type="number" name="average_rating" id="average_rating" required>
        </div>
        <div class="mt-3">
            <label for="total_room">Tổng số phòng:</label>
            <input class="form-control" type="number" name="total_room" id="total_room" required>
        </div>
        <div class="mt-3">
            <label for="review">Đánh giá:</label>
            <input class="form-control" type="text" name="review" id="review" required>
        </div>
        <div class="mt-3">
            <label for="description">Mô tả:</label>
            <textarea class="form-control" name="description" id="description" required></textarea>
        </div>
        <button class="btn btn-primary mt-3" type="submit" name="action" value="add">Thêm</button>
    </form>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Tên Khách sạn</th>
                    <th>Hình ảnh</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($hotels as $hotel): ?>
                        <?php if (!isset($_POST['sua'])) { ?>
                            <td><?php echo $i++; ?></td>
                            <td><?= htmlspecialchars($hotel['name']) ?></td>
                            <td><img src="./../mvc/view/img/<?= htmlspecialchars($hotel['image_hotel']) ?>" alt="Hình ảnh"
                                    width="100">
                            </td>
                            <td><?= htmlspecialchars($hotel['tel']) ?></td>
                            <td><?= htmlspecialchars($hotel['email']) ?></td>
                            <td><?= htmlspecialchars($hotel['address']) ?></td>
                            <td>
                                <form method="post" action="" style="display:inline;">
                                    <input type="hidden" name="id_hotel" value="<?= $hotel['id_hotel'] ?>">
                                    <input type="hidden" name="old_image" value="<?= $hotel['image_hotel'] ?>">
                                    <button class="btn btn-sm btn-warning" type="submit" name="sua" value="sua">Sửa</button>
                                </form>
                                <form action="" method="post" style="display:inline;">
                                    <input type="hidden" name="id_hotel" value="<?= $hotel['id_hotel'] ?>">
                                    <button class="btn btn-sm btn-danger" type="submit" name="action" value="delete"
                                        onclick="return confirm('Xác nhận xóa?')">Xóa</button>
                                </form>
                            </td>
                        <?php } else { ?>
                            <form action="./?page=hotel" method="post" enctype="multipart/form-data" style="display:inline;">
                                <td class="mt-3"><?= htmlspecialchars($hotel['id_hotel']) ?></td>
                                <td>
                                    <input type="text" class="form-control" name="name"
                                        value="<?= htmlspecialchars($hotel['name']) ?>">
                                </td>
                                <td><input type="file" class="form-control" name="image_hotel">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="tel"
                                        value="<?= htmlspecialchars($hotel['tel']) ?>">
                                </td>
                                <td><input type="email" class="form-control" name="email"
                                        value="<?= htmlspecialchars($hotel['email']) ?>"></td>
                                <td><input type="text" class="form-control" name="address"
                                        value="<?= htmlspecialchars($hotel['address']) ?>"></td>
                                <td>

                                    <input type="hidden" name="id_hotel" value="<?= $hotel['id_hotel'] ?>">
                                    <input type="hidden" name="old_image" value="<?= $hotel['image_hotel'] ?>">
                                    <button type="submit" class="btn btn-sm btn-warning" value="edit" name="action">Lưu</button>
                                    <button class="btn btn-sm btn-danger" disabled type="submit" name="action"
                                        value="">Hủy</button>
                                </td>
                            </form>
                        <?php } ?>
                        </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<script>
    function toggleForm() {
        document.querySelector('#addHotel').hidden = !document.querySelector('#addHotel').hidden;
        if (document.querySelector('#addHotel').hidden) {
            document.querySelector('#btn-toggle').innerHTML = "Thêm Khách Sạn";
        } else {
            document.querySelector('#btn-toggle').innerHTML = "Thu gọn";
        }
    }

</script>