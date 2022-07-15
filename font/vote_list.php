<!-- 前台投票列表 -->
<?php
/*-------------------------------------------------------------------------------------*/ 
$p = "";
if (isset($_GET['p'])) {
    $p = "&p=" . $_GET['p'];
    // $p="&p={$_GET['p']}";  //等同於上面寫法
}
/*-------------------------------------------------------------------------------------*/ 
$queryStr = "";
if (isset($_GET['order'])) {
    $queryStr = "&order={$_GET['order']}&type={$_GET['type']}";
}
/*-------------------------------------------------------------------------------------*/ 
?>
<!-- -------------------------------------------------------------------------------- -->
<!-- 分類 -->
<div id="date_type">
    <select name="types" id="types" onchange="location.href=`?filter=${this.value}`">
       <option value="0">全部</option>
       <?php
        $types = all("types");
        foreach ($types as $type) {

            $selected=(isset($_GET['filter']) && $_GET['filter']==$type['id'])?'selected':'';
            echo "<option value='{$type['id']}' $selected>";
            echo $type['name'];
            echo "</option>";
        }
        ?>
    </select>
</div>
<!-- -------------------------------------------------------------------------------- -->
<!-- 投票內容 -->
<div>
    <ul>
        <li class="title">
            <!-- -------------------------------------------------- -->
            <div class="No1">投票主題</div>
            <!-- -------------------------------------------------- -->
            <?php
            if (isset($_GET['type']) && $_GET['type'] == 'asc') {
            ?>
                <div class="No2"><a href='?order=remain&type=desc<?= $p; ?>'>剩餘天數</a></div>
            <?php
            } else {
            ?>
                <div class="No2"><a href='?order=remain&type=asc<?= $p; ?>'>剩餘天數</a></div>
            <?php
            }
            ?>
            <!-- -------------------------------------------------- -->
            <?php
            if (isset($_GET['type']) && $_GET['type'] == 'asc') {
            ?>
                <div class="No3"><a href='?order=total&type=desc<?= $p; ?>'>投票人數</a></div>
            <?php
            } else {
            ?>
                <div class="No3"><a href='?order=total&type=asc<?= $p; ?>'>投票人數</a></div>
            <?php
            }
            ?>
            <!-- -------------------------------------------------- -->
        </li>
        <?php
        /*------------------------------------------------------------------------------------------*/
        // 排序功能

        $orderStr = '';
        if (isset($_GET['order'])) { //偵測是否需要排序

            $_SESSION['order']['col'] = $_GET['order']; //排序的欄位
            $_SESSION['order']['type'] = $_GET['type']; //排序的方式(DESC或ASC)

            if ($_GET['order'] == 'remain') {
                $orderStr = " ORDER BY DATEDIFF(`end`,now()) {$_SESSION['order']['type']}";
            } else {
                $orderStr = " ORDER BY `{$_SESSION['order']['col']}` {$_SESSION['order']['type']}";
            }
        }
        /*------------------------------------------------------------------------------------------*/
        //過濾投票分類功能

        $filter=[];
        if(isset($_GET['filter'])){
            if(!$_GET['filter']==0){
                $filter=['type_id'=>$_GET['filter']];
            }
        }

        /*------------------------------------------------------------------------------------------*/
        // 分頁功能

        /*建立分頁所需的變數群 */
        $total = math('subjects','count','id',$filter); //math('資料表名稱','計算方法','欄位名稱','過濾條件')
        // echo $total;
        $div = 8; //這邊設定每8筆資料做一個分頁
        $pages = ceil($total / $div); //總頁數
        // echo $pages;
        $now = isset($_GET['p']) ? $_GET['p'] : 1; //當前頁=>用GET去取值,如果沒有值就呈現是1(第1頁)
        $start = ($now - 1) * $div; //起始頁
        $page_rows = " limit $start,$div "; //sql語法(limit-限制筆數語法) (補充:limit語法要放在sql語法的最後面)

        /*------------------------------------------------------------------------------------------*/
        // 秀出投票主題功能

        $subjects = all('subjects',$filter,$orderStr . $page_rows); 
        foreach ($subjects as $subject) {
            echo "<a href='?do=vote_result&id={$subject['id']}'>";
            // echo "<a href='?do=vote&id={$subject['id']}'>";
            echo "<li class='font_items'>";
            echo "<div class='No1'>{$subject['subject']}</div>";
            echo "<div class='No2'>";
            $start = strtotime($subject['start']);
            $today = strtotime("now");
            $end = strtotime($subject['end']);
            if (($start - $today) >= 0) {
                echo "<span style='color:grey;'>活動尚未開始</span>";
            } else {
                if (($end - $today) > 0) {
                    $remain = floor(($end - $today) / (60 * 60 * 24));
                    echo "剩" . $remain . "天";
                } else {
                    echo "<span style='color:grey;'>已結束</span>";
                }
            }
            echo "</div>";
            echo "<div class='No3'>";
            echo  $subject['total'] . "人";
            echo "</div>";
            echo "</li>";
            echo "</a>";
        }
        /*------------------------------------------------------------------------------------------*/
        ?>
    </ul>
</div>
<!-- ------------------------------------------------------------------------------------------------ -->
<!-- 分頁 -->
<div class="footer_page">
    <?php
    if($pages>1){

        for ($i = 1; $i <= $pages; $i++) {
            echo "<a href='?p={$i}{$queryStr}'>&nbsp;";
            echo $i;
            echo "&nbsp;</a>";
        }

    }
    ?>
</div>
<!-- ------------------------------------------------------------------------------------------------ -->