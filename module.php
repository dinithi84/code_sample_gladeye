<?php
/**
 * Generate the module class to handle project database.
 */
class Module
{
	var $hostName='localhost';
	var $userName='root';
	var $password='';
	var $database='sales';

	/**
	 * Set the database connection.
	 * E100 returns the error code for database un-success conductivity.
	 * @return variable
	 */
	function varConnectDatabase(){
		$con_id=null;
		$con_id=mysql_connect($this->hostName,$this->userName,$this->password);
		if($con_id==null)
			return 'E100';
		else
			return $con_id;
	}

	/**
	 * Select the database to built the connection
	 * @return Integer
	 */
	function intSelectDatabase()
	{
		$db_select=mysql_select_db($this->database);
		if(!$db_select)
			return 'E105';
		else
			return  1;
	}

	/**
	 * Generate the data array for the query request
	 * @return array
	 */
	function arrGenerateDataArray($query){
		$con=$this->varConnectDatabase();

		if($con!='E100'){
			$select_db = $this->intSelectDatabase();

			if($select_db!='E105'){
				$result_id=mysql_query($query);

				$result_array=array();
				if($result_id){
					$i=0;
					while ($row=mysql_fetch_array($result_id,MYSQL_BOTH)){
						$result_array[$i]=$row;
						$i++;
					}
					$result=$result_array;
				}
				else
					$result='E115';

				mysql_close($con);
			}
			else
				$result = $select_db;
		}
		else
			$result = $con;

		return $result;
	}

	/**
	 * Generates the inset, delete and update functions feedback according to the query.
	 * @return variable
	 */
	function varGenerateDataResult($queryStr){
		$con=$this->varConnectDatabase();
		if($con!='E100'){
			$select_db = $this->intSelectDatabase();

			if($select_db!='E105'){
				$result_id=mysql_query($queryStr);

				if(mysql_errno($con)!=0)
					$result='E110';
				else if($result_id)
					$result=1;
				else
					$result='E115';

				mysql_close($con);
			}
			else
				$result=$select_db;
		}
		else
			$result=$con;

		return $result;
	}

	/**
	 * Do the Insertion according to the query.
	 * return variable
	 */
	function varInsertData($queryStr){
		return $this->varGenerateDataResult($queryStr);
	}

	/**
	 * Do the update for according to the query.
	 * @return variable
	 */
	function varUpdateData($queryStr){
		return $this->varGenerateDataResult($queryStr);
	}

	/**
	 * Do the Delete according to the query.
	 * return variable
	 */
	function varDeleteData($queryStr){
		return $this->varGenerateDataResult($queryStr);
	}
}
?>