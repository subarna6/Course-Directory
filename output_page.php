<?php
session_start();
 $arr =  $_SESSION['name']; 
 $length_arr = count($arr);
session_destroy();
//var_dump($arr);
?>

<table>
	<th>Coursename: </th>
	<th>Day: </th>
	<th>Time: </th>
	<?php foreach ($arr as $temp) { ?>
	<tr>
		<td><?php echo $temp['coursename'] ?></td>
		<td><?php echo $temp['day'] ?></td>
		<td><?php echo $temp['time'] ?></td>
	</tr>
	<?php  } ?>
</table>