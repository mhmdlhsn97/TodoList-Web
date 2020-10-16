<?php
include "conn.php";
if(isset($_POST['userid'])){
    $userid=$_POST['userid'];
    $stmt=$conn->prepare("SELECT `list-id`, `list-name` FROM `user-list` WHERE `user-id`=?");
    if($stmt->execute([$userid])){
        if($stmt->rowCount()>0){
            $res=$stmt->fetch(PDO::FETCH_ASSOC);
            $js_res=json_encode($res);
            console_log("json encoded thingies: "+$js_res+"\n");
            echo $js_res;
        }else echo "You Do Not Have Any Lists.";
    }
}

?>