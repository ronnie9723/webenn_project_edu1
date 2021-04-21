<?php  

	require_once "../libs/config.php";



	if( isset($_GET['stu_id']) ){
		$student_id = $_GET['stu_id'];
		$student_pic = $_GET['stu_pic'];
	}

	$sql = "DELETE FROM students_info WHERE student_id='$student_id'";
	$conn -> query($sql);
	unlink('../stu_photos/'.$student_pic);
	header("location:../all_students.php");



?>