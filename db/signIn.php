<?php
include "conn.php";
if (isset($_POST['name']) && isset($_POST['cook']) && isset($_POST['pass'])) {
    $user = $_POST['name'];
    $pass = $_POST['pass'];
    $uStmt = $conn->prepare("SELECT * FROM user WHERE 'user-name'=?");
    $uStmt->execute([$user]);
    $pStmt = $conn->prepare("SELECT * FROM user WHERE 'user-password'=?");
    $pStmt->execute();
    $Stmt = $conn->prepare("SELECT * FROM user WHERE 'user-name'=? AND 'user-password'=?");
    $Stmt->execute([$user,$pass]);
    $user_ID;
    if($Stmt->rowCount()==1){
        $Stmt->fetch(PDO::FETCH_ASSOC);
        $user_ID=$Stmt['user'];
        echo'{"x":1,"user-id":'+$user+'}';
    }else if($uStmt->rowCount()==0){
        echo'{"x":2}';
    }else if($pStmt->rowCount()==0){
        echo'{"x":3}';
    }
}else{
    console_log("Missing POST to SgingIn.php");
}
?>