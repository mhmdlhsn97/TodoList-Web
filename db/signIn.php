<?php
include "conn.php";
if (isset($_POST['user']) && isset($_POST['pass'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $Stmt = $conn->prepare("SELECT * FROM `user` WHERE `user-name`=? AND `user-pass-hash`=?");
    $Stmt->execute([$user, $pass]);
    $uStmt = $conn->prepare("SELECT * FROM user WHERE `user-name`=?");
    $uStmt->execute([$user]);
    $pStmt = $conn->prepare("SELECT * FROM user WHERE `user-pass-hash`=?");
    $pStmt->execute([$pass]);
    if ($Stmt->rowCount() == 1) {
        $user = $Stmt->fetch(PDO::FETCH_ASSOC);
        $j=json_encode($user);
        echo $j;
    } else if ($uStmt->rowCount() == 0) {
        echo '{ "x" : "2" }';
    } else if ($pStmt->rowCount() == 0) {
        echo '{ "x" : "3" }';
    } else echo '{ "x" : "404" }';
}
