<!-------------------------------------------------------------------------------------->
<!-- 刪除頁面 -->
<?php
$subj = find("subjects", $_GET['id']);
?>
<!-------------------------------------------------------------------------------------->
<div class="confirm" style="margin:30px;background-color: rgb(234 247 161 / 10%);border:1px solid #fff;box-shadow: 0px 2px 4px rgb(0 0 0 / 33%);">
    <h3 style="margin-top:30px;text-align:center;letter-spacing:2px;color:#2fa6a0;">確定要刪除這份投票主題嗎?</h3>
    <div style="margin:10px;font-size:1rem;font-weight:600;text-align:center;">投票主題 : 『 <?= $subj['subject']; ?>』</div>
    <h5 style="text-align:center;letter-spacing:3px;color:#F26262;font-weight: bold;">警告:刪除後將無法復原</h5>
        <div style="text-align: center;margin: 20px;">
            <button class="btn btn-danger" onclick="location.href='./api/del_vote.php?table=subjects&id=<?= $_GET['id']; ?>'">確定</button>
            <button class="btn btn-warning" onclick="location.href='back.php'">取消</button>
        </div>
</div>
<!-------------------------------------------------------------------------------------->