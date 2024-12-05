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


                                <div class="fw-blod ms-3 text-body-secondary"><i class="fa-solid fa-check"></i><span
                                        class="ms-2">Thanh toán tại nơi ở</span></div>
                                <div class="fw-blod ms-3 text-body-secondary"><i class="fa-solid fa-check"></i><span
                                        class="ms-2">Thanh toán online</span></div>
                                <div class="fw-blod ms-3 text-body-secondary"><i class="fa-solid fa-check"></i><span
                                        class="ms-2"><?php echo $row['review'] ?></span></div>
                            </div>
                            <div class="ms-auto d-flex flex-column">
                                <span class="text-danger fw-bolder fs-5 text-end"><?php echo $row['price'] ?> VND</span>
                                <span style="font-size: 10px;">Đã bao gồm thuế và phí</span>
                                <?php if(!isset($user)){ ?>
                                    <a href="./?page=login"><button class="btn btn-primary mt-3">Đặt ngay
                                    </button></a>
                                <?php } else {?>
                                    <a href="./?page=checkout&room=<?php echo $row['id_room'] ?>"><button class="btn btn-primary mt-3">Đặt ngay
                                    </button></a>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="text-center">
                <a class="link-offset-2 link-underline link-underline-opacity-0 text-danger fw-bold" href="#">Điều
                    khoản và dịch vụ</a>
            </div>
            <div class="mt-3 border border-secondary-subtle rounded p-3">
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
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="card ms-3 position-sticky" style="top: 10px;">
                <div class="card-body">
                    <div class="d-flex">
                        <span class="fs-5 fw-bold">Tổng giá</span>
                        <span
                            class="text-danger fw-bolder fs-5 text-end ms-auto">
                            <?php echo $getRoomHotel[0]['price'] ?> VND</span>
                    </div>
                    <div style="font-size: 10px;">Đã bao gồm thuế và phí</div>
                    <a href="#"><button class="btn btn-primary w-100 mt-3">Đặt ngay
                        </button></a>
                </div>
            </div>
        </div>
    </div>
</main>