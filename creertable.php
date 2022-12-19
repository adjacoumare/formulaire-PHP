<?php
    $servername = 'localhost';
    $dbname = 'formulairephp';
    $username = 'root';
    $password = '';
    
    try{
        $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $form = "CREATE TABLE form(
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nom TEXT,
            prenom TEXT,
            mail TEXT,
            age INT,
            sexe TEXT,
            pays TEXT)";
        $dbco->exec($form);
        echo 'Table créée avec succès!';
    }
    
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
  ?>