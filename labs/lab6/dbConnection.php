<?php
    function getDatabaseConnection($dbName = 'ottermart') {
        $host = "localhost";
        $username = "root";
        $password = "";
        
        $dbConn = new PDO("mysql:host=$host; dbName=$dbName" ,$username, $password);
        
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $dbConn;
    }
    
?>