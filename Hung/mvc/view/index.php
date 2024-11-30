<!-- Form -->
<div class="content m-0 position-relative"
    style="background-image: url(./mvc/view/img/banner.jpeg); min-height: 300px; ">

    <div class="form-container position-absolute" style="bottom: -50px;">
        <form>
            <div class=" position-relative">
                <div class=" position-absolute" style="top: -30px; background-color: aliceblue; border-radius: 20px;">
                    <i class="fa-solid fa-user" style="color: #000000;"></i>Khách Hàng
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-outline-success btn-sm rounded-pill">Việt Nam</button>
                    <button type="button" class="btn btn-outline-success btn-sm rounded-pill">Việt Nam</button>
                    <input type="password" class="form-control" id="sreach" placeholder="Tìm kiếm"
                        style="margin-top: 15px;">
                </div>
                <div class="row">
                    <div class="col" style="margin-top: 15px;">
                        <input type="date" class="form-control" placeholder="First name" aria-label="First name">
                    </div>
                    <div class="col" style="margin-top: 15px;">
                        <select class="form-select" aria-label="Default select example">
                            <i class="fa-solid fa-user" style="color: #000000;"></i>
                            <option selected>Phòng</option>
                            <option value="1">1 Giường</option>
                            <option value="2">2 Giường</option>
                            <option value="3">3 Giường</option>
                            <option value="4">Lớn (có trẻ em)</option>

                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-small mb-lg-1 w-50 " style="margin-top: 15px;">Sign
                in</button>
        </form>
    </div>
</div>
<!-- End Form  -->

<!-- SlideShow  -->
<div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./mvc/view/img/banner.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="./mvc/view/img/banner.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="./mvc/view/img/banner.jpeg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- End Slishow  -->

<!-- Product  -->
<div class="title">
    <h2 class="container text-right mt-5">TOP CÁC ĐIỂM ĐẾN ĐƯỢC YÊU THÍCH</h2>
</div>
<div class="button">
    <div class="container text-center my-4">
        <div class="d-flex gap-3  flex-wrap">
            <button type="button" class="btn btn-outline-success btn-sm rounded-pill">Việt Nam</button>
            <button type="button" class="btn btn-outline-primary btn-sm rounded-pill">Thái Lan</button>
            <button type="button" class="btn btn-outline-danger btn-sm rounded-pill">Hàn Quốc</button>
            <button type="button" class="btn btn-outline-warning btn-sm rounded-pill">Nhật Bản</button>
            <button type="button" class="btn btn-outline-info btn-sm rounded-pill">Malaysia</button>
        </div>
    </div>
