<?php
include "database.php";



if (isset($_POST["input-form"])) {
	$course_name = $_POST["course-name"];
	$professor_name = $_POST["professor-name"];
	$time = $_POST["time"];
	$day = $_POST["day"];
	insert_course_data($$course_name, $$professor_name, $$time, $$day, $conn);
}

if (isset($_POST["output_form"])) {
	
	$professor_name = $_POST["professor-name"];
	search_by_params($professor_name, $conn);		
}

function insert_course_data($course_name, $professor_name, $time, $day, $con){

	$sql = "insert into courses (coursename, time, day, professor_id) values($course_name, $time, $day, professor_id)";
	//if($conn) { echo "thusahr"; }else  echo "no Connect";
	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}

}

function search_by_params($professor_id, $conn){
	$i = 0;
	echo $professor_id;
	//$arr = array();
	$sql = "select * from courses where professor_id='$professor_id'";
	$result = $conn->query($sql);
	if ($result->num_rows  > 0) {
    while($row = $result->fetch_assoc()) {
    	//echo "<table>";
       	 $arr[$i] = $row;
       	 //var_dump($arr[i]);
       	 $i++;
    }
} else {
    echo "0 results";
}	
 session_start();
 $_SESSION['name'] = $arr;
	//echo "hello world";
	header("Location: output_page.php");
}

function get_professor_name($conn){
		$i = 0;
	//$arr = array();
	$sql = "select * from professors";
	$result = $conn->query($sql);
	if ($result->num_rows  > 0) {
    while($row = $result->fetch_assoc()) {
    	//echo "<table>";
       	 $arr[$i] = $row;
       	 //var_dump($arr[i]);
       	 $i++;
    }
} else {
    echo "0 results";
}	
 session_start();
 $_SESSION['professor'] = $arr;
	//echo "hello world";
}