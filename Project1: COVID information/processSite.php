<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Alisa Liu"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>processSite</title>
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
    <div class="title"> Here are the healthcare workers working in this clinic: </div>

    <?php
    //list all the health workers in the select vaccination site
    $site = $_POST['site'];

    $sql = "SELECT HealthCareWorker.Name, WorkerCredentials.Credential FROM HealthCareWorker INNER JOIN WorkerCredentials ON ID=WorkerID and SiteName='$site'";
    $result = $connection->query($sql);

    if ($result->rowCount() == 0){
        echo "<div class = 'title'> Not Found!<br>Please try another clinic! </div>";
    } else{
        echo "<table><tr><th>Name</th><th>Credential</th></tr>";
        //output data of each row
        while($row = $result->fetch()){
            echo "<tr><td>".$row["Name"]."</td><td>".$row["Credential"]."</td></tr>";
        }
        echo "</table>";
    }

    ?>
</main>
</body>

</html>

