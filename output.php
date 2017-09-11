
<?php session_start(); 
include 'database.php';
	include 'inputphp.php';
	session_destroy();
	get_professor_name($conn);
	$temp_arr = $_SESSION['professor'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>OUTPUT PAGE</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
	body {
	background-image: url(days.jpeg);
	background-size: 100% auto;
}
.container {
	position: absolute;
	width: 1140px;
	top: 35%;
	left: 50%;
	transform: translate(-50%, -50%);
}
</style>
</head>
<body class="container row" style="position: absolute;top: 58%; left: 50%;">
<div class="jumbotron col-md-8 col-md-offset-2">
<form method="post" action="inputphp.php">
<div class="row">

<div class="form-group col-md-4 col-md-offset-2">
    <label for="professor-name">PROFESSOR ID:</label>
    <select name = "professor-name">
	<?php foreach ($temp_arr as $temp) { ?>
	<option value=<?php echo $temp['ProfessorID'] ?>><?php echo $temp['Name'] ?></option>
		<?php  } ?>
		</select>
</div>
<div class="form-group col-md-10 col-md-offset-1">
	<input type="submit" class="btn btn-primary" name="output_form">
	<a href="mainpage.html"><button class="btn btn-warning" type="button" style="float:right">BACK</button></a>
</div>
</form>
</div>
</div>
</body>
</html>