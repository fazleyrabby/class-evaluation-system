<?php
session_start();
include('../includes/db/connection_db.php');



if(isset($_GET['id']) && isset($_GET['delete'])) 
{
  $delete = $_GET['delete'];
  $id=$_GET['id'];
//================== *Delete Subject Starts* ============================//


if($delete == 'delete_subject') {

  $sql = "UPDATE subject SET status=0 WHERE id=$id";

	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['alert'] = "Subject Deleted Successfully!";
		header('location: ../subject/subject_list.php');
	}

	else
	{			
			$_SESSION['alert'] = "Error Occured!";
			header('location: ../subject/subject_list.php');
  }	
  
}






//================== *Delete Subject Ends* ============================//



}
?>