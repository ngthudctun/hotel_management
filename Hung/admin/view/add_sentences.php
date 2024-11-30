<?php

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location: admin_login.php');
}
?>

<div class="container" style="max-width: 70rem; min-height: calc(100vh - 9rem);">
    <h2 class="text-center m-3 text-light display-3 bold">THÊM SENTENCE</h2>
    <div class="blur"></div>
    <div class="blur"></div>
    <form action="" method="post" <?php if (isset($_POST['btn']) && $_POST['number_sentence'] > 0) echo 'hidden' ?>>
        <div class="mb-3 d-flex justify-content-center flex-column align-items-center">
            <label for="text-light bold" class="form-label">Nhập số câu muốn thêm</label>
            <input type="number" name="number_sentence" class="form-input rounded-3 py-2 px-3 border border-light"
                id="inputNumber" style="max-width: 4rem;" required>
        </div>
        <div class="d-flex justify-content-center">
            <input type="submit" name="btn" class="btn btn-outline-light bold mb-3 px-5 py-2" value="Xác nhận"></input>
        </div>
    </form>
    <?php if (isset($_POST['btn']) && $_POST['btn']) {
        if ($_POST['number_sentence'] < 1) { ?>
            <h2 class="text-center mt-5 text-light">
                <div><span class="text-danger border border-danger px-3 rounded-2 p-3 bold">VUI LÒNG NHẬP SỐ LỚN HƠN
                        KHÔNG!</span></div>
            </h2>
        <?php } else { ?>
            <form action="" class="d-flex align-items-center flex-column" method="post">
                <table class="table table-striped table-bordered border-secondary" >
                    <thead>
                        <tr class="table-light bg-light">
                            <th scope="col"></th>
                            <th scope="col">CHỦ ĐỀ</th>
                            <th scope="col">NGHĨA</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        $number = $_POST['number_sentence'];
                        $cnt = 1;
                        while ($number > 0) {
                        ?>
                            <tr>
                                <th scope="row" class="text-center"><?php echo $cnt; ?></th>
                                <td>
                                    <input type="text" class="form-input" name="sentence<?php echo $cnt; ?>"
                                        placeholder="sentence<?php echo $cnt; ?>" required></td>
                                        <td><input type="text" class="form-input" name="meaning<?php echo $cnt++; ?>"
                                        placeholder="meaning<?php echo $cnt; ?>" required></td>
                                </tr>
                        <?php $number--;
                        } ?>
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <input type="number" name="n" value="<?php echo $_POST['number_sentence']; ?>" hidden>
                    <input type="submit" name="ins_sentences" class="btn btn-outline-light bold mb-3 px-5 py-2"
                        value="XÁC NHẬN THÊM"></input>
                </div>
            </form>
    <?php }
    } ?>

    <!-- xử lí insert -->
    <?php
    if (isset($_POST['ins_sentences']) && $_POST['ins_sentences']) {
        if (isset($_POST['ins_sentences']) && $_POST['ins_sentences']) {
            for ($i = 1; $i <= $_POST['n']; $i++) {
                $data = [
                    'sentence' => $_POST['sentence'.$i],
                    'meaning' => $_POST['meaning'.$i]
                ];
                $vocabularies->insSentence($data);
            }
            $result = 'success';
            include 'block/result.php';
            $result = 'false';
    ?>
    <?php } else {
            $result = 'false';
            include 'block/result.php';
        }
    } ?>

    <!-- xử lí insert -->
</div>
<div class="blur-right"></div>
<div class="blur-right"></div>