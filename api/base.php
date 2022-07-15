<!-- 共用的程式碼 -->
<?php
/*----------------------------------------------------------------------------------*/
// 啟用SESSION
session_start();
/*----------------------------------------------------------------------------------*/
// 時區設定
date_default_timezone_set('Asia/Taipei');
/*----------------------------------------------------------------------------------*/
// PDO連線 - 本地端
function pdo()
{
    $dsn = "mysql:host=localhost;charset=utf8;dbname=vote";
    return new PDO($dsn, 'root', '');
}
/*----------------------------------------------------------------------------------*/
// PDO連線 - 220
//  function pdo()
//  {
//      $dsn = "mysql:host=localhost;charset=utf8;dbname=s1110219";
//     return new PDO($dsn, 's1110219', 's1110219');
//  }
/*----------------------------------------------------------------------------------*/
/**
 * C = save()
 * R = find(),all(),q(),math()
 * U = save()
 * D = del()
 **/
/*----------------------------------------------------------------------------------*/
// save() => 新增資料 & 更新資料
function save($table, $arg)
{
    $pdo = pdo();
    $sql = '';

    /* 因為新增資料不會有'id'這個欄位 ,所以利用id這個欄位去判別是'新增資料'或'更新資料'*/
    if (isset($arg['id'])) {
        //更新資料
        foreach ($arg as $key => $value) {
            if ($key != 'id') {
                $tmp[] = "`$key`='$value'";
            }
        }
        //建立更新的sql語法
        $sql .= " UPDATE $table SET " . implode(" , ", $tmp) . " WHERE `id`='{$arg['id']}'";
    } else {
        //新增資料
        $cols = implode("`,`", array_keys($arg));
        $values = implode("','", $arg);

        //建立新增的sql語法
        $sql = "INSERT INTO $table (`$cols`) VALUES('$values')";
    }
    return $pdo->exec($sql);
}
/*----------------------------------------------------------------------------------*/
// del() => 刪除指定的資料 
function del($table, $arg)
{
    $pdo = pdo();
    $sql = "DELETE FROM $table WHERE ";
    if (is_array($arg)) {
        foreach ($arg as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        $sql .= implode(" AND ", $tmp);
    } else {
        $sql .= " `id`='$arg'";
    }
    return $pdo->exec($sql);
}
/*----------------------------------------------------------------------------------*/
// find() => 找出符合條件的'單筆'資料
function find($table, $arg)
{
    $pdo = pdo();
    $sql = "SELECT * FROM $table WHERE ";
    if (is_array($arg)) {
        foreach ($arg as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        $sql .= implode(" AND ", $tmp);
    } else {
        $sql .= " `id`='$arg'";
    }
    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}
/*----------------------------------------------------------------------------------*/
// all() => 找出符合條件的'所有'資料
function all($table, ...$arg)
{
    $pdo = pdo();
    $sql = "SELECT * FROM $table ";
    switch (count($arg)) {
        case 1:
            if(is_array($arg[0]) && !empty($arg[0])) {
                foreach ($arg[0] as $key => $value) {
                    $tmp[] = "`$key`='$value'";
                }
                $sql .= " WHERE " . implode(" AND ", $tmp);
            }elseif(empty($arg[0])) {
                
            }else{
                $sql .= $arg[0];
            }
            break;
        case 2:
            if(!empty($arg[0])){

                foreach ($arg[0] as $key => $value) {
                    $tmp[] = "`$key`='$value'";
                }
                $sql .= " WHERE " . implode(" AND ", $tmp) . $arg[1];
            }else{
                
                $sql.=$arg[1];
            }
            break;
    }
    // echo $sql; //可以偵測每次執行的語法是否正確
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
/*----------------------------------------------------------------------------------*/
//dd() => 印出陣列的內容
function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
/*----------------------------------------------------------------------------------*/
// q() => 回傳查詢結果的全部資料
function q($sql)
{
    $pdo = pdo();
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
/*----------------------------------------------------------------------------------*/
// to() => 頁面導向 ,用來取代 header('location:XXX.XXX')
function to($url)
{
    header("location:" . $url);
}
/*----------------------------------------------------------------------------------*/
// math() => 統計分析資料
function math($table, $math, $col, ...$arg)
{
    $pdo = pdo();
    $sql = "SELECT $math(`$col`) FROM $table";
    if (!empty($arg[0])) {
        foreach ($arg[0] as $key => $value) {
            $tmp[] = "`$key` = '$value'";
        }
        $sql .= " WHERE " . implode(" AND ", $tmp);
    }
    return $pdo->query($sql)->fetchColumn();
}
/*----------------------------------------------------------------------------------*/
// 計算符合資料條件的筆數
function rows($table,$array){
    
    $pdo = pdo();
    // $sql="SELECT * FROM `$table` WHERE `id`='$id'";
    $sql="SELECT count(*) FROM `$table` WHERE ";
 
        foreach($array as $key=>$value){
            $tmp[]="`$key`='$value'";
        }
        $sql=$sql . implode(" AND ",$tmp);
    // echo $sql;
    return $pdo->query($sql)->fetchColumn();
}

?>