</div>
<div class="container text-center">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
        <div class="col">
            <div class="card">
                <img src="./mvc/view/img/hcm.webp" class="card-img-top" alt="...">
                <a class="mini">Vietnam AirLines</a>
                <div class="card-body">
                    <!-- Đưa tiêu đề về bên trái -->
                    <h5 class="card-title text-start">Hà Nội - TP HCM</h5>

                    <!-- Dùng d-flex để căn chỉnh giá và icon -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Giá tiền cũ và mới -->
                        <p class="card-text text-body-secondary"><del>2.999.999 đ</del></p>
                        <p class="card-text text-danger">1.999.999 đ</p>
                    </div>

                    <!-- Nút và icon nằm trên cùng một dòng -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Nút bên trái -->
                        <a href="#" class="btn btn-primary">Đặt Tour Ngay</a>
                        <!-- Icon và rating nằm bên phải -->
                        <a href="#" class="btn btn-link d-flex align-items-center">
                            <span>4.5</span>
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <!-- Thêm icon ở đây (Font Awesome) -->
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <img src="./mvc/view/img/hcm.webp" class="card-img-top" alt="...">
                <a class="mini">Vietnam AirLines</a>
                <div class="card-body">
                    <!-- Đưa tiêu đề về bên trái -->
                    <h5 class="card-title text-start">Hà Nội - TP HCM</h5>

                    <!-- Dùng d-flex để căn chỉnh giá và icon -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Giá tiền cũ và mới -->
                        <p class="card-text text-body-secondary"><del>2.999.999 đ</del></p>
                        <p class="card-text text-danger">1.999.999 đ</p>
                    </div>

                    <!-- Nút và icon nằm trên cùng một dòng -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Nút bên trái -->
                        <a href="#" class="btn btn-primary">Đặt Tour Ngay</a>
                        <!-- Icon và rating nằm bên phải -->
                        <a href="#" class="btn btn-link d-flex align-items-center">
                            <span>4.5</span>
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <!-- Thêm icon ở đây (Font Awesome) -->
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <img src="./mvc/view/img/hcm.webp" class="card-img-top" alt="...">
                <a class="mini">Vietnam AirLines</a>
                <div class="card-body">
                    <!-- Đưa tiêu đề về bên trái -->
                    <h5 class="card-title text-start">Hà Nội - TP HCM</h5>

                    <!-- Dùng d-flex để căn chỉnh giá và icon -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Giá tiền cũ và mới -->
                        <p class="card-text text-body-secondary"><del>2.999.999 đ</del></p>
                        <p class="card-text text-danger">1.999.999 đ</p>
                    </div>

                    <!-- Nút và icon nằm trên cùng một dòng -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Nút bên trái -->
                        <a href="#" class="btn btn-primary">Đặt Tour Ngay</a>
                        <!-- Icon và rating nằm bên phải -->
                        <a href="#" class="btn btn-link d-flex align-items-center">
                            <span>4.5</span>
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <!-- Thêm icon ở đây (Font Awesome) -->
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <img src="./mvc/view/img/hcm.webp" class="card-img-top" alt="...">
                <a class="mini">Vietnam AirLines</a>
                <div class="card-body">
                    <!-- Đưa tiêu đề về bên trái -->
                    <h5 class="card-title text-start">Hà Nội - TP HCM</h5>

                    <!-- Dùng d-flex để căn chỉnh giá và icon -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Giá tiền cũ và mới -->
                        <p class="card-text text-body-secondary"><del>2.999.999 đ</del></p>
                        <p class="card-text text-danger">1.999.999 đ</p>
                    </div>

                    <!-- Nút và icon nằm trên cùng một dòng -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Nút bên trái -->
                        <a href="#" class="btn btn-primary">Đặt Tour Ngay</a>
                        <!-- Icon và rating nằm bên phải -->
                        <a href="#" class="btn btn-link d-flex align-items-center">
                            <span>4.5</span>
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <!-- Thêm icon ở đây (Font Awesome) -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product  -->

<!-- Voucher  -->
<div class="product">
    <h2 class="container text-right mt-5">Chương Trình Khuyến Mãi</h2>
</div>
<div class="container text-center">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        <div class="col">
            <img src="./mvc/view/img/ad2.webp" class="img-fluid" alt="...">
        </div>
        <div class="col">
            <img src="./mvc/view/img/ad2.webp" class="img-fluid" alt="...">
        </div>
        <div class="col">
            <img src="./mvc/view/img/ad2.webp" class="img-fluid" alt="...">
        </div>
    </div>
</div>
<!-- End Voucher  -->

<!-- Product  -->
<div class="title">
    <h2 class="container text-right mt-5">TOP CÁC ĐIỂM ĐẾN ĐƯỢC YÊU THÍCH</h2>
</div>
<div class="button">
    <div class="container text-center my-4">
        <div class="d-flex gap-3  flex-wrap">
            <button type="button" class="btn btn-outline-success btn-sm rounded-pill">Việt Nam</button>
            <button type="button" class="btn btn-outline-primary btn-sm rounded-pill">Thái Lan</button>
            <button type="button" class="btn btn-outline-danger btn-sm rounded-pill">Hàn Quốc</button>
            <button type="button" class="btn btn-outline-warning btn-sm rounded-pill">Nhật Bản</button>
            <button type="button" class="btn btn-outline-info btn-sm rounded-pill">Malaysia</button>
        </div>
    </div>
