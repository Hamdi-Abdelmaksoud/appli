<?php
session_start();
isset($_SESSION['products'])?$preSize=count($_SESSION['products']):$preSize=0;
$message =  isset($_SESSION['message'])?$_SESSION['message'] : null;
echo $message;
unset($_SESSION['message']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Ajout produit</title>
</head>

<body class="container-fluid p-5 m-5">

<nav  class="navbar navbar-expand-lg bg-body-tertiary" >
                
                <?php
                if(isset($_SESSION['products']))
                {       
                   echo "<button type='button' class='btn btn-primary position-relative'>
                   <a class='navbar-brand' href='recap.php'text-white'>Voir mes produits</a>
  <span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'>".count($_SESSION['products']).
  "<span class='visually-hidden'>unread messages</span>
  </span>
</button>";
                  
                 }
                 else
                 
                 {       
                    echo "<button type='button' class='btn btn-primary position-relative'>
  nombre de produits 
   <span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'>".'0'.
   "<span class='visually-hidden'>unread messages</span>
   </span>
 </button>";
                   
                  }
                 ?>
                 
                 

            </nav>  
    <div class="mb-3">
   
        <h1>Ajouter un produit</h1>
        <form action="traitement.php?action=add"  method="post" enctype="multipart/form-data">
            <p class="input" >
                <label class="labelNom">Nom du produit :
                </label>
                <input class="inputNom" type="text" name="name" placeholder=" nom produit" class="form-control">
            </p>
            <p>
                <label class="labelPrice">
                    Prix du produit :
                </label>
                <input class="inputPrice" placeholder=" le prix" type="number" step="any" name="price" class="form-control">
            </p>
            <p>
                <label class="labelQtt">
                    Quantité désirée :
                </label>
                <input placeholder=" la quantité" class="inputQtt" type="number" name="qtt" value=" 1" class="form-control">
            </p>
            <p>
                <input  class="btn btn-primary" type="submit" name="submit" value="Ajouter le produit" >

            </p>
          
            
        </form>



    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>