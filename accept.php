<?php
require('connection.php');
require('functions.php');
if(isset($_GET['a']) && $_GET['a']!=''){
    $itemid=$_GET['a'];
    $uuuid=$_SESSION['USER_ID'];
    mysqli_query($con,"UPDATE `donations` SET `status`='2',`taken_by`='$uuuid' WHERE `donations`.`id`='$itemid'");
}
echo "<script>window.location.href='ngo.php'</script>";