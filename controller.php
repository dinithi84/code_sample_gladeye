<?php
include 'module.php';

class Controller{
	var $dbCon;

	function Controller()
	{
		$this->dbCon = new Module();
	}

	/**
	 * List the team data
	 * @return array
	 *
	 */
	function arrayListTeamData()
	{
		$query = "SELECT t.id, t.fullname, t.email, t.telephone, r.route_name FROM team as t, route as r WHERE r.route_id = t.route_id AND t.availability!=0 ";

		$query_result = $this->dbCon->arrGenerateDataArray($query);

			return $query_result;

	}
	
	/**
	 * List the route data
	 * @return array
	 *
	 */
	function arrayListRoutes()
	{
		$query = "SELECT route_id, route_name FROM route ORDER BY route_id";

		$query_result = $this->dbCon->arrGenerateDataArray($query);

			return $query_result;

	}

	/**
	 * Insert member data
	 * @param $fullname
	 * @param $email
	 * @param $telephone
	 * @param $route
	 * @param $comment
	 * @param $date
	 * @return variable
	 */

	function intInsertMember($fullname, $email, $telephone, $route, $comment, $date)
	{
		$query = "INSERT INTO team (fullname, email, telephone, route_id, availability, comment, joined_date) VALUES ('$fullname', '$email', '$telephone', $route, '1', '$comment', '$date')";

		$query_result = $this->dbCon->varInsertData($query);

		return $query_result;

	}

	/**
	 * Delete member
	 * @param $id
	 * @return variable
	 */

	function intDeleteMember($id)
	{
		$query = "DELETE FROM `team` WHERE id = $id";

		$query_result = $this->dbCon->varDeleteData($query);

		return $query_result;

	}

	/**
	 * Get specific member data
	 * @param $memId
	 * @return array
	 */
	function arrayListTeamMemberData($memId)
	{
		$query = "SELECT id, fullname, email, telephone, route_id, comment, joined_date FROM team  WHERE id = $memId";

		$query_result = $this->dbCon->arrGenerateDataArray($query);

		return $query_result;

	}

	/**
	 * Update member details
	 * @param $memid
	 * @param $fullname
	 * @param $email
	 * @param $telephone
	 * @param $route_id
	 * @param $comment
	 * @return variable
	 */
	function varUpdateMemberDetaials($memid, $fullname, $email, $telephone, $route_id, $comment){
			$query = "UPDATE team SET fullname='$fullname', email='$email', telephone='$telephone', route_id=$route_id, comment='$comment' WHERE id=$memid";
			//print $query;
			$query_result = $this->dbCon->varDeleteData($query);

			return $query_result;

	}
	/**
	 * Select route name
	 * @param $route_id
	 * @return variable
	 */
	function varRoute($route_id){
		$query = "SELECT route_name FROM route  WHERE route_id = $route_id";

		$query_result = $this->dbCon->arrGenerateDataArray($query);

			return $query_result[0]['route_name'];
		}
}
?>