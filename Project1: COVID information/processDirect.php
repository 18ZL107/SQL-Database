<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Alisa Liu"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>processDirect</title>
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
        <form action="/A6/processVaccination.php" method="post"> 
            <div class="title"> Please input your vaccination information: </div>

            <div class = "input">
            <p> OHIP Number </p>
            <input type="text" placeholder="e.g. 0123456789" name="PatientOHIP" id="PatientOHIP">
            <p> Vaccination Date </p>
            <input type="text" placeholder="YYYY-MM-DD" name="Date" id="Date">
            <p> Vaccination Time </p>
            <input type="text" placeholder="HH:MM:SS" name="Time" id="Time">
            <p> Lot Number </p>
            <input type="text" placeholder="e.g. AB1234" name="LotID" id="LotID"> 
            <p> Clinic </p>
            <select name="Site" id="Site">
                <option value="">--- Choose a site ---</option>
                <option value="General Hospital">General Hospital</option>
                <option value="Shoppers">Shoppers</option>
                <option value="Student Wellness Centre">Student Wellness Centre</option>
            </select>
            </div>

            <div class = "submit">
            <input class = "button" type="submit" value = "Record the vaccination">
            </div>
        </form>
    </div>

</main>

</body>

</html>

