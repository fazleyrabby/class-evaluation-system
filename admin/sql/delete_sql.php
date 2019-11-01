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



//================== *Delete section Starts* ============================//


if($delete == 'delete_section') {

  $sql = "UPDATE section SET status=0 WHERE id=$id";

	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['alert'] = "section Deleted Successfully!";
		header('location: ../section/section_list.php');
	}

	else
	{			
			$_SESSION['alert'] = "Error Occured!";
			header('location: ../section/section_list.php');
  }	
  
}

//================== *Delete section Ends* ============================//

//================== *Delete Course Outline Topic* ============================//


if($delete == 'delete_section') {

  $sql = "UPDATE course_outline SET status=0 WHERE id=$id";

	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['alert'] = "section Deleted Successfully!";
		header('location: ../section/section_list.php');
	}

	else
	{			
			$_SESSION['alert'] = "Error Occured!";
			header('location: ../section/section_list.php');
  }	
  
}

//================== *Delete Course Outline Topic* ============================//

    //================== *Delete Course Outline Topic* ============================//


    if($delete == 'delete_semester') {

        $sql = "UPDATE semester SET status=0 WHERE id=$id";

        if ($conn->query($sql) === TRUE)
        {
            $_SESSION['alert'] = "section Deleted Successfully!";
            header('location: ../semester/semester_list.php');
        }

        else
        {
            $_SESSION['alert'] = "Error Occured!";
            header('location: ../semester/semester_list.php');
        }

    }

//================== *Delete Course Outline Topic* ============================//


  //================== *Delete Request Subject Student Starts* ==========================//


    if($delete == 'cancel_request_subject') {

			$sql = "UPDATE assign_subject_student SET request_status=3 WHERE id=$id";

			if ($conn->query($sql) === TRUE)
			{
					$_SESSION['alert'] = "section Deleted Successfully!";
					header('location: ../student/subject_request.php');
			}

			else
			{
					$_SESSION['alert'] = "Error Occured!";
					header('location: ../student/subject_request.php');
			}

	}

//================== *Delete Request Subject Student Ends* ============================//


  //================== *Reject Request Subject Student Starts* ==========================//


	if($delete == 'reject_request_subject') {

		$sql = "UPDATE assign_subject_student SET request_status=2 WHERE id=$id";

		if ($conn->query($sql) === TRUE)
		{
				$_SESSION['alert'] = "Rejected Successfully!";
				header('location: ../subject/assign_subject_student.php');
		}

		else
		{
				$_SESSION['alert'] = "Error Occured!";
				header('location: ../subject/assign_subject_student.php');
		}

}

//================== *Reject Request Subject Student Ends* ============================//

}
?>