<?php
session_start();
if (isset($_GET['action'])) 
{
    switch ($_GET['action']) {
            //*____________________________Ajouter un produit________________________________
        case "add":
            if (isset($_POST['submit'])) 
            {
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qtt = filter_input(INPUT_POST, 'qtt', FILTER_VALIDATE_INT);
                if ($name && $price && $qtt) 
                {
                    $product = [
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price * $qtt
                    ];
                    $_SESSION['products'][] = $product;
                    $_SESSION['message'] = "le produit " . $name . " a été bien ajouté";
                    $_SESSION['totalQtt']+=$qtt;
                    
                }
            }
            header("Location:index.php");
            break;
            //*__________________________supprimer produit____________________________________
        case "delete":
            unset($_SESSION['products'][$_GET['index']]); // On supprime un produit
            header("Location:recap.php");
            break;
            //*__________________________vider le panier____________________________________
        case "clear":
            unset($_SESSION['products']); // On supprime tous les  produits
            unset($_SESSION['totalQtt']);
            header("Location:index.php");
            break;
            //*__________________________augmenter la quantité d'un produit____________________________________
        case "up-qtt":
            $_SESSION['products'][$_GET['index']]['qtt']++;
            $_SESSION['totalQtt']++;
            $_SESSION['products'][$_GET['index']]['total'] += $_SESSION['products'][$_GET['index']]['price'];
            header("Location:recap.php");
            break;
            //*__________________________ diminuer la quantité d'un produit____________________________________
        case "down-qtt":
            if ($_SESSION['products'][$_GET['index']]['qtt'] > 1) 
            {
                $_SESSION['products'][$_GET['index']]['qtt']--;
                $_SESSION['products'][$_GET['index']]['total'] -= $_SESSION['products'][$_GET['index']]['price']; 
            } else 
            {
                unset($_SESSION['products'][$_GET['index']]);
            }
            $_SESSION['totalQtt']--;
            header("Location:recap.php");
            break;
    }
}
