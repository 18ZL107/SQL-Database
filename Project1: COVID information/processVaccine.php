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
    <div class="title"> Here is availability of the select vaccine type: </div>

    <?php
    $type = $_POST['type'];

    $sql = "SELECT IsShippedTo.ClinicName, Vaccine.Doses, Vaccine.CompanyName FROM IsShippedTo INNER JOIN Vaccine ON IsShippedTo.LotID=Vaccine.LotID and Vaccine.CompanyName='$type'";
    $result = $connection->query($sql);

   if ($result->rowCount() == 0) {
        echo "<div class = 'title'> Not Found!<br>Please try another vaccine type! </div>";
    } else{
        echo "<table><tr><th>ClinicName</th><th>Number of Doses</th></tr>";
        //output data of each row
        while($row = $result->fetch()){
            echo "<tr><td>".$row["ClinicName"]."</td><td>".$row["Doses"]."</td></tr>";
        }
        echo "</table>";    
    }

    ?>
</main>
</body>

</html>

