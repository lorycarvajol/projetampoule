
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>historique</title>
</head>
<body>

    <header>
    <?php
    session_start();
        
        require_once('connect.php');
        $page = 6;
        $pagireq =$bdd->query('SELECT `id` FROM `projamp`');
        $pagiresult = $pagireq->rowcount();
        $pagestotales =ceil($pagiresult/$page);
        if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $pagestotales){
          $_GET['page'] = intval($_GET['page']);
          $pagecourante = $_GET['page'];          
        }else{
          $pagecourante = 1;
        }        
        $depart =($pagecourante-1)*$page;
        
        $sql = ('SELECT * FROM `projamp`ORDER BY `id` DESC LIMIT '.$page); 
        
        $query = $bdd->prepare($sql);
        $query->execute();
               
          
         ?>
        
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#"><img src="ampoule.png" width="40px" height="40px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          
          <li class="nav-item">
            <a class="nav-link" href="#">Historique</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="formulaire.php">Formulaire</a>
          </li>       
        </ul>
      </div>
    
  </header>
    
    <main class="container">
      <div class="row">
        <section class="col-12">
          <?php
            if(!empty($_SESSION['erreur'])){
              echo '<div class="alert alert-danger" role="alert">
                '.$_SESSION['erreur'].'
              </div ' ;
              $_SESSION['erreur'] ="";
            }   
          ?>
           <?php
            if(!empty($_SESSION['message'])){
              echo '<div class="alert alert-success" role="alert">
                '.$_SESSION['message'].'
              </div ' ;
              $_SESSION['message'] ="";
            }   
          ?>
          <h1>Historique des changements d'ampoules</h1>
          <table class="table">
            <thead>
                <th id="">ID</th>
                <th id="">Date</th>
                <th id="">étage</th>
                <th id="">Position</th>
                <th id="">Prix</th>
            </thead>
            <tbody>
              <?php
              foreach($query as $historique){
              ?>
                <tr>
                  <td><?= $historique['id'] ?></td>
                  <td><?= $historique['datechange'] ?></td>
                  <td><?= $historique['floors'] ?></td>
                  <td><?= $historique['position'] ?></td>
                  <td><?= $historique['price'] ?></td>
                  <td> <a href="edit.php?id=<?= $historique['id']; ?>"><button>Modifier</button></a><a> ou </a>  <a href="delete.php?id=<?= $historique['id']; ?>"><button>Supprimer</button></a></td>
                </tr>
              
              <?php
              };
              ?>
            </tbody>
          </table>
          
            </section>
            </div>
              <?php
              for($i=1;$i<=$pagestotales;$i++){
                if($i==$pagecourante){
                    echo $i.' ';
                }else{
                echo '<a href="index.php"?page='.$i.'">'.$i.'</a> ';
              }
              
            }
            require_once('close.php');  
           
                ?>
  
    </main>
    

 
</body>
</html>
session_destroy()