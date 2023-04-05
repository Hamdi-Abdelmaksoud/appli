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
    if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
        echo "<p>Aucun produit en session ...</p>";
    } else {
        echo "<table class='table table-bordered table-dark m-2' >",
        "<thead>",
        "<tr>",
        //  "<th scope='col'>qtt-</th>",
        "<th scope='col'>#</th>",
        "<th scope='col'>Nom</th>",
        "<th scope='col'>Prix</th>",
        "<th scope='col'>Quantité</th>",
        "<th scope='col'>Total</th>",
        // "<th scope='col'>qtt+</th>",
        "</tr>",
        "</thead>",
        "<tbody>";
        $totalGeneral = 0;
        foreach ($_SESSION['products'] as $index => $product) {
        
            echo "<tr scope='row'>",
           
            "<td >" ."<a href='traitement.php?action=delete&index=$index'><i class='fa-solid fa-circle-xmark'></i></a>" . "</td>",
            "<td>" . $product['name'] . "</td>",
            "<td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
            "<td>" ."<a href='traitement.php?action=down-qtt&index=$index'><i class='fa-solid fa-circle-minus'></i></a>  ". $product['qtt'] ."   <a href='traitement.php?action=up-qtt&index=$index'><i class='fa-solid fa-circle-plus'></i></a> " ."</td>",
            "<td>" . number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
        
            "</tr>";
            $totalGeneral += $product['total'];
        }
        echo "<tr scope='row'>",
        "<td><a href='traitement.php?action=clear'><i class='fa-solid fa-trash'></i>vider <a></td>",
        "<td colspan=3>Total général : </td>",
        "<td><strong>" . number_format($totalGeneral, 2, ".", "&nbsp") . "&nbsp;€</strong></td>",
        
        "</tr>",
        "</tbody>",
        "</table>";
    } ?>
    <a href="index.php"><button class="btn btn-primary">Ajouter des produits</button></a> 

</body>

</html>