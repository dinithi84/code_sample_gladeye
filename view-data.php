<?php
include 'controller.php';
$controller = new Controller();
$memId = $_POST['member-id'];
$get_member_details = $controller->arrayListTeamMemberData($memId);
		foreach($get_member_details as $items){
				$id = $items['id'];
				$fullname = $items['fullname'];
				$email = $items['email'];
				$telephone = $items['telephone'];
				$mem_route_id = $items['route_id'];
				$comment = $items['comment'];
				$joinedDate = $items['joined_date'];
		}


				?>
<div id="form-content">
		<div class="title"><?php echo strtoupper($fullname);?></div>
		<div id="list-data">
			<div class="left-val">ID:</div>
			<div class="right-val"><?php echo $id;?></div>
		</div>
		<div id="list-data">
			<div class="left-val">Full name:</div>
			<div class="right-val"><?php echo $fullname;?></div>
		</div>
		<div id="list-data">
			<div class="left-val">Email Address:</div>
			<div class="right-val"><?php echo $email;?></div>
		</div>
		<div id="list-data">
			<div class="left-val">Telephone:</div>
			<div class="right-val"><?php echo $telephone;?></div>
		</div>
		<div id="list-data">
			<div class="left-val">Joined date:</div>
			<div class="right-val"><?php echo $joinedDate;?></div>
		</div>
		<div id="list-data">
			<div class="left-val">Current route:</div>
			<div class="right-val"><?php echo $get_routes = $controller->varRoute($mem_route_id); ?></div>
		</div>
		<div class="list-data">
			<div class="left-val">Comments:</div>
			<div class="right-val"><?php echo $comment; ?></div>
		</div>

</div>
