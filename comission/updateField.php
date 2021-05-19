<?php

require '../connection.php';
$tbl = $_GET['table'];
$fld = $_GET['field'];
$val = $_GET['val'];
$id = 'id'.$_GET['table'];
$idU = $_GET['id'];
$str = "UPDATE `$tbl` SET `$fld` = '$val' WHERE `$id`=$idU";

$result = mysqli_query($con, $str);
if($result){
    echo 'Дані записані';
} else {
    echo 'Помилка ' . mysqli_error($result);
}
