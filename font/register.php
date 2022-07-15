<!-- 註冊畫面 -->
<div class="reg_main">
    <div class="reg_header">
        <h1>註冊會員</h1>
    </div>
    <div class="reg_container">
        <form action="./api/register.php" method="post">
            <input class="input1" type="text" name="acc" placeholder="請輸入帳號">
            <input class="input1" type="text" name="pw" placeholder="請輸入密碼">
            <input class="input1" type="text" name="name" placeholder="請輸入姓名">
            <input class="input1" type="date" name="birthday">
            <input class="input1" type="email" name="email" placeholder="請輸入信箱">

            <div>
                <input class="btn btn-info" type="submit" value="送出">
                <input class="btn btn-warning" type="reset" value="清除">
            </div>
        </form>
    </div>

</div>