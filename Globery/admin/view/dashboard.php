<?php
$booking = $admin_db->sortedByTime();
?>
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
                    <span>Tổng số: <?php echo ($admin_db->count('hotel')[0]['cnt']); ?></span>
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
                    <span>Tổng số: <?php echo ($admin_db->count('room')[0]['cnt']); ?></span>
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
                    <span>Đăng ký: <?php echo ($admin_db->count('customer')[0]['cnt']); ?></span>
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
                    <span>Lượt đặt: <?php echo ($admin_db->count('booking')[0]['cnt']); ?></span>
                    <span class="badge bg-light text-dark">+3%</span>
                </div>
                <div class="card-body pt-0">
                    <a href="./?page=orders" class="px-0 text-light">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Table with Search Bar -->
    <h2 class="mb-3">Danh sách phòng đang hoạt động</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Người đặt</th>
                    <th>Mã phòng</th>
                    <th>Yêu cầu</th>
                    <th>Ngày nhận phòng</th>
                    <th>Ngày trả phòng</th>
                    <th>Tổng giá</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody id="booking">
                <?php $i = 0; foreach ($booking as $row): ?>
                    <tr>
                        <td><?php echo ++$i ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['id_room'] ?></td>
                        <td><?php echo $row['request'] ?></td>
                        <td><?php echo $admin_db->formatDate($row['start_date']); ?></td>
                        <td><?php echo $admin_db->formatDate($row['end_date']); ?></td>
                        <td><?php echo $row['total_price'] ?></td>
                        <td><?php echo $admin_db->formatDate($row['create_at']); ?></td>
                        <td>
                            <?php if ($admin_db->checkDate($row['start_date'], $row['end_date']) == 'coming soon') { ?>
                                <span class="badge bg-danger">Sắp tới</span>
                            <?php } elseif ($admin_db->checkDate($row['start_date'], $row['end_date']) == 'active') { ?>
                                <span class="badge bg-primary">Đang hoạt động</span>
                            <?php } else { ?>
                                <span class="badge bg-success">Đã trả phòng</span>
                            <?php } ?>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-warning" disabled>Sửa</button>
                            <button class="btn btn-sm btn-danger" disabled>Xóa</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace()
</script>