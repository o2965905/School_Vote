 <!-- 後台投票列表 -->
 <!-- -------------------------------------------------------------------------------- -->
 <?php
    $p = "";
    if (isset($_GET['p'])) {
        $p = "&p=" . $_GET['p'];
        // $p="&p={$_GET['p']}";  //等同於上面寫法
    }
    ?>
 <!-- -------------------------------------------------------------------------------- -->
 <!-- 分類 + 新增主題按鈕 + 新增分類按鈕 -->
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
     <button class="btn btn-primary" onclick="location.href='?do=add_vote'">新增投票</button>
     <button class="btn btn-warning" onclick="location.href='?do=admin_type'">新增分類</button>
 </div>
 <!-- -------------------------------------------------------------------------------- -->
 <!-- 投票內容 -->
 <div>
     <ul>
         <li class="title">
             <div class="No1">投票主題</div>
             <div class="No2">剩餘天數</div>
             <div class="No3">投票人數</div>
             <div class="No4">功能</div>
         </li>
         <?php
            /*------------------------------------------------------------------------------------------*/
            //過濾投票分類功能

            $filter = [];
            if (isset($_GET['filter'])) {
                if(!$_GET['filter']==0){
                    $filter=['type_id'=>$_GET['filter']];
                }
            }

            /*------------------------------------------------------------------------------------------*/
            //分頁功能

            /*建立分頁所需的變數群 */
            $total = math('subjects', 'count', 'id', $filter);
            // echo $total;
            $div = 5;
            $pages = ceil($total / $div);
            // echo $pages;
            $now = isset($_GET['p']) ? $_GET['p'] : 1;
            $start = ($now - 1) * $div;
            $page_rows = " limit $start,$div ";
            /*------------------------------------------------------------------------------------------*/
            // 秀出投票主題功能

            $subjects = all('subjects', $filter, $page_rows);
            foreach ($subjects as $subject) {
                echo "<li class='back_items'>";
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
                echo "<div class='No4'>";
                echo "<a class='edit' href='?do=edit&id={$subject['id']}'>編輯</a>";
                echo "<a class='del' href='?do=del&id={$subject['id']}'>刪除</a>";
                echo "</div>";
                echo "</li>";
            }
            /*------------------------------------------------------------------------------------------*/
            ?>
     </ul>
 </div>
 <!-- -------------------------------------------------------------------------------- -->
 <!-- 分頁 -->
 <div class="footer_page">
     <?php
        if ($pages > 1) {

            for ($i = 1; $i <= $pages; $i++) {
                echo "<a href='?p=$i'>&nbsp;";
                echo $i;
                echo "&nbsp;</a>";
            }
        }
    ?>
 </div>
 <!-- -------------------------------------------------------------------------------- -->