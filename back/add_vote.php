<!-- 新增投票的表單 -->
<!-------------------------------------------------------------------------------------->
<form class="add_form" action="./api/add_vote.php" method="post">
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
    <!-- 投票主題 + 新增選項按鈕 -->
    <div>
        <label for="subject">投票主題:</label>
        <input class="input2" type="text" name="subject" id="subject" maxlength="13" placeholder="(15個字元內)">
        <input type="button" value="新增選項" onclick="more()" class="btn btn-primary">
    </div>
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
    <!-- 投票分類 -->
    <div id="date_type">
        <label>投票分類 : </label>
        <select name="types" id="types">
            <?php
            $types = all("types");
            foreach ($types as $type) {
                echo "<option value='{$type['id']}'>";
                echo $type['name'];
                echo "</option>";
            }
            ?>
        </select>
    </div>
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
    <!-- 投票開始&結束時間 -->
    <div id="date_start">
        <label>活動開始時間 : </label>
        <input class="input2" type="date" name="start">
        <br>
        <label>活動結束時間 : </label>
        <input class="input2" type="date" name="end">
    </div>
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
    <!-- 投票選項 -->
    <div id="options">
        <div>
            <label>投票選項:</label>
            <input class="input2" type="text" name="option[]" maxlength="10" placeholder="(10個字元內)">
        </div>
    </div>
    <input type="submit" value="送出" class="btn btn-warning">
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
</form>
<!-------------------------------------------------------------------------------------->
<!-- 新增選項的 onclick事件 -->
<!-- 每點一次按鈕,就可以新增一行'投票選項'的欄位 -->
<script>
    function more() {
        let opt = `<div><label>投票選項:<label><input class="input2" type="text" name="option[]" maxlength="10" placeholder="(10個字元內)"></div>`;
        let opts = document.getElementById('options').innerHTML;
        opts = opts + opt; //每次都增加一行的條件 => $sum=$sum+$i 的概念
        document.getElementById('options').innerHTML = opts;
    }
</script>
<!-------------------------------------------------------------------------------------->