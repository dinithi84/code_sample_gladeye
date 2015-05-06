<?php
include 'controller.php';
$controller = new Controller();

$memId = $_REQUEST['mem_id'];

$returnDel = $controller->intDeleteMember($memId);
if($returnDel==1){
	echo 1;
	//header("Location: index.php?ret=1");
//print "Data Deleted success fully <br> <a href='index.php'> List members </a>";
}else {
	echo 0;
	//header("Location: index.php?ret=0");
//print "Error: Please try again later";
}

?>