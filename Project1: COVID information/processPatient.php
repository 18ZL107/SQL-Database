<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Alisa Liu"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>processPatient</title>
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
    <div class="title"> Here is the vaccination status for the patient: </div>

    <?php
        $patientOHIP = $_POST["Patient"];

        $sql = "SELECT Patient.OHIP, Patient.FirstName, Patient.LastName, Vaccination.VaccinationDate, Vaccine.CompanyName FROM Patient INNER JOIN (Vaccination INNER JOIN Vaccine ON Vaccination.VaccineID=Vaccine.LotID) ON Patient.OHIP=Vaccination.PatientOHIP and Patient.OHIP=$patientOHIP";
        $result = $connection->query($sql);

        //var_dump($result);
        if ($result->rowCount() == 0){
            echo "<div class = 'title'> The patient has not vaccinated yet! </div>";
        } else{
            echo "<table><tr><th>OHIP</th><th>Name</th><th>VaccineDate</th><th>VaccineType</th></tr>";
            while($row = $result->fetch()) {
                echo "<tr><td>".$row["OHIP"]."</td><td>".$row["FirstName"]." ".$row["LastName"]."</td><td>".$row["VaccinationDate"]."</td><td>".$row["CompanyName"]."</td></tr>";
            }
        }
        echo "</table>";

    ?>
</main>
</body>

</html>

