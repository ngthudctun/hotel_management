<?php
// session_start();

$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location: admin_login.php');
}
?>

<div class="container" style="max-width: 70rem; min-height: calc(100vh - 9rem);">
    <h2 class="text-center m-3 text-light display-3 bold">THÊM TỪ VỰNG</h2>
    <div class="blur"></div>
    <div class="blur"></div>
    <form action="" method="post"
        <?php if (isset($_POST['btn-submit']) && $_POST['number_vocabulary'] > 0) echo 'hidden'; ?>>
        <div class="mb-3 d-flex justify-content-center flex-column align-items-center">
            <label for="text-light bold" class="form-label">Nhập số từ vựng muốn thêm</label>
            <input type="number" name="number_vocabulary" class="form-input rounded-3 py-2 px-3 border border-light"
                id="inputNumber" style="max-width: 4rem;" required>
        </div>
        <div class="d-flex justify-content-center">
            <input type="submit" name="btn-submit" class="btn btn-outline-light bold mb-3 px-5 py-2"
                value="Xác nhận"></input>
        </div>
    </form>
    <?php if (isset($_POST['btn-submit']) && $_POST['btn-submit']) {
        if ($_POST['number_vocabulary'] < 1) { ?>
            <h2 class="text-center mt-5 text-light">
                <div><span class="text-danger border border-danger px-3 rounded-2 p-3 bold">VUI LÒNG NHẬP SỐ LỚN HƠN 0!</span>
                </div>
            </h2>
        <?php } else { ?>
            <form action="" method="post">
                <table class="table table-striped table-bordered border-secondary ">
                    <thead>
                        <tr class="table-light bg-light">
                            <th scope="col"></th>
                            <th scope="col">TỪ VỰNG</th>
                            <th scope="col">LOẠI TỪ</th>
                            <th scope="col">PHIÊN ÂM</th>
                            <th scope="col">NGHĨA</th>
                            <th scope="col">CHỦ ĐỀ</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        $number = $_POST['number_vocabulary'];
                        $cnt = 1;
                        while ($number > 0) {
                        ?>
                            <tr>
                                <th scope="row" class="text-center"><?php echo $cnt; ?></th>
                                <td><input type="text" name="word<?php echo $cnt; ?>" class="form-input" placeholder="Nhập từ vựng" required>
                                </td>
                                <td>
                                    <select class="form-select text-white" name="part_of_speech_id<?php echo $cnt; ?>"
                                        aria-label="Default select" required>
                                        <!--<option value="" class="bg-dark d-none">Chọn</option>-->
                                        <?php foreach ($getPartsOfSpeech as $items) : ?>
                                            <option value="<?php echo $items['part_of_speech_id']; ?>" class="bg-dark cs-hover">
                                                <?php echo $items['part_of_speech_name']; ?></option>
                                        <?php endforeach; ?>
                                </td>
                                <td><input type="text" name="transcription<?php echo $cnt; ?>" class="form-input"
                                        placeholder="Nhập phiên âm" required></td>
                                <td><input type="text" name="meaning<?php echo $cnt; ?>" class="form-input"
                                        placeholder="Nhập nghĩa" required></td>
                                <td>
                                    <select class="form-select text-white" name="topic_id<?php echo $cnt; ?>"
                                        aria-label="Default select" required>
                                        <option value="" class="bg-dark d-none">Chọn</option>
                                        <?php foreach ($getTopics as $topic) { ?>
                                            <option value="<?php echo $topic['topic_id']; ?>" class="bg-dark cs-hover">
                                                <?php echo $topic['topic_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-center text-secondary">Ex</th>
                                <td colspan="5" class="text-secondary">
                                    <input type="text" name="example_sentence<?php echo $cnt++; ?>" class="form-input"
                                        placeholder="Nhập 1 câu ví dụ" required>
                                </td>
                            </tr>
                        <?php $number--;
                        } ?>
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <input type="number" name="n" value="<?php echo $_POST['number_vocabulary']; ?>" hidden>
                    <input type="submit" name="ins_vocabularies" class="btn btn-outline-light bold mb-3 px-5 py-2"
                        value="Thêm Từ">
                </div>
            </form>
    <?php }
    } ?>

    <!-- xử lí insert vocabulary -->
    <?php
    if (isset($_POST['ins_vocabularies']) && $_POST['ins_vocabularies']) {
        if (isset($_POST['ins_vocabularies']) && $_POST['ins_vocabularies']) {
            for ($i = 1; $i <= $_POST['n']; $i++) {
                $data = [
                    'word' => $_POST['word' . $i],
                    'transcription' => $_POST['transcription' . $i],
                    'meaning' => $_POST['meaning' . $i],
                    'example_sentence' => $_POST['example_sentence' . $i],
                    'part_of_speech_id' => $_POST['part_of_speech_id' . $i],
                    'topic_id' => $_POST['topic_id' . $i]
                ];
                $vocabularies->insWords($data);
            }
            $result = 'success';
            include 'block/result.php';
            $result = 'false';
    ?>
    <?php } else {
            include 'block/result.php';
        }
    } ?>



    <!-- xử lí insert vocabulary -->
</div>
<div class="blur-right"></div>
<div class="blur-right"></div>