<?php
include "conn.php";
if(isset($_POST['userid'])){
    $userid=$_POST['userid'];
    $stmt=$conn->prepare("SELECT `list-id`, `list-name` FROM `user-list` WHERE `user-id`=?");
    if($stmt->execute([$userid])){
        if($stmt->rowCount()>0){
            $arrObj=array();
            while($res=$stmt->fetch(PDO::FETCH_ASSOC)){
            $arrObj[]=$res;
            }
            
            $js_res=json_encode($arrObj);
            echo $js_res;
        }else echo "You Do Not Have Any Lists.";
    }
}

?>