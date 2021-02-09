<?php
        session_start();
        require_once('connect.php');        
       
            if(isset($_POST['datechange']) && !empty($_POST['datechange'])
            && isset($_POST['floors']) &&!empty($_POST['floors'])
            && isset($_POST['position']) &&!empty($_POST['position'])
            && isset($_POST['price']) &&!empty($_POST['price'])){
                
                $id= strip_tags($_GET['id']);
                $datechange= strip_tags($_POST['datechange']);
                $floors= strip_tags($_POST['floors']);
                $position= strip_tags($_POST['position']);
                $price= strip_tags($_POST['price']);

                $sql = "UPDATE `projamp` SET `datechange`=:datechange , `floors`=:floors , `position`=:position , `price`=:price WHERE `id`=:id;";
                $query = $bdd->prepare($sql);
                $query->bindValue(':id',$id ,PDO::PARAM_INT);
                $query->bindValue(':datechange',$datechange ,PDO::PARAM_STR);
                $query->bindValue(':floors',$floors ,PDO::PARAM_INT);
                $query->bindValue(':position',$position ,PDO::PARAM_STR);
                $query->bindValue(':price',$price ,PDO::PARAM_STR);
                $query->execute();

                header('location: index.php');
           
        }
                            
            if(isset($_GET['id']) && !empty($_GET['id'])){
                $id = strip_tags($_GET['id']);
                $sql = "SELECT * FROM `projamp` WHERE `id`=:id;";        
                $query = $bdd->prepare($sql);        
                $query->bindValue(':id', $id, PDO::PARAM_INT);
                $query->execute();       
                $result = $query->fetch();
                
            }       
                require_once('close.php');
         ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<main>
        <div class="formulaire">
            <form method="POST" ACTION="" class="formstyle">
            <fieldset>
                <legend>Modification changement:</legend>
        <div>
            <label for="datechange">Date</label>
            <input type="date"  id="datechange" name="datechange" value="<?=$result['datechange']?>">
        </div>
        <div>
            <label for="floors">étage</label>
            <input type="text"  id="floors" name="floors" value="<?=$result['floors']?>">
        </div>
        <div>
            <label for="position">Position</label>
            <select name="position"  id="position" value="<?=$result['position']?>">
                <option VALUES="">choisissez une position</option>
                <option VALUES="right">Côté droit</option>
                <option VALUES="left">Côté gauche</option>
                <option VALUES="back">Au fond</option>
            </select >
        </div>
        <div>
            <label for="price">Prix</label>
                <input type="text" name="price" value="<?=$result['price']?>">
        </div>
            <input type="hidden" value="<?=$result['id']?>">
    <input type="submit" name="record" values="Valider" id="subbutton"></input>
    </form>
</div>
        </fieldset>
</main>
</body>
</html>