<!-- 投票結果頁面 -->
<?php

$subject = find("subjects", $_GET['id']);
$opts = all('options', ['subject_id' => $_GET['id']]);
$time = find("subjects", $_GET['id']);


?>
<div class="vote_content">
    <h2 class="vote_subject"><?= $subject['subject']; ?></h2>
    <div class="vote_subject"> 總票數 : <?= $subject['total'] ?>
        <?php

        $start = strtotime($time['start']);
        $today = strtotime("now");
        $end = strtotime($time['end']);

        if (($start - $today) >= 0) {
        ?>
            <button class="btn btn-info" onclick="location.href='./index.php'">尚未開始</button>

        <?php
        } elseif (($end - $today) > 0) {
        ?>
            <button class="btn btn-warning" onclick="location.href='?do=vote&id=<?= $subject['id']; ?>'">投票去</button>

        <?php
        } else {
        ?>
            <button class="btn btn-danger" onclick="location.href='./index.php'">已結束</button>

        <?php
        }

        ?>
</div>

    <?php
    foreach ($opts as $opt) {
        $total = ($subject['total'] == 0) ? 1 : $subject['total'];
        $rate = $opt['total'] / $total;

    ?>
        <div class="div_opt">
            <div class="div_p">
                <p class="div_p1"><?= $opt['option']; ?></p>
                <p class="div_p2"><?= round($rate * 100) . "%"; ?></p>
            </div>
            <div class="div_bg" style="width:<?= 100 * $rate; ?>% ;"></div>
        </div>
    <?php
    }
    ?>
</div>