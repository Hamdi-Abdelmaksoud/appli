<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif des produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    if (!isset($_SESSION['products']) || empty($_SESSION['products'])) 
    {
        /*pas encore de prdts ajoutés on demande le retour à la page index pour ajouter un   */
         echo "<p>Vous n'avez pas encore ajouté un produit</p> <a href='index.php' style='text-decoration:none'>ajouter un produit <i class='fa-solid fa-rotate-left' style='color: #1a57c1;'></i></a>";
    } else
    {//on affiche les prdts
        echo "<table class='table table-bordered table-dark ' >",
        "<thead>",
        "<tr>",
        //  "<th scope='col'><a href='index.php'><button class='btn btn-primary'>Ajouter des produits</button></a></th>",
        "<th scope='col'>Nom</th>",
        "<th scope='col'>Prix</th>",
        "<th scope='col'>Quantité</th>",
        "<th scope='col'>Total</th>",
        "</tr>",
        "</thead>",
        "<tbody>";
        $totalGeneral = 0;//intialisation du prix de la facture
        foreach ($_SESSION['products'] as $index => $product)
         {
        
            echo "<tr scope='row'>",
           
            /*aprés afficher les prdts on donne le client la possibilité de supprimer le prdt qu'il veut,
             on envoyons l'index à la méthode delete(traitement.php) pour connaitre le prdt visé  */
            // "<td >" ."<a href='traitement.php?action=delete&index=$index'><i class='fa-solid fa-circle-xmark'></i></a>" . "</td>",
            "<td>" ."<a href='traitement.php?action=delete&index=$index'><i class='fa-solid fa-circle-xmark'></i></a> ". $product['name'] . "</td>",
            "<td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
            //on donne la possibilité d'ajouter ou diminuer qqt d'un prdt on envoyons l'index à down-qtt ou up-qtt (traitement.php)
            "<td>" ."<a href='traitement.php?action=down-qtt&index=$index'><i class='fa-solid fa-circle-minus'></i></a>  ". $product['qtt'] ."   <a href='traitement.php?action=up-qtt&index=$index'><i class='fa-solid fa-circle-plus'></i></a> " ."</td>",
            
        "<td>" . number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
        
            "</tr>";
            $totalGeneral += $product['total'];//calcul de la facture
        }
        echo "<tr scope='row'>",
        //on donne la possibilité de supprimer tous les prdts 
        "<td><a href='traitement.php?action=clear'><i class='fa-solid fa-trash'></i>vider <a></td>",
        "<td colspan=2>Total général : </td>",
        "<td><strong>" . number_format($totalGeneral, 2, ".", "&nbsp") . "&nbsp;€</strong></td>",
        
        "</tr>",
        "</tbody>",
        "</table>";
    } 
    ?>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> 

</body>

</html>