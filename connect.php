<?php
try{
        $bdd = new PDO('mysql:host=localhost;dbname=ampoule','root');
        $bdd->exec('SET NAMES utf-8');
} 
catch(PDOException $e){
    echo 'erreur: '.$e->getMessage();
    die();
}