</div>
<div class="container text-center">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
        <div class="col">
            <div class="card">
                <img src="./mvc/view/img/hcm.webp" class="card-img-top" alt="...">
                <a class="mini">Vietnam AirLines</a>
                <div class="card-body">
                    <!-- Đưa tiêu đề về bên trái -->
                    <h5 class="card-title text-start">Hà Nội - TP HCM</h5>

                    <!-- Dùng d-flex để căn chỉnh giá và icon -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Giá tiền cũ và mới -->
                        <p class="card-text text-body-secondary"><del>2.999.999 đ</del></p>
                        <p class="card-text text-danger">1.999.999 đ</p>
                    </div>

                    <!-- Nút và icon nằm trên cùng một dòng -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Nút bên trái -->
                        <a href="#" class="btn btn-primary">Đặt Tour Ngay</a>
                        <!-- Icon và rating nằm bên phải -->
                        <a href="#" class="btn btn-link d-flex align-items-center">
                            <span>4.5</span>
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <!-- Thêm icon ở đây (Font Awesome) -->
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <img src="./mvc/view/img/hcm.webp" class="card-img-top" alt="...">
                <a class="mini">Vietnam AirLines</a>
                <div class="card-body">
                    <!-- Đưa tiêu đề về bên trái -->
                    <h5 class="card-title text-start">Hà Nội - TP HCM</h5>

                    <!-- Dùng d-flex để căn chỉnh giá và icon -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Giá tiền cũ và mới -->
                        <p class="card-text text-body-secondary"><del>2.999.999 đ</del></p>
                        <p class="card-text text-danger">1.999.999 đ</p>
                    </div>

                    <!-- Nút và icon nằm trên cùng một dòng -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Nút bên trái -->
                        <a href="#" class="btn btn-primary">Đặt Tour Ngay</a>
                        <!-- Icon và rating nằm bên phải -->
                        <a href="#" class="btn btn-link d-flex align-items-center">
                            <span>4.5</span>
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <!-- Thêm icon ở đây (Font Awesome) -->
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <img src="./mvc/view/img/hcm.webp" class="card-img-top" alt="...">
                <a class="mini">Vietnam AirLines</a>
                <div class="card-body">
                    <!-- Đưa tiêu đề về bên trái -->
                    <h5 class="card-title text-start">Hà Nội - TP HCM</h5>

                    <!-- Dùng d-flex để căn chỉnh giá và icon -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Giá tiền cũ và mới -->
                        <p class="card-text text-body-secondary"><del>2.999.999 đ</del></p>
                        <p class="card-text text-danger">1.999.999 đ</p>
                    </div>

                    <!-- Nút và icon nằm trên cùng một dòng -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Nút bên trái -->
                        <a href="#" class="btn btn-primary">Đặt Tour Ngay</a>
                        <!-- Icon và rating nằm bên phải -->
                        <a href="#" class="btn btn-link d-flex align-items-center">
                            <span>4.5</span>
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <!-- Thêm icon ở đây (Font Awesome) -->
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <img src="./mvc/view/img/hcm.webp" class="card-img-top" alt="...">
                <a class="mini">Vietnam AirLines</a>
                <div class="card-body">
                    <!-- Đưa tiêu đề về bên trái -->
                    <h5 class="card-title text-start">Hà Nội - TP HCM</h5>

                    <!-- Dùng d-flex để căn chỉnh giá và icon -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Giá tiền cũ và mới -->
                        <p class="card-text text-body-secondary"><del>2.999.999 đ</del></p>
                        <p class="card-text text-danger">1.999.999 đ</p>
                    </div>

                    <!-- Nút và icon nằm trên cùng một dòng -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Nút bên trái -->
                        <a href="#" class="btn btn-primary">Đặt Tour Ngay</a>
                        <!-- Icon và rating nằm bên phải -->
                        <a href="#" class="btn btn-link d-flex align-items-center">
                            <span>4.5</span>
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <!-- Thêm icon ở đây (Font Awesome) -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product  -->

