<!-- 負責執行 font & back資料夾下 member.php的程式 -->
<?php
/*---------------------------------------------------------------------------------*/
include_once "base.php";
/*---------------------------------------------------------------------------------*/
// dd($_POST);
// exit();
/*---------------------------------------------------------------------------------*/
$member_id=$_POST['id'];
$new_pw=$_POST['pw'];
$new_name=$_POST['name'];
$new_birthday=$_POST['birthday'];
$new_email=$_POST['email'];

$member=find('users',$member_id);
$member['pw']=$new_pw;
$member['name']=$new_name;
$member['birthday']=$new_birthday;
$member['email']=$new_email;

// dd($member);
// exit();

save('users',$member);
/*---------------------------------------------------------------------------------*/
to("../index.php");

?>