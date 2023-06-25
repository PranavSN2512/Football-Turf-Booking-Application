<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$time = $_POST['time'];
$date = $_POST['date'];

//dbconnection

$conn = new mysqli('localhost', 'root', '', 'footballground');
$date=date("d-m-y");
$time=date("h:i:a");
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into booking(name,phone,email,time,date) values(?,?,?,?,?)");
    $stmt->bind_param("sisss", $name, $phone, $email, $time, $date);
    $stmt->execute();
    echo "BOOKING SUCCESSFUL";
    $stmt->close();
    $conn->close();
}
?>