<!-- Product  -->
<div class="title">
    <h2 class="container text-right mt-5">TOP CÁC ĐIỂM ĐẾN ĐƯỢC YÊU THÍCH</h2>
</div>
<div class="button">
    <div class="container text-center my-4">
        <div class="d-flex gap-3  flex-wrap">
            <button type="button" class="btn btn-outline-success btn-sm rounded-pill">Việt Nam</button>
            <button type="button" class="btn btn-outline-primary btn-sm rounded-pill">Thái Lan</button>
            <button type="button" class="btn btn-outline-danger btn-sm rounded-pill">Hàn Quốc</button>
            <button type="button" class="btn btn-outline-warning btn-sm rounded-pill">Nhật Bản</button>
            <button type="button" class="btn btn-outline-info btn-sm rounded-pill">Malaysia</button>
        </div>
    </div>
</div>
<div class="container text-center">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
        <div class="col">
            <div class="card">
                <img src="./mvc/view/img/hcm.webp" class="card-img-top" alt="...">
                <a class="mini">Vietnam AirLines</a>
                <div class="card-body">
                    <!-- Đưa tiêu đề về bên trái -->
                    <h5 class="card-title text-start">Hà Nội - TP HCM</h5>

                    <!-- Dùng d-flex để căn chỉnh giá và icon -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Giá tiền cũ và mới -->
                        <p class="card-text text-body-secondary"><del>2.999.999 đ</del></p>
                        <p class="card-text text-danger">1.999.999 đ</p>
                    </div>

                    <!-- Nút và icon nằm trên cùng một dòng -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Nút bên trái -->
                        <a href="#" class="btn btn-primary">Đặt Tour Ngay</a>
                        <!-- Icon và rating nằm bên phải -->
                        <a href="#" class="btn btn-link d-flex align-items-center">
                            <span>4.5</span>
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <!-- Thêm icon ở đây (Font Awesome) -->
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <img src="./mvc/view/img/hcm.webp" class="card-img-top" alt="...">
                <a class="mini">Vietnam AirLines</a>
                <div class="card-body">
                    <!-- Đưa tiêu đề về bên trái -->
                    <h5 class="card-title text-start">Hà Nội - TP HCM</h5>

                    <!-- Dùng d-flex để căn chỉnh giá và icon -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Giá tiền cũ và mới -->
                        <p class="card-text text-body-secondary"><del>2.999.999 đ</del></p>
                        <p class="card-text text-danger">1.999.999 đ</p>
                    </div>

                    <!-- Nút và icon nằm trên cùng một dòng -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Nút bên trái -->
                        <a href="#" class="btn btn-primary">Đặt Tour Ngay</a>
                        <!-- Icon và rating nằm bên phải -->
                        <a href="#" class="btn btn-link d-flex align-items-center">
                            <span>4.5</span>
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <!-- Thêm icon ở đây (Font Awesome) -->
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <img src="./mvc/view/img/hcm.webp" class="card-img-top" alt="...">
                <a class="mini">Vietnam AirLines</a>
                <div class="card-body">
                    <!-- Đưa tiêu đề về bên trái -->
                    <h5 class="card-title text-start">Hà Nội - TP HCM</h5>

                    <!-- Dùng d-flex để căn chỉnh giá và icon -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Giá tiền cũ và mới -->
                        <p class="card-text text-body-secondary"><del>2.999.999 đ</del></p>
                        <p class="card-text text-danger">1.999.999 đ</p>
                    </div>

                    <!-- Nút và icon nằm trên cùng một dòng -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Nút bên trái -->
                        <a href="#" class="btn btn-primary">Đặt Tour Ngay</a>
                        <!-- Icon và rating nằm bên phải -->
                        <a href="#" class="btn btn-link d-flex align-items-center">
                            <span>4.5</span>
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <!-- Thêm icon ở đây (Font Awesome) -->
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <img src="./mvc/view/img/hcm.webp" class="card-img-top" alt="...">
                <a class="mini">Vietnam AirLines</a>
                <div class="card-body">
                    <!-- Đưa tiêu đề về bên trái -->
                    <h5 class="card-title text-start">Hà Nội - TP HCM</h5>

                    <!-- Dùng d-flex để căn chỉnh giá và icon -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Giá tiền cũ và mới -->
                        <p class="card-text text-body-secondary"><del>2.999.999 đ</del></p>
                        <p class="card-text text-danger">1.999.999 đ</p>
                    </div>

                    <!-- Nút và icon nằm trên cùng một dòng -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Nút bên trái -->
                        <a href="#" class="btn btn-primary">Đặt Tour Ngay</a>
                        <!-- Icon và rating nằm bên phải -->
                        <a href="#" class="btn btn-link d-flex align-items-center">
                            <span>4.5</span>
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <!-- Thêm icon ở đây (Font Awesome) -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product  -->

