<?php
include 'controller.php';
$controller = new Controller();
$team_list = $controller->arrayListTeamData();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Sales List</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link rel="stylesheet" href="css/styles.css" type="text/css" media="all" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/script.js" ></script>
</head>
<body>
<div id="wrapper">
	<div id="content">
		<div id="content-title">Sales Team </div>
		<div id="content-add-new"><a href="insert-member.php">Add new</a></div>
		<div id="team-list">

			<div class="del-success">Data deleted successfully</div>
			<div class="del-fail">Error occurred. Please try again later.</div>
			<div id="team-id">ID</div>
			<div id="team-name">Name</div>
			<div id="team-email">Email</div>
			<div id="team-tel">Telephone</div>
			<div id="team-route">Current route </div>
			<div id="cont-view">Edit</div>
			<div id="cont-edit">Delete</div>
			<div id="cont-del">View</div>
		</div>
		<?php
		foreach($team_list as $data){
			$id = $data['id'];
			$fullname = $data['fullname'];
			$email = $data['email'];
			$telephone = $data['telephone'];
			$route_name = $data['route_name'];

			print '<div id="team-data">
			<div id="team-id">'.$id.'</div>
			<div id="team-name">'.$fullname.'</div>
			<div id="team-email">'.$email.'</div>
			<div id="team-tel">'.$telephone.'</div>
			<div id="team-route">'.$route_name.'</div>
			<div id="data-view" class="'.$id.'"><span id="view_data-'.$id.'" class="'.$id.'">View</span></div>
			<div id="cont-edit" class="'.$id.'"><a href="edit-member.php?mem_id='.$id.'">Edit<a/></div>
			<div id="cont-del" class="'.$id.'"><div id="delete-mem" class="'.$id.'"><!--<a href="delete-confirm.php?mem_id='.$id.'"><a/>-->Delete</div></div>
		</div>';
		}
		?>

		<div id="pop-content" class="white_content">
			<div class="member-content">
				<!--<input type="text" name="member-id" id="member-id" value="" />-->


			</div>
			<div id="close-details">Close</div>
		</div>

		<div id="del-content" class="del_content">
			<div class="del-member-content">
				Are you sure you want to delete content?<br/>
				<input type="button" name="yes-button" id="yes-button" value="Yes" />
				<input type="button" name="no-button" id="no-button" value="No" />
			</div>
			<div id="close-details">Close</div>
		</div>

		<div id="fade" class="black_overlay"></div>
	</div>
</div>

</body>
</html>
