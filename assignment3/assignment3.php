<html lang="en">
<head>
  <title>Employees Work Hours</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Employees Work Hours </h2>
  
  <table class="table">
    <thead>
      <tr>
		<th>Name</th>
		<th>Start Time</th>
		<th>End Time</th>
		<th>Total Hour</th>
		<th>Shift</th>
	</tr>
    </thead>
    <tbody>
  
<?php
   include("schedule.php");

   $work_hour = "";
   $shift = "";
   foreach($employeeWorkSchedule as $extract_data) { 	  	
?>
		<tr>
		<td>
			<?=$extract_data["name"]?>
		</td>
		<td>
			<?=$extract_data["shiftStart"]?>
		</td>
		<td>
			<?=$extract_data["shiftEnd"]?>
		</td>
<?php

		$time1 = strtotime($extract_data["shiftStart"]);
		$time2 = strtotime($extract_data["shiftEnd"]);
		$difference = round(abs($time2 - $time1) / 3600,2);

		if($extract_data["shiftStart"] >= $settingsNightTimeStart && $extract_data["shiftEnd"] <= $settingsNightTimeEnd) {
			$shift = "Night";
		}
		
		if($extract_data["shiftStart"] < $settingsNightTimeStart && $extract_data["shiftEnd"] > $settingsNightTimeEnd) {
			$shift = "Day";
		}
		
		if($extract_data["shiftStart"] <= $settingsNightTimeStart && $extract_data["shiftEnd"] >= $settingsNightTimeEnd) {
			
			$shift = "Day Night";
		}
		
?>
		<td>
			<?=$difference?>
		</td>
		<td colspan=4>
			<?=$shift?>
		</td>
	</tr>
	<?php
	 }
	?>	
	</tbody>
</table>
</div>
</body>
</html>