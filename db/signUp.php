<?php
include 'conn.php';
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass'])) {
    $user = $_POST['name'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    //console_log("This is the data received: user="+$user+"\nPass="+$pass+"\nemail="+$email+"\n");
    //console_log($user);
    $prepEmail = "SELECT * FROM user WHERE 'user-email'=?";
    $uStmt = $conn->prepare("SELECT * FROM user WHERE 'user-name'=?");
    $uStmt->execute([$user]);
    $eStmt = $conn->prepare($prepEmail);
    $eStmt->execute([$email]);
    if ($uStmt->rowCount() > 0)
        echo ('5');
    else if ($eStmt->rowCount() > 0)
        echo ('4');
    else {
        $prepInsU = "INSERT INTO `user`(`user-name`, `user-pass-hash`, `user-email`) 
                VALUES (?,?,?)";
        try {
            $insU = $conn->prepare($prepInsU)->execute([$user, $pass, $email]);
            echo ('1');
        } catch (PDOException $e) {
            echo ('0');
        }
    }
}
