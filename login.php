<?php 
session_start();

$uname=$_POST["uname"];
$pass=$_POST["pass"];

$h ="localhost";
$u ="root";
$p ="";
$db ="test1";

$conn = mysqli_connect($h,$u,$p,$db);

if (!$conn) {
    echo "Not COnnected". mysqli_connect_error();
} 

$sql = "SELECT * FROM `users` WHERE `username` = '$uname' AND `password` = '$pass'";

$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result)>0) {
    $_SESSION["uname"] = $uname;
    $_SESSION["pass"] = $pass;
    header("Location: index.php");
} else {
    echo "Invalid Credentials <a href='login.html'>Try Again</a>";
}




mysqli_close($conn);

?>