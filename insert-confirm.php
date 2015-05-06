<?php
include 'controller.php';
$controller = new Controller();

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$route = $_POST['route'];
$comment = $_POST['comment'];

$date = Date("Y-m-d");

$returnInsert = $controller->intInsertMember($fullname, $email, $telephone, $route, $comment, $date);
if($returnInsert==1){
	header("Location: insert-member.php?ret=1");
//print "Data inserted successfully <br> <a href='insert-member.php'> Insert another member </a> | <a href='index.php'> List members </a>";
}else {
	header("Location: insert-member.php?ret=0");
//print "Error: Please try again later";
}

?>