<?php
// Kết nối cơ sở dữ liệu
$dsn = "mysql:host=localhost;dbname=hotel_management;charset=utf8";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}

// Xử lý yêu cầu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add') {
        // Thêm khách sạn
        $image_name = null;
        if (!empty($_FILES['image_hotel']['tmp_name'])) {
            $image_name = time() . "_" . basename($_FILES['image_hotel']['name']);
            move_uploaded_file($_FILES['image_hotel']['tmp_name'], "upload/" . $image_name);
        }

        $stmt = $pdo->prepare("INSERT INTO hotel (name_hotel, image_hotel, tel, email, address, average_rating, total_room, review, description) 
                               VALUES (:name_hotel, :image_hotel, :tel, :email, :address, :average_rating, :total_room, :review, :description)");
        $stmt->execute([
            ':name_hotel' => $_POST['name_hotel'],
            ':image_hotel' => $image_name,
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
            move_uploaded_file($_FILES['image_hotel']['tmp_name'], "upload/" . $image_name);
        }

        $stmt = $pdo->prepare("UPDATE hotel SET name_hotel = :name_hotel, image_hotel = :image_hotel, tel = :tel, email = :email, 
                               address = :address, average_rating = :average_rating, total_room = :total_room, review = :review, description = :description 
                               WHERE id_hotel = :id_hotel");
        $stmt->execute([
            ':name_hotel' => $_POST['name_hotel'],
            ':image_hotel' => $image_name,
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

    // header("Location: admin_hotel.");
    exit;
}

// Lấy danh sách khách sạn
$stmt = $pdo->query("SELECT id_hotel, name_hotel, image_hotel, tel, email, address FROM hotel");
$hotels = $stmt->fetchAll();

// Nếu có id_hotel trong URL, ta sẽ lấy thông tin khách sạn đó để sửa
if (isset($_GET['id_hotel'])) {
    $stmt = $pdo->prepare("SELECT * FROM hotel WHERE id_hotel = :id_hotel");
    $stmt->execute([':id_hotel' => $_GET['id_hotel']]);
    $hotel_to_edit = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý khách sạn</title>
</head>

<body>
    <h1>Quản lý khách sạn</h1>

    <!-- Danh sách khách sạn -->
    <h2>Danh sách khách sạn</h2>
    <table border="1">
        <tr>
            <th>Tên khách sạn</th>
            <th>Hình ảnh</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($hotels as $hotel): ?>
            <tr>
                <td><?= htmlspecialchars($hotel['name_hotel']) ?></td>
                <td>
                    <?php
                    $image_path = 'upload/' . htmlspecialchars($hotel['image_hotel']);
                    ?>
                    <img src="http://localhost/da1/<?= $image_path ?>" alt="Hình ảnh" width="100">
                </td>


                <td><?= htmlspecialchars($hotel['tel']) ?></td>
                <td><?= htmlspecialchars($hotel['email']) ?></td>
                <td><?= htmlspecialchars($hotel['address']) ?></td>
                <td>
                    <form action="admin_hotel.php" method="get" style="display:inline;">
                        <input type="hidden" name="id_hotel" value="<?= $hotel['id_hotel'] ?>">
                        <button type="submit">Sửa</button>
                    </form>
                    <form action="admin_hotel.php" method="post" style="display:inline;">
                        <input type="hidden" name="id_hotel" value="<?= $hotel['id_hotel'] ?>">
                        <button type="submit" name="action" value="delete"
                            onclick="return confirm('Xác nhận xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>


    <!-- Thêm/Sửa khách sạn -->
    <h2><?= isset($hotel_to_edit) ? 'Sửa khách sạn' : 'Thêm khách sạn' ?></h2>
    <form action="admin_hotel.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_hotel" value="<?= isset($hotel_to_edit) ? $hotel_to_edit['id_hotel'] : '' ?>">
        <input type="hidden" name="old_image" value="<?= isset($hotel_to_edit) ? $hotel_to_edit['image_hotel'] : '' ?>">
        <div>
            <label for="name_hotel">Tên khách sạn:</label>
            <input type="text" name="name_hotel" id="name_hotel"
                value="<?= isset($hotel_to_edit) ? htmlspecialchars($hotel_to_edit['name_hotel']) : '' ?>" required>
        </div>
        <div>
            <label for="image_hotel">Hình ảnh:</label>
            <input type="file" name="image_hotel" id="image_hotel">
            <?php if (isset($hotel_to_edit) && $hotel_to_edit['image_hotel']): ?>
                <img src="uploads/<?= htmlspecialchars($hotel_to_edit['image_hotel']) ?>" alt="Hình ảnh cũ" width="100">
            <?php endif; ?>
        </div>
        <div>
            <label for="tel">Số điện thoại:</label>
            <input type="text" name="tel" id="tel"
                value="<?= isset($hotel_to_edit) ? htmlspecialchars($hotel_to_edit['tel']) : '' ?>" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email"
                value="<?= isset($hotel_to_edit) ? htmlspecialchars($hotel_to_edit['email']) : '' ?>" required>
        </div>
        <div>
            <label for="address">Địa chỉ:</label>
            <input type="text" name="address" id="address"
                value="<?= isset($hotel_to_edit) ? htmlspecialchars($hotel_to_edit['address']) : '' ?>" required>
        </div>
        <div>
            <label for="average_rating">Đánh giá trung bình:</label>
            <input type="number" name="average_rating" id="average_rating"
                value="<?= isset($hotel_to_edit) ? htmlspecialchars($hotel_to_edit['average_rating']) : '' ?>" required>
        </div>
        <div>
            <label for="total_room">Tổng số phòng:</label>
            <input type="number" name="total_room" id="total_room"
                value="<?= isset($hotel_to_edit) ? htmlspecialchars($hotel_to_edit['total_room']) : '' ?>" required>
        </div>
        <div>
            <label for="review">Đánh giá:</label>
            <input type="text" name="review" id="review"
                value="<?= isset($hotel_to_edit) ? htmlspecialchars($hotel_to_edit['review']) : '' ?>" required>
        </div>
        <div>
            <label for="description">Mô tả:</label>
            <textarea name="description" id="description"
                required><?= isset($hotel_to_edit) ? htmlspecialchars($hotel_to_edit['description']) : '' ?></textarea>
        </div>
        <button type="submit" name="action"
            value="<?= isset($hotel_to_edit) ? 'edit' : 'add' ?>"><?= isset($hotel_to_edit) ? 'Cập nhật' : 'Thêm' ?></button>
    </form>
</body>

</html>
