
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="style.css">
    

    <title>formulaire</title>
</head>
<body>

<?php
 session_start();
$bdd=new PDO('mysql:host=localhost;dbname=ampoule','root');

if(isset($_POST['record'])){

$stmt=$bdd->prepare("INSERT INTO `projamp`(`id` , `datechange` , `floors` , `position` , `price`) VALUES (NULL, :datechange , :floors , :position,  :price )");

 $stmt->bindParam(':datechange',$_POST['datechange']);
 $stmt->bindParam(':floors',$_POST['floors']);
 $stmt->bindParam(':position',$_POST['position']);
 $stmt->bindParam(':price',$_POST['price']);
 $stmt->execute();
 echo 'Entrée valider';
}
   
  
   
 ?>
    <header>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="ampoule.png" width="40px" height="40px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      
      <li class="nav-item">
        <a class="nav-link" href="index.php">Historique</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="formulaire.php">Formulaire</a>
      </li>
      
    </ul>
  </div>
    </header>
    <main>
        <div class="formulaire">
            <form method="POST" ACTION="" class="formstyle">
              <fieldset>
                <legend>Entrée changement:</legend>
        <div>
            <label for="datechange">Date:</label>
            <input type="date"  id="datechange" name="datechange">
        </div>
        <div>
        <label for="floors">Etage:</label>
            <select name="floors"  id="floors">
                <option VALUES="">choisissez un étage</option>
                <option VALUES="1">1</option>
                <option VALUES="2">2</option>
                <option VALUES="3">3</option>
                <option VALUES="4">4</option>
                <option VALUES="5">5</option>
                <option VALUES="6">6</option>
                <option VALUES="7">7</option>
                <option VALUES="8">8</option>
                <option VALUES="9">9</option>
                <option VALUES="10">10</option>
                <option VALUES="11">11</option>                
            </select >
        </div>
        <div>
            <label for="position">Position:</label>
            <select name="position"  id="position">
                <option VALUES="">choisissez une position</option>
                <option VALUES="right">Côté droit</option>
                <option VALUES="left">Côté gauche</option>
                <option VALUES="back">Au fond</option>
            </select >
        </div>
        <div>
            <label for="price">Prix:</label>
                <input type="text" name="price">
        </div>
</fieldset>
    <input type="submit" name="record" values="Valider" id="subbutton"></input>
    </form>
</div>
</main>


</body>
</html>