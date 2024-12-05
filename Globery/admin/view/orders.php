<?php

$booking = $admin_db->sortedByTime();


?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Danh sách phòng đã đặt</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <!-- <button type="button" class="btn btn-primary">Thêm người dùng</button> -->
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Yêu cầu</th>
                    <th>Ngày nhận phòng</th>
                    <th>Ngày trả phòng</th>
                    <th>Tổng giá</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($booking as $row): ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
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
                                <span class="badge bg-success">Đã hoàn thành</span>
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