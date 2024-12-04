<!-- Main content -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <!-- <button type="button" class="btn btn-primary">Thêm mới</button> -->
        </div>
    </div>

    <!-- Dashboard stats -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-primary text-white shadow">
                <div class="card-header">Hotel</div>
                <div class="card-body pb-0">
                    <span>Tổng số: <?php echo ($countHotel[0]['cnt']) ?></span>
                    <span class="badge bg-light text-dark">+5%</span>
                </div>
                <div class="card-body pt-0">
                    <a href="./?page=hotel" class="px-0 text-light">Xem chi tiết</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-success text-white shadow">
                <div class="card-header">Tổng phòng</div>
                <div class="card-body pb-0">
                    <span>Tổng số: <?php echo ($countRoom[0]['cnt']) ?></span>
                    <span class="badge bg-light text-dark">+2%</span>
                </div>
                <div class="card-body pt-0">
                    <a href="./?page=room" class="px-0 text-light">Xem chi tiết</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-warning text-white shadow">
                <div class="card-header">Người dùng</div>
                <div class="card-body pb-0">
                    <span>Đăng ký: <?php echo ($countCustomer[0]['cnt']) ?></span>
                    <span class="badge bg-light text-dark">+8%</span>
                </div>
                <div class="card-body pt-0">
                    <a href="./?page=users" class="px-0 text-light">Xem chi tiết</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger text-white shadow">
                <div class="card-header">Thống kê</div>
                <div class="card-body pb-0">
                    <span>Lượt xem: 7890</span>
                    <span class="badge bg-light text-dark">+3%</span>
                </div>
                <div class="card-body pt-0">
                    <a href="./?page=hotel" class="px-0 text-light">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Table with Search Bar -->
    <h2 class="mb-3">Danh sách sản phẩm</h2>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm...">
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Sản phẩm A</td>
                    <td>Danh mục 1</td>
                    <td>$100</td>
                    <td>50</td>
                    <td><span class="badge bg-success">Đang bán</span></td>
                    <td>
                        <button class="btn btn-sm btn-warning">Sửa</button>
                        <button class="btn btn-sm btn-danger">Xóa</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Sản phẩm B</td>
                    <td>Danh mục 2</td>
                    <td>$150</td>
                    <td>20</td>
                    <td><span class="badge bg-secondary">Hết hàng</span></td>
                    <td>
                        <button class="btn btn-sm btn-warning">Sửa</button>
                        <button class="btn btn-sm btn-danger">Xóa</button>
                    </td>
                </tr>
                <!-- Thêm sản phẩm tùy ý -->
            </tbody>
        </table>
    </div>
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace()
</script>