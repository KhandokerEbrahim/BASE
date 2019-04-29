<?php

$TrainNo = $_POST['TrainNo'];
$TrainName = $_POST['TrainName'];
$StartingPlace = $_POST['StartingPlace'];
$EndingPlace = $_POST['EndingPlace'];
$Time = $_POST['Time'];
$AddNewTrain = $_POST['AddNewTrain'];
$AddNewCompertment = $_POST['AddNewCompertment'];
$AddNewSeat = $_POST['AddNewSeat'];
$Class = $_POST['Class'];
 
if (!empty($TrainNo) || !empty($TrainName) || !empty($StartingPlace) || !empty($AddNewTrain) || !empty($Time) || !empty($AddNewTrain)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "train";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT TrainNo From TrainDetails Where TrainNo = ? Limit 1";
     $INSERT = "INSERT Into TrainDetails (TrainNo, TrainName, StartingPlace, EndingPlace, Time, AddNewTrain,AddNewCompertment,AddNewSeat,Class) values(?, ?, ?, ?, ?, ?,?,?,?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("i", $TrainNo);
     $stmt->execute();
     $stmt->bind_result($TrainNo);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("issssssss", $TrainNo, $TrainName, $StartingPlace, $EndingPlace, $Time, $AddNewTrain,$AddNewCompertment,$AddNewSeat,$Class);
      $stmt->execute();
      echo "Congratulation Train Updated";
     } else {
      echo "Server Is bussy";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}

?>