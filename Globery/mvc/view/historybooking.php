<?php if (isset($_SESSION['user_id'])) {
    $booking = $getData->getBooking($_SESSION['user_id']);
} else {
    $message = 'Bạn chưa từng đặt phòng nào trước đây';
}
?>
<div class="container">

<?php if(isset($message)): ?>

    <div class="alert alert-primary" role="alert">
    <?php echo $message ?>
</div>
<?php else : ?>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
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
            <tbody>
                <?php $i = 1;
                foreach ($booking as $row): ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $row['id_room'] ?></td>
                        <td><?php echo $row['request'] ?></td>
                        <td><?php echo $getData->formatDate($row['start_date']); ?></td>
                        <td><?php echo $getData->formatDate($row['end_date']); ?></td>
                        <td><?php echo $row['total_price'] ?></td>
                        <td><?php echo $getData->formatDate($row['create_at']); ?></td>
                        <td>
                            <?php if ($getData->checkDate($row['start_date'], $row['end_date']) == 'coming soon') { ?>
                                <span class="badge bg-danger">Sắp tới</span>
                            <?php } elseif ($getData->checkDate($row['start_date'], $row['end_date']) == 'active') { ?>
                                <span class="badge bg-primary">Đang hoạt động</span>
                            <?php } else { ?>
                                <span class="badge bg-success">Đã hoàn thành</span>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if ($getData->checkDate($row['start_date'], $row['end_date']) == 'coming soon') { ?>
                                <button class="btn btn-sm btn-danger">Hủy</button>
                            <?php } elseif ($getData->checkDate($row['start_date'], $row['end_date']) == 'active') { ?>
                                <button class="btn btn-sm btn-warning" disabled>Hủy</button>
                            <?php } else { ?>
                                <button class="btn btn-sm btn-warning">Đánh giá</button>
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
</div>