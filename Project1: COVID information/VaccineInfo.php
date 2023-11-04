<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Alisa Liu"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>VaccineInfo</title>
	<link rel="stylesheet" href="/A6/style.css">  

	<!-- css google font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Roboto+Condensed:ital@1&display=swap" rel="stylesheet">


</head>

<body>

<?php
include 'connectdb.php';
?>

<header>
	<img src="/A6/vaccine.jpg" alt="vaccine" id="image">
    <div id="page-title"> COVID VACCINE INFORMATION </div>
    <nav>
        <ul>
            <!-- additional pages containing the information about the health workers and the existed patient -->
            <li><a href="/A6/covid.php">Home</a></li>
            <li><a href="/A6/VaccineInfo.php">Vaccine Information</a></li>
            <li><a href="/A6/PatientInfo.php">Patient Information</a></li>
            <li><a href="/A6/HealthWorkers.php">Health Workers</a></li>
        </ul>
    </nav>
</header>

<main>
	<div class = "column">
		<form action="/A6/processVaccine.php" method="post"> 
			<p> Select A Vaccine Type:</p>
			<select name="type">
				<option value="">--- Choose a type ---</option>
				<option value="Astrazeneca">Astrazeneca</option>
				<option value="Johnson & Johnson">Johnson & Johnson</option>
				<option value="Moderna">Moderna</option>
				<option value="Pfizer">Pfizer</option>
			</select>
			<input class = "button" type="submit" value = "Check for avalibility">
		</form>
	</div>
</main>

</body>
</html>