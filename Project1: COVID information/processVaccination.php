<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Alisa Liu"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>processVaccination</title>
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
    <?php
        $OHIP = $_POST['PatientOHIP'];
        $Date = $_POST['Date'];
        $Time = $_POST['Time'];
        $LotID = $_POST['LotID'];
        $Clinic = $_POST['Site'];

        $connection->query("INSERT INTO Vaccination(PatientOHIP, VaccinationDate, VaccinationTime, VaccineID, SiteName) VALUES('$OHIP', '$Date', '$Time', '$LotID', '$Clinic')");
        echo "<div class='title'>You can choose to review your vaccine records now!</div>"; 
    ?>
    <form action="/A6/processRecords.php" method="post">

        <div class = "input">
        <p> OHIP Number </p>
        <input type="text" placeholder="e.g. 0123456789" name="PatientOHIP">
        </div>
        
        <div class = "submit">
        <input class = "button" type="submit" value = "View">
        </div>
    </form>

    

</main>

</body>

</html>

