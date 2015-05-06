<?php
include 'controller.php';
$controller = new Controller();

$memId = $_REQUEST['mem_id'];
$get_member_details = $controller->arrayListTeamMemberData($memId);
foreach($get_member_details as $items){
	$id = $items['id'];
	$fullname = $items['fullname'];
	$email = $items['email'];
	$telephone = $items['telephone'];
	$mem_route_id = $items['route_id'];
	$comment = $items['comment'];
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Sales List</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/script.js" ></script>
	<link rel="stylesheet" href="css/styles.css" type="text/css" media="all" />
</head>
<body>
<div id="wrapper">
	<div id="content">
		<div id="content-title">Sales Team </div>
		<div id="content-edit"><a href="index.php">Back to list</a></div>
		<div id="form-content">
			<form id="edit-team" name="add-team" action="edit-confirm.php" enctype="multipart/form-data" method="post">
				<?php
				if(isset($_REQUEST['ret']) && $_REQUEST['ret']==1){
					echo '<div class="success">Data updated successfully</div>';
				}else if(isset($_REQUEST['ret']) && $_REQUEST['ret']==0){
					echo '<div class="fail">Error occurred. Please try again later.</div>';
				}
				?>
				<div id="edit-data">
					<div class="edit-left">Member ID:</div>
					<div class="edit-right"><input type="text" name="memid" id="memid" value="<?php echo $id;?>" placeholder="Full name" size="60px" readonly/></div>
				</div>
				<div id="edit-data">
					<div class="edit-left">Full name:</div>
					<div class="edit-right"><input type="text" name="fullname" id="fullname" value="<?php echo $fullname;?>" placeholder="Full name" size="60px"/></div>
				</div>
				<div id="edit-data">
					<div class="edit-left">Email:</div>
					<div class="edit-right"><input type="text" name="email" id="email" value="<?php echo $email;?>" placeholder="Email" size="60px"/></div>
				</div>
				<div id="edit-data">
					<div class="edit-left">Telephone:</div>
					<div class="edit-right"><input type="text" name="telephone" id="telephone" value="<?php echo $telephone;?>" placeholder="Telephone" size="60px"/></div>
				</div>
				<div id="edit-data">
					<div class="edit-left">Current route:</div>
					<div class="edit-right"><select name="route" id="route" >
							<option value="0">Select route</option>
							<?php
							$get_routes = $controller->arrayListRoutes();
							foreach($get_routes as $items){
								$route_id = $items['route_id'];
								$route_name = $items['route_name'];

								echo '<option value="'.$route_id.'"';
								if($mem_route_id==$route_id){ echo "selected";}
								echo '>'.$route_name.'</option>';
							}
							?>
						</select>
					</div>
				</div>
				<div id="edit-data">
					<div class="edit-left">Comments:</div>
					<div class="edit-right"><textarea cols="45" rows="5" name="comment" id="comment"><?php echo $comment; ?></textarea></div>
				</div>
				<div id="edit-data">
					<div class="edit-button"><input type="submit" name="Submit-btn" id="Submit-btn" value="Submit"></div>
				</div>
			</form>
		</div>
	</div>
</div>

</body>
</html>
