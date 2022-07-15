<!-- 前台的連結區塊 -->
<nav>
    <?php
    if(isset($_SESSION['admin'])){
        echo "<a href='?do=active'>活動辦法</a>";
        echo "<a href='?do=vote_list'>我要投票</a>";
        echo "<a href='back.php'>回後台</a>";
    }elseif (isset($_SESSION['user'])) {
        echo "<a href='?do=active'>活動辦法</a>";
        echo "<a href='?do=vote_list'>我要投票</a>";
        echo "<a href='?do=member'>會員中心</a>";
        echo "<a href='?do=logout'>我要登出</a>";
        echo "<a href='index.php'>回首頁</a>";
    } else {
    ?>
        <a href="?do=active">活動辦法</a>
        <a href="?do=vote_list">我要投票</a>
        <a href="?do=login">我要登入</a>
        <a href="index.php">回首頁</a>
    <?php
    }
    ?>
</nav>