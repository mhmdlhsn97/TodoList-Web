<?php
include "conn.php";
if(isset($_POST['userid'])&& isset($_POST['listName'])){
$userid=$_POST['userid'];
$listName=$_POST['listName'];
$stmt = $conn->prepare("INSERT INTO `user-list`(`user-id`, `list-name`)
 VALUES (?,?)");
if($stmt->execute([$userid,$listName]))
echo'success';
else echo'sql insert fail';
}else echo'post error';
?>