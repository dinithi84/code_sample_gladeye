<?php
include 'controller.php';
$controller = new Controller();

$memid = $_POST['memid'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$route_id = $_POST['route'];
$comment = $_POST['comment'];

$updateMemContent = $controller->varUpdateMemberDetaials($memid, $fullname, $email, $telephone, $route_id, $comment);
if($updateMemContent==1){
	header("Location: edit-member.php?mem_id=$memid&ret=1");
	//print "Data updated successfully <br> <a href='index.php'> Back to member list </a>";
}else {
	header("Location: edit-member.php?mem_id=$memid&ret=0");
	//print "Error: Please try again later";
}
?>