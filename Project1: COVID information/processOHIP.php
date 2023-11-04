<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Alisa Liu"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>processOHIP</title>
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
    //record a new vaccination
    $OHIP = $_POST['PatientOHIP'];

    $sql = "SELECT * FROM Patient WHERE OHIP=$OHIP";
    $result = $connection->query($sql);

    //if new patient
    if ($result->rowCount() == 0){ ?>
        <div class="title"> You have not been registered, please input your personal information! </div>

        <div class = "column">
        <form action="/A6/processInfo.php" method="post"> 
        
            <div class = "input">
            <p> OHIP Number </p>
            <input type="text" placeholder="0123456789" name="PatientOHIP">
            <p> First Name </p>
            <input type="text" placeholder="Alisa" name="FName">
            <p> Last Name </p>
            <input type="text" placeholder="Liu" name="LName">
            <p> Date of Birth</p>
            <input type="text" placeholder="YYYY-MM-DD" name="Birthday">
            </div>

            <div class = "submit">
            <input class = "button" type="submit" value = "Record a new vaccination">
            </div>
        </form>
        </div>
    <?php
    } else{ 
        echo "<div class = 'title'>You have been registered! Please click the button to register your vaccination if you want!</div>"; ?>
        <form action="/A6/processDirect.php" method="post">
            <div class = "submit">
            <input class = "button" type="submit" value = "Record Now!!!">
            </div>
        </form>
    <?php } ?>
    
</main>

</body>

</html>

