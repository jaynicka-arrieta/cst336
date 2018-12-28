<?php
session_start();

include 'dbConnection.php';
$dbConn = startConnection("c9");

$username = $_POST['username'];
$password = sha1($_POST['password']);
                 
$sql = "SELECT * FROM fe_login
                 WHERE username = :username 
                 AND  password = :password ";                 
$np = array();
$np[':username'] = $username;
$np[':password'] = $password;

$stmt = $dbConn->prepare($sql);
$stmt->execute($np);
$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record
print_r($record);
if (empty($record)) {
    echo "<center><h1>Wrong username or password!!</h1></center>";
    echo "<center><button onclick='program1.php'> Try Again </button></center>";
} else {
   header('Location: welcome.php'); //redirects to another program
}
?>