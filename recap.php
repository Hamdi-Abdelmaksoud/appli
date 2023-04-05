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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
        echo "<p>Aucun produit en session ...</p>";
    } else {
        echo "<table class='table'",
        "<thead>",
        "<tr>",
        "<th>qtt-</th>",
        "<th 'scope=col'>#</th>",
        "<th 'scope=col'>Nom</th>",
        "<th 'scope=col'>Quantité</th>",
        "<th 'scope=col'>Prix</th>",
        "<th 'scope=col'>Total</th>",
        "<th>qtt+</th>",
        "</tr>",
        "</thead>",
        "<tbody>";
        $totalGeneral = 0;
        foreach ($_SESSION['products'] as $index => $product) {
            echo "<tr>",
            "<td> <a href='traitement.php?action=down-qtt'><button><i class='fa-solid fa-square-minus'></i></button></a></td>",
            "<td 'row'>" . $index+1 . "</td>",
            "<td>" . $product['name'] . "</td>",
            "<td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
            "<td>" . $product['qtt'] . "</td>",
            "<td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
            "<td> <a href='traitement.php?action=up-qtt'><button><i class='fa-solid fa-plus'></i></button></a></td>",
            "</tr>";
            $totalGeneral += $product['total'];
        }
        echo "<tr>",
        "<td colspan=4>Total général : </td>",
        "<td><strong>" . number_format($totalGeneral, 2, ".", "&nbsp") . "&nbsp;€</strong></td>",
        "</tr>",
        "</tbody>",
        "</table>";
    } ?>
    <a href="index.php">Ajouter un produit</a>
<!--    
    <a href="traitement.php?action=clear"><button><i class="fa-solid fa-trash"></i></button></a> -->

</body>

</html>