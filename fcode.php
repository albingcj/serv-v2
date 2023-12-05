<?php

require 'config.php';
require 'session.php';

if(isset($_POST['save_exp']))
{
	$errors= array();
    $id = mysqli_real_escape_string($db, $_POST['id']);
	
	$query2 = "SELECT * FROM faculty WHERE id='$id'";
    $query_run2 = mysqli_query($db, $query2);

    if(mysqli_num_rows($query_run2)== 1)
    {
        $res = [
            'status' => 201,
            'message' => 'Faculty already existed'
        ];
        echo json_encode($res);
        return;
	}

	
	$name = mysqli_real_escape_string($db, $_POST['name']);
	$design = mysqli_real_escape_string($db, $_POST['design']);
    $dept = mysqli_real_escape_string($db, $_POST['dept']);
    $doj = mysqli_real_escape_string($db, $_POST['doj']);
    $role = mysqli_real_escape_string($db, $_POST['role']);

	$file_name = $_FILES['cert']['name'];
	$file_tmp =$_FILES['cert']['tmp_name'];
	$ext = pathinfo($file_name, PATHINFO_EXTENSION);
	$file_name = $name.$id.".".$ext;
$filePath="images/profile/".$file_name;
if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/profile/".$file_name);

    if($id == NULL || $name == NULL || $design == NULL || $dept == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO faculty (id,name,dept,design,role,doj,pass,cert) VALUES ('$id','$name','$dept','$design','$role','$doj','$id','$filePath')";
    $query_run = mysqli_query($db, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Faculty Created Successfully'
        ];
        echo json_encode($res);
        return;
}}
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Student Not Created'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($db, $_POST['student_id']);

    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $course = mysqli_real_escape_string($db, $_POST['course']);

    if($name == NULL || $email == NULL || $phone == NULL || $course == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' 
                WHERE id='$student_id'";
    $query_run = mysqli_query($db, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Student Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Student Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}




if(isset($_POST['delete_pc']))
{
    $student_id = mysqli_real_escape_string($db, $_POST['student_id5']);
	$query = "SELECT cert FROM faculty WHERE uid='$student_id'";
    $query_run = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($query_run);
	$f=$row['cert'];
	//$filePath="images/exp/".$f;
		if (file_exists($f)) 
					   {
						 unlink($f);
					   }
    $query = "DELETE FROM faculty WHERE uid='$student_id'";
    $query_run = mysqli_query($db, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Faculty Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Faculty Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_GET['student_id2']))
{
    $student_id = mysqli_real_escape_string($db, $_GET['student_id2']);

    $query = "SELECT * FROM faculty WHERE uid='$student_id'";
    $query_run = mysqli_query($db, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $student = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'details Fetch Successfully by id',
            'data' => $student
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'details Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['update_faculty']))
{

    $student_id = mysqli_real_escape_string($db, $_POST['student_id3']);

   	$errors= array();
    $id = mysqli_real_escape_string($db, $_POST['id']);
	$name = mysqli_real_escape_string($db, $_POST['name']);
	$design = mysqli_real_escape_string($db, $_POST['design']);
    $dept = mysqli_real_escape_string($db, $_POST['dept']);
    $doj = mysqli_real_escape_string($db, $_POST['doj']);
    $role = mysqli_real_escape_string($db, $_POST['role']);
	$file_name = $_FILES['cert']['name'];
	if($id == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
	$query = "SELECT cert FROM faculty WHERE uid='$student_id'";
    $query_run = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($query_run);
	$f=$row['cert'];

		if (file_exists($f)) 
					   {
						 unlink($f);
					   }

	$file_tmp =$_FILES['cert']['tmp_name'];
	$ext = pathinfo($file_name, PATHINFO_EXTENSION);
	$file_name = $name.$id.".".$ext;
	$filePath="images/profile/".$file_name;
	
	if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/profile/".$file_name);
	

    $query = "UPDATE faculty  SET id='$id',name='$name',design='$design',dept='$dept',doj='$doj',role='$role',cert='$filePath' WHERE uid='$student_id'";
    $query_run = mysqli_query($db, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Details Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }}
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Details Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_GET['student_id4']))
{
    $student_id = mysqli_real_escape_string($db, $_GET['student_id4']);

    $query = "SELECT * FROM faculty WHERE uid='$student_id'";
    $query_run = mysqli_query($db, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $student = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'details Fetch Successfully by id',
            'data' => $student
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'detailsss Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}







if(isset($_POST['update_research']))
{

    $id = mysqli_real_escape_string($db, $_POST['oid']);

	$query = "SELECT * FROM faculty WHERE id='$id'";
    $query_run = mysqli_query($db, $query);

    if(mysqli_num_rows($query_run)== 1)
    {
        $student = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'details Fetch Successfully by id',
            'data' => $student
        ];
        echo json_encode($res);
        return;
	}
	
	else{
		      $res = [
            'status' => 201,
            'message' => 'details Fetch Successfully by id',
  
        ];
	}
}







?>