<!-- Voucher  -->
<div class="product">
    <h2 class="container text-right mt-5">Những địa điểm du lịch nổi tiếng ngoài Việt Nam</h2>
</div>
<div class="container text-center">
    <div class="row">
        <div class="col">
            <img src="./mvc/view/img/nagoya.jpg" class="img-fluid" alt="...">
            <h6>Nagoya</h6>
        </div>
        <div class="col">
            <img src="./mvc/view/img/tokyo.jpg" class="img-fluid" alt="...">
            <h6>Tokyo</h6>
        </div>
        <div class="col">
            <img src="./mvc/view/img/bangkok.jpg" class="img-fluid" alt="...">
            <h6>Bangkok</h6>
        </div>
    </div>
</div>
<!-- End Voucher  -->

<style>
    * {
        font-size: 18px;
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        margin: auto;
    }

    .content {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form-container {
        width: 100%;
        max-width: 1290px;
        min-height: 250px;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-top: 30px;
        /* Tạo khoảng cách giữa form và slideshow */
    }



    .form-row {
        display: flex;
        flex-direction: column;
    }

    .row {
        display: flex;
    }

    button {
        margin-top: 15px;
    }

    .w-100 {
        width: 100%;
    }

    /* Điều chỉnh chiều rộng của carousel */
    .carousel {
        max-width: 1290px;
        /* Bạn có thể thay đổi giá trị này tùy theo kích thước bạn muốn */
        margin: 0 auto;
        /* Căn giữa carousel */
        margin-top: 100px;
    }

    /* Điều chỉnh hình ảnh trong carousel */
    .carousel-inner img {
        object-fit: cover;
        /* Đảm bảo hình ảnh không bị méo */
        max-height: 500px;
        /* Giảm chiều cao hình ảnh */
        width: 100%;
        /* Đảm bảo hình ảnh bao phủ đủ chiều rộng */
    }

    .mini {
        font-size: 0.6rem;
        /* Làm cho thẻ a nhỏ lại */
        color: rgba(0, 0, 0, 0.6);
        /* Làm cho thẻ a mờ đi */
        text-decoration: none;
        /* Xóa gạch chân */
    }

    .card-body .d-flex {
        display: flex;
        justify-content: space-between;
        /* Đảm bảo khoảng cách giữa giá cũ và giá mới */
        align-items: center;
        /* Căn chỉnh theo chiều dọc */
    }

    .card-body .card-text {
        margin: 0;
        /* Đảm bảo không có khoảng cách thừa */
    }

    .card-body .card-text del {
        margin-right: 10px;
        /* Khoảng cách giữa giá cũ và giá mới */
    }
</style>