<!-- 分類管理頁面 -->
<!-------------------------------------------------------------------------------------->
<form class="add_form" action="./api/add_type.php" method="post">

    <?php
    if (isset($_SESSION['error'])) {
        echo "<span style='color:tomato;margin-top:10px;font-weight:600;'>" . $_SESSION['error'] . "</span>";
    }
    ?>

    <!-- 投票主題 + 新增選項按鈕 -->
    <div>
        <label for="name">分類名稱:</label>
        <input class="input2" type="text" name="name" id="name" maxlength="2" placeholder="(2個字元內)">
        <input type="submit" value="送出" class="btn btn-warning">
        <input type="reset" value="清除" class="btn btn-danger">
    </div>

</form>
<!-------------------------------------------------------------------------------------->