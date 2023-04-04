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

<body>

                
    <div id="container" class="mb-3">
   
        <h1>Ajouter un produit</h1>
        <form action="traitement.php" method="post">
            <p class="input">
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
                <input class='boutton ' type="submit" name="submit" value="Ajouter le produit" >

            </p>
            <nav>
                <a href="recap.php">Voir mes produits</a>
                <?php
                if(isset($_SESSION['products']))
                {       
                    echo "<h3> le nombre de produit est " . 
                    count($_SESSION['products']) . "</h3>";
                 }
                 else
                 
                {echo "<h3> aucun produit ajouter
                         pour le moment </h3>";
                 }
            
                 ?>
                 
                 

            </nav>
            
        </form>



    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>