<?php
session_start();
isset($_SESSION['products']) ? $preSize = count($_SESSION['products']) : $preSize = 0; //on vérifie si on a ajouté un pruduit
$message =  isset($_SESSION['message']) ? $_SESSION['message'] : null;
/*$_SESSION['message'] =donné à partir de la méthode add "traitement.php" lorsque un prod ajouté*/
if ($message != null) { //si le message différent de null donc le produit est bien ajouté on affiche un message de success 
?>
    <script>
        window.onload = function message() {
            let message = document.createElement("div");
            message.innerHTML = "<i class='fa-solid fa-circle-check' style='color: #2eb224;'></i>" + " produit ajouté avec success";
            let parent = document.getElementById('message');
            parent.appendChild(message);
            setTimeout(() => {
                message.remove();
            }, 2000)
        }
    </script>
<?php
    unset($_SESSION['message']); //vider le message dans la session 
}; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Ajout produit</title>
</head>

<body class="container-fluid p-5 m-5">

    <div id=container>
        <div class="mb-3">
            <h1>Ajouter un produit</h1>
            <form action="traitement.php?action=add" method="post" enctype="multipart/form-data">
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
                    <input class="btn btn-primary" type="submit" name="submit" value="Ajouter le produit">
                </p>
            </form>
            <?php
            if (isset($_SESSION['totalQtt'])) { //méthode pour avoir le nombre de prdts ajoutés et l'afficher
                echo "<button type='button' class='btn btn-primary position-relative'>
                    <a class='navbar-brand' href='recap.php'text-white'><i class='fa-solid fa-cart-shopping' style='color: #eceff3;'></i> produits</a>
   <span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'>" . $_SESSION['totalQtt'] .
                    "<span class='visually-hidden'>unread messages</span>
   </span>
   </button>";
            } else { //si la session est vide donc on zéro prdts ajoutés
                $_SESSION['totalQtt'] = 0;
                echo "<button type='button' class='btn btn-primary position-relative'>
                <a class='navbar-brand' href='recap.php'text-white'><i class='fa-solid fa-cart-shopping' style='color: #eceff3;'></i> produits</a>
<span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'>0<span class='visually-hidden'>unread messages</span>
</span>
</button>";
            }
            ?>
            <p id="message"></p><!---ici on ajoute les message produit ajouté avec succes-->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>