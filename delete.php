<?php
require_once('connect.php');

if(isset($_GET['id']) && !empty($_GET['id'])){
    try {
    $req = $bdd->prepare('DELETE FROM `projamp` WHERE `id` = :id');
    $req->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    
    $req->execute();
    } catch(Exception $e){
        echo 'erreur query :' .$e->getMessage();
    }

    header('Location: index.php');
} else{
    $erreur = 'désolé l\'ID n\'existe pas';
}

require_once('close.php');