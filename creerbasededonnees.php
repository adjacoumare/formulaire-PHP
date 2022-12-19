<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    
    try{
        $dbco = new PDO("mysql:host=$servername", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "CREATE DATABASE formulairephp";
        $dbco->exec($sql);
        
        echo 'Base de données créée avec succès !';
    }
    
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
?>