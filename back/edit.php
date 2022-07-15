<!-------------------------------------------------------------------------------------->
<!-- 編輯頁面-測試撈出資料 -->
<?php
$id = $_GET['id']; //取得對應的投票主題'id'
$subj = find('subjects', $id); //撈出資料表中對應投票主題'id'的資料
$start = find('subjects', $id);
$end = find('subjects', $id);
$opts = all('options', ['subject_id' => $id]); //撈出資料表中對應投票選項的資料
// dd($subj); //把投票主題顯示出來
// dd($opts);//把投票選項顯示出來
// exit();
?>
<!-------------------------------------------------------------------------------------->
<!-- 編輯頁面-form表單呈現內容 -->
<!-- <form class="add_form" action="../api/edit_vote.php" method="post"> -->
<form class="add_form" action="./api/edit_vote.php" method="post">
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
    <!-- 投票主題 + 新增選項按鈕 -->
    <div>
        <label for="subject">投票主題:</label>
        <input class="input2" type="text" name="subject" id="subject" maxlength="16" value="<?= $subj['subject']; ?>">
        <input type="button" value="新增選項" onclick="more()" class="btn btn-primary">
        <!-- 增加隱藏欄位,在畫面中不會顯示該欄位與內容 -->
        <input type="hidden" name="subject_id" value="<?= $subj['id']; ?>">
    </div>
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
    <!-- 投票分類 -->
    <div id="date_type">
        <label>投票分類 : </label>
        <select name="types" id="types">
            <?php
            $types = all("types");
            foreach ($types as $type) {
                $selected = ($subj['type_id'] == $type['id']) ? 'selected' : ''; //定位原先主題的分類

                echo "<option value='{$type['id']}' $selected>";
                echo $type['name'];
                echo "</option>";
            }
            ?>
        </select>
    </div>
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
    <!-- 投票開始&結束時間 -->
    <div>
        <label>活動開始時間 : </label>
        <input class="input2" type="date" name="start" value="<?= $start['start']; ?>">
        <br>
        <label>活動結束時間 : </label>
        <input class="input2" type="date" name="end" value="<?= $end['end']; ?>">
    </div>
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
    <!-- 投票選項 -->
    <div id="options">
        <?php
        foreach ($opts as $opt) { //投票選項的內容,使用foreach迴圈繞出資料
        ?>
            <div>
                <label>投票選項:</label>
                <input class="input2" type="text" name="option[<?= $opt['id']; ?>]" value="<?= $opt['option'] ?> " maxlength="10" placeholder="(10個字元內)">
            </div>
        <?php
        }
        ?>
    </div>
    <input type="submit" value="修改" class="btn btn-warning">
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
</form>
<!-------------------------------------------------------------------------------------->
<!-- 新增選項的 onclick事件 -->
<!-- 每點一次按鈕,就可以新增一行'投票選項'的欄位 -->
<script>
    function more() {
        let opt = `<div><label>投票選項: </label><input class="input2" type="text" name="option[]" maxlength="10" placeholder="(10個字元內)"></div>`;
        let opts = document.getElementById('options').innerHTML;
        opts = opts + opt; //每次都增加一行的條件 => $sum=$sum+$i 的概念
        document.getElementById('options').innerHTML = opts;
    }
</script>
<!-------------------------------------------------------------------------------------->