<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Ajout produit</title>
</head>

<body>
    <div id="container">
        <h1>Ajouter un produit</h1>
        <form action="traitement.php" method="post">
            <p class="input">
                <label class="labelNom">Nom du produit :
                </label>
                <input class="inputNom" type="text" name="name" placeholder=" nom produit">
            </p>
            <p>
                <label class="labelPrice">
                    Prix du produit :
                </label>
                <input class="inputPrice" placeholder=" le prix" type="number" step="any" name="price">
            </p>
            <p>
                <label class="labelQtt">
                    Quantité désirée :
                </label>
                <input palceholder=" la quantité" class="inputQtt" type="number" name="qtt" value="1">
            </p>
            <p>
                <input class='boutton ' type="submit" name="submit" value="Ajouter le produit">

            </p>
            <nav>
                <a href="recap.php">Voir mes produits</a>
                <?php
                if(isset($_SESSION['products']))
                {echo "<h3> le nombre de produit est " . count($_SESSION['products']) . "</h3>";
                 }
                 else
                 
                    {echo "<h3> aucun produit ajouter pour le moment </h3>";
                 }?>
            </nav>
        </form>



    </div>
</body>

</html>