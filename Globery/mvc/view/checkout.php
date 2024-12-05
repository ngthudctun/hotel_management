<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addBooking'])) {

    if (isset($_POST['id_customer'])) {
        $data = [
            'request' => htmlspecialchars($_POST['request'] ?? ''),
            'start_date' => htmlspecialchars($_POST['start_date'] ?? ''),
            'end_date' => htmlspecialchars($_POST['end_date'] ?? ''),
            'total_price' => htmlspecialchars($_POST['total_price'] ?? ''),
            'id_customer' => htmlspecialchars($_POST['id_customer'] ?? ''),
            'id_room' => htmlspecialchars($_POST['id_room'] ?? ''),
        ];

        $add = new getData();
        try {
            $add->addBooking($data);
            $message = 'Đặt phòng thành công';
        } catch (Exception $e) {
            $message = 'Đặt phòng thất bại: ' . $e->getMessage();
        }
    } else {
        $message = 'Vui lòng đăng nhập trước';
    }


}
?>

<main class="container">
    <div class="row g-0">
        <div class="col-sm-6 col-md-8">
            <?php foreach ($getRoomHotel as $row): ?>
                <div class="card mb-3">
                    <div class="d-flex m-3">
                        <div class="btn btn-secondary btn-sm"><i class="fa-solid fa-house"></i><span> Khách sạn</span>
                        </div>
                    </div>
                    <div class="row g-0 m-3">
                        <div class="col-md-2">
                            <img src="./mvc/view/img/<?php echo $row['image_room'] ?>" alt=""
                                class="img-fluid rounded-start" style="width: 100%;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-0 ps-3">
                                <h5 class="card-title"><?php echo $row['name'] ?></h5>
                                <p class="card-text">
                                    <span class="text-warning"><i class="fa-solid fa-star"></i><i
                                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span>
                                    <span class="ms-3">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <span><?php echo $row['address'] ?></span>
                                    </span>
                                    <span class="text-body-secondary d-flex gap-3">
                                        <span class="text-danger">
                                            <?php echo $row['average_rating'] ?> tuyệt vời</span><span>612 nhận xét</span>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <hr class="mt-3">
                        </hr>
                        <div class="d-flex">
                            <div class="d-flex flex-column">
                                <h5 class="mt-1"> <?php echo $row['type_name'] ?></h5>
                                <div class="fw-blod ms-3 text-body-secondary"><i class="fa-solid fa-list-check"></i><span
                                        class="ms-2">9 tháng 11 năm 2024 — 10 tháng 11 năm 2024</span></div>
                                <div class="fw-blod ms-3 text-body-secondary"><i class="fa-solid fa-users"></i><span
                                        class="ms-2">Khách:  2 người
                                        lớn/phòng</span></div>
                                <div class="fw-blod ms-3 text-body-secondary"><i class="fa-solid fa-check"></i><span
                                        class="ms-2">Thanh toán khi nhận phòng</span></div>
                                <div class="fw-blod ms-3 text-body-secondary"><i class="fa-solid fa-check"></i><span
                                        class="ms-2"><?php echo $row['review'] ?></span></div>
                            </div>
                            <div class="ms-auto d-flex flex-column">
                                <span class="text-danger fw-bolder fs-5 text-end"><?php echo $row['price'] ?> VND</span>
                                <span style="font-size: 10px;">Đã bao gồm thuế và phí</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="text-center">
                <a class="link-offset-2 link-underline link-underline-opacity-0 text-danger fw-bold" href="#">Điều
                    khoản và dịch vụ</a>
            </div>
            <!-- <div class="mt-3 border border-secondary-subtle rounded p-3">
                <h5>Hoạt động không thể bỏ qua ở Hồ Chí Minh</h5>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://cf.bstatic.com/xdata/images/hotel/max1280x900/404369597.jpg?k=963fb767510a92eae819fabbe576b6d15f10f368a4eaf0ae46ec030371651f93&o=&hp=1"
                                class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Nhà Thờ Đức Bà</h5>
                                <p class="card-text">Địa chỉ: 01 Công xã Paris, Bến Nghé, Quận 1, Hồ Chí Minh, Việt
                                    Nam <br>Vé vào cổng: Miễn phí <br> Đánh giá: <span class="text-warning"><i
                                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span></p>
                                <p class="card-text"><button type="button" class="btn btn-primary btn-sm">View now
                                    </button></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://cf.bstatic.com/xdata/images/hotel/max1280x900/404369597.jpg?k=963fb767510a92eae819fabbe576b6d15f10f368a4eaf0ae46ec030371651f93&o=&hp=1"
                                class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Nhà Thờ Đức Bà</h5>
                                <p class="card-text">Địa chỉ: 01 Công xã Paris, Bến Nghé, Quận 1, Hồ Chí Minh, Việt
                                    Nam <br>Vé vào cổng: Miễn phí <br> Đánh giá: <span class="text-warning"><i
                                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span></p>
                                <p class="card-text"><button type="button" class="btn btn-primary btn-sm">View now
                                    </button></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://cf.bstatic.com/xdata/images/hotel/max1280x900/404369597.jpg?k=963fb767510a92eae819fabbe576b6d15f10f368a4eaf0ae46ec030371651f93&o=&hp=1"
                                class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Nhà Thờ Đức Bà</h5>
                                <p class="card-text">Địa chỉ: 01 Công xã Paris, Bến Nghé, Quận 1, Hồ Chí Minh, Việt
                                    Nam <br>Vé vào cổng: Miễn phí <br> Đánh giá: <span class="text-warning"><i
                                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span></p>
                                <p class="card-text"><button type="button" class="btn btn-primary btn-sm">View now
                                    </button></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="col-6 col-md-4">
            <div class="card ms-3 position-sticky" style="top: 10px;">
                <form action="" method="post" class="m-auto p-3" style="max-width: 30rem;">
                    <input type="number" value="<?php echo $getRoomHotel[0]['price'] ?>" name="total_price" hidden>
                    <input type="number" value="<?php echo $_GET['room'] ?>" name="id_room" hidden>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <input type="number" value="<?php echo $_SESSION['user_id'] ?>" name="id_customer" hidden>
                    <?php endif ?>
                    <div class="mb-3">
                        <label for="start_date">Ngày nhận phòng</label>
                        <input type="date" class="form-control" name="start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_date">Ngày trả phòng</label>
                        <input type="date" class="form-control" name="end_date" required>
                    </div>

                    <div class="mb-3">
                        <label for="request" class="form-label">Yêu cầu</label>
                        <input type="text" class="form-control" name="request" id="request" aria-describedby="request">
                        <div  class="form-text">có thể để trống</div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="addBooking">Đặt ngay</button>
                    <div class="mb-3"> <?php if (isset($message))
                        echo $message; ?></div>

                </form>
            </div>
        </div>
    </div>

</main>