<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $customer = $admin_db->search('customer', $_POST['name']);
}
?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Danh sách Người Dùng</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <!-- <button type="button" class="btn btn-primary">Thêm người dùng</button> -->
        </div>
    </div>
    <form action="./?page=users" method="post" class="mb-3">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="name" placeholder="Nhập tên người dùng">
            <button class="btn btn-outline-secondary" type="submit" name="search">Tìm kiếm</button>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Tên người dùng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customer as $row): ?>
                    <tr>
                        <td><?php echo $row['id_customer'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['tel'] ?></td>
                        <td><span class="badge bg-success">Hoạt động</span></td>
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