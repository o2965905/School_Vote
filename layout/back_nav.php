<!-- 後台的連結區塊 -->
<nav>
    <?php
    if (isset($_SESSION['admin'])) {
        echo "<a href='?do=vote_list'>投票列表</a>";
        // echo "<a href='?do=admin_type'>分類管理</a>";
        // echo "<a href='?do=add_vote'>新增投票</a>";
        echo "<a href='?do=member'>會員中心</a>";
        echo "<a href='?do=logout'>我要登出</a>";
        echo "<a href='index.php'>回前台</a>";
    }
    ?>
</nav>