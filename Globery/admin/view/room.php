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


$editing_id = $_POST['id_room'] ?? null;
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $rooms = $admin_db->search('room', $_POST['searchName']);
} else {
    // Xử lý yêu cầu
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'] ?? '';

        if ($action === 'add') {
            // Thêm khách sạn
            $image_name = null;
            if (!empty($_FILES['image_room']['tmp_name'])) {
                $image_name = time() . "_" . basename($_FILES['image_room']['name']);
                move_uploaded_file($_FILES['image_room']['tmp_name'], "./../mvc/view/img/" . $image_name);
            }

            $stmt = $pdo->prepare("INSERT INTO room (capacity, image_room, avalibity, id_hotel, room_number, id_type_room, price, description) 
                            VALUES (:capacity, :image_room, :avalibity, :id_hotel, :room_number, :id_type_room, :price, :description)");
            $stmt->execute([
                ':capacity' => $_POST['capacity'],
                ':image_room' => $image_name ?: 'default_image.jpg', // Nếu không có hình ảnh, dùng hình ảnh mặc định
                ':avalibity' => $_POST['avalibity'],
                ':id_hotel' => $_POST['id_hotel'],
                ':room_number' => $_POST['room_number'],
                ':id_type_room' => $_POST['id_type_room'],
                ':price' => $_POST['price'],
                ':description' => $_POST['description'],
            ]);
        } elseif ($action === 'edit') {
            // Sửa khách sạn
            $image_name = $_POST['old_image'];
            if (!empty($_FILES['image_room']['tmp_name'])) {
                $image_name = time() . "_" . basename($_FILES['image_room']['name']);
                move_uploaded_file($_FILES['image_room']['tmp_name'], "./../mvc/view/img/" . $image_name);
            }

            $stmt = $pdo->prepare("UPDATE room SET capacity = :capacity, image_room = :image_room, avalibity = :avalibity, id_hotel = :id_hotel, 
    room_number = :room_number, id_type_room = :id_type_room, price = :price, description = :description 
WHERE id_room = :id_room");
            $stmt->execute([
                ':capacity' => $_POST['capacity'],
                ':image_room' => $image_name ?: $_POST['old_image'], // Nếu không có hình ảnh mới, giữ nguyên hình ảnh cũ
                ':avalibity' => $_POST['avalibity'],
                ':id_hotel' => $_POST['id_hotel'],
                ':room_number' => $_POST['room_number'],
                ':id_type_room' => $_POST['id_type_room'],
                ':price' => $_POST['price'],
                ':description' => $_POST['description'],
                ':id_room' => $_POST['id_room'],

            ]);
        } elseif ($action === 'delete') {
            // Xóa khách sạn
            $stmt = $pdo->prepare("DELETE FROM room WHERE id_room = :id_room");
            $stmt->execute([':id_room' => $_POST['id_room']]);
        } elseif ($action === 'sua') {
            $editing_id = $_POST['id_room'] ?? null;
        }
        if ($action !== 'sua') {
            header("Location: ./index.php?page=room");
            exit();
        }
    }

    // Lấy danh sách khách sạn
    $stmt = $pdo->query("SELECT hotel.id_hotel, hotel.name, room_type.id_type_room, room_type.type_name, room.*
FROM  hotel join room
on hotel.id_hotel = room.id_hotel
join room_type on room_type.id_type_room = room.id_type_room;
");
    $rooms = $stmt->fetchAll();

    $stmt = $pdo->query("SELECT hotel.id_hotel, hotel.name from hotel");

    $hotels = $stmt->fetchAll();

    $stmt = $pdo->query("SELECT * from room_type");

    $types = $stmt->fetchAll();
}
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-3">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Danh sách phòng</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button id="btn-toggle" type="button" class="btn btn-primary" onclick="toggleForm();">Thêm Phòng</button>
        </div>
    </div>
    <form id="addRoom" action="./?page=room" method="post" enctype="multipart/form-data" hidden>
        <input class="form-control" type="hidden" name="id_room" value="">
        <div>
            <label for="name">Tên khách sạn:</label>
            <select class="form-select" aria-label="Default select example" name="id_hotel">
                <option selected>Open this select menu</option>
                <?php foreach ($hotels as $row): ?>
                    <option value="<?= htmlspecialchars($row['id_hotel']) ?>"> <?= htmlspecialchars($row['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mt-3">
            <label for="image_room">Hình ảnh:</label>
            <input class="form-control" type="file" name="image_room" id="image_room">
        </div>
        <div class="mt-3">
            <label for="id_type_room">Chọn loại phòng:</label>
            <select class="form-select" aria-label="Default select example" name="id_type_room">
                <option selected>Open this select menu</option>
                <?php foreach ($types as $row): ?>
                    <option value="<?= htmlspecialchars($row['id_type_room']) ?>">
                        <?= htmlspecialchars($row['type_name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mt-3">
            <label for="tel">Rộng:</label>
            <input class="form-control" type="number" name="capacity" id="capacity" required>
            <input class="form-control" type="number" name="avalibity" id="avalibity" value="1" hidden required>
        </div>
        <div class="mt-3">
            <label for="room_number">Số phòng:</label>
            <input class="form-control" type="room_number" name="room_number" id="room_number" required>
        </div>

        <div class="mt-3">
            <label for="price">Giá:</label>
            <input class="form-control" type="number" name="price" id="price" required>
        </div>
        <div class="mt-3">
            <label for="description">Mô tả:</label>
            <textarea class="form-control" name="description" id="description" required></textarea>
        </div>
        <button class="btn btn-primary mt-3" type="submit" name="action" value="add">Thêm</button>
    </form>
    <form action="./?page=room" method="post" class="my-3">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="searchName" placeholder="Nhập tên khách sạn">
            <button class="btn btn-outline-secondary border border-secondary-subtle" type="submit" name="search">Tìm kiếm</button>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Tên Khách sạn</th>
                    <th>Số phòng</th>
                    <th>Hình ảnh</th>
                    <th>Chiều rộng</th>
                    <th>Mô tả</th>
                    <th>Loại phòng</th>
                    <th>Giá</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($rooms as $row): ?>
                    <?php if ($editing_id == $row['id_room']): ?>
                        <form action="./?page=room" method="post" enctype="multipart/form-data">
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td>
                                    <input type="text" class="form-control" name="name"
                                        value="<?= htmlspecialchars($row['name']) ?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="room_number"
                                        value="<?= htmlspecialchars($row['room_number']) ?>">
                                </td>
                                <td>
                                    <input type="file" class="form-control" name="image_room">
                                </td>
                                <td>
                                    <input type="capacity" class="form-control" name="capacity"
                                        value="<?= htmlspecialchars($row['capacity']) ?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="description"
                                        value="<?= htmlspecialchars($row['description']) ?>">
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="id_type_room">
                                        <option selected>Open this select menu</option>
                                        <?php for ($i = 0; $i < count($types); $i++) { ?>
                                            <option value="<?= htmlspecialchars($types[$i]['id_type_room']) ?>">
                                                <?= htmlspecialchars($types[$i]['type_name']) ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="price"
                                        value="<?= htmlspecialchars($row['price']) ?>">
                                </td>
                                <td>
                                    <input type="hidden" name="id_room" value="<?= $row['id_room'] ?>">
                                    <input type="hidden" name="id_hotel" value="<?= $row['id_hotel'] ?>">
                                    <input type="hidden" name="avalibity" value="<?= $row['avalibity'] ?>">
                                    <input type="hidden" name="id_type_room" value="<?= $row['id_type_room'] ?>">
                                    <input type="hidden" name="old_image" value="<?= $row['image_room'] ?>">
                                    <button type="submit" class="btn btn-sm btn-warning" name="action" value="edit">Lưu</button>
                                    <a href="./?page=room" class="btn btn-sm btn-danger">Hủy</a>
                                </td>
                            </tr>
                        </form>
                    <?php else: ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['room_number']) ?></td>
                            <td><img src="./../mvc/view/img/<?= htmlspecialchars($row['image_room']) ?>" alt="Hình ảnh"
                                    width="100"></td>
                            <td><?= htmlspecialchars($row['capacity']) ?></td>
                            <td class="text-truncate" style="max-width: 10rem;"><?= htmlspecialchars($row['description']) ?>
                            </td>
                            <td><?= htmlspecialchars($row['type_name']) ?></td>
                            <td><?= htmlspecialchars($row['price']) ?>
                            </td>
                            <td>
                                <form method="post" action="./?page=room" style="display:inline;">
                                    <input type="hidden" name="id_room" value="<?= $row['id_room'] ?>">
                                    <button class="btn btn-sm btn-warning" type="submit" name="action" value="sua">Sửa</button>
                                </form>
                                <form action="./?page=room" method="post" style="display:inline;">
                                    <input type="hidden" name="id_room" value="<?= $row['id_room'] ?>">
                                    <button class="btn btn-sm btn-danger" type="submit" name="action" value="delete"
                                        onclick="return confirm('Xác nhận xóa?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</main>
<script>
    function toggleForm() {
        document.querySelector('#addRoom').hidden = !document.querySelector('#addRoom').hidden;
        if (document.querySelector('#addRoom').hidden) {
            document.querySelector('#btn-toggle').innerHTML = "Thêm Khách Sạn";
        } else {
            document.querySelector('#btn-toggle').innerHTML = "Thu gọn";
        }
    }

</script>