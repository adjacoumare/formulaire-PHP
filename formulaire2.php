<?php
    $servername = "localhost";
    $dbname = "formulairephp";
    $username = "root";
    $password = "";
    
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $mail = $_POST["mail"];
    $age = $_POST["age"];
    $sexe = $_POST["sexe"];
    $pays = $_POST["pays"];
    
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //On insère les données reçues
        $sth = $dbco->prepare("
            INSERT INTO form(nom, prenom, mail, age, sexe, pays)
            VALUES(:nom, :prenom, :mail, :age, :sexe, :pays)");
        $sth->bindParam(':nom',$nom);
        $sth->bindParam(':prenom',$prenom);
        $sth->bindParam(':mail',$mail);
        $sth->bindParam(':age',$age);
        $sth->bindParam(':sexe',$sexe);
        $sth->bindParam(':pays',$pays);
        $sth->execute();
        
        //On renvoie l'utilisateur vers la page de remerciement
        header("Location:form-merci.html");
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>