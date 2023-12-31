<html>
<head>
<title>Lister les produits</title>
<style>
body {
            text-align: center;
            background-image: url('../img/background.jpeg');
        }

        p {
            display: flex;
            justify-content: space-evenly;
        }

        p a {
            text-decoration: none;
            color: black;
            background-color: white;
            border-radius: 12px;
            padding: 8px 12px;
            transition: background-color 0.3s, color 0.3s;
        }

        p a:hover , .lin:hover{
            background-color: #333;
            color: #e4ceb6;
        }
      center form  span{
        background-color: white;
        padding: 0px 12px;
        border-radius:12px;
      }
      input[type="submit"] {
            background-color: #f1b16c;
            border-radius:12px;
            color: #fdfbf8;
            cursor: pointer;
            margin-bottom: 10px;
        }

        input[type="submit"]:hover {
            background-color: #333;
        }
        table{
            background-color:white;
        }
        </style>
</head>
<body>
<?php include('../function.php'); ?>
<h1>welcome admin </h1>

<p>
    <a href="admin_ajouter.php">Ajouter Produit</a>
    <a href="admin_chercher.php">Chercher Produit</a>
    <a href="admin_lister.php">lister Produit</a>
</p>

<center>
    <p>
        <form name="trie" action="admin_lister.php" method="post">
            <span>name</span><input type="radio" name="t" value="nom"> &nbsp;&nbsp;
            <span>category</span> <input type="radio" name="t" value="category">&nbsp;&nbsp;
            <span>date</span> <input type="radio" name="t" value="date_produit">&nbsp;&nbsp;
            <span>price</span> <input type="radio" name="t" value="price">
    </p>

    <p><input type="submit" value="Afficher & Trier"></p>
    </form>

    <?php
    $varRech = '';

    if (isset($_POST['t'])) {
        switch ($_POST['t']) {
            case 'nom':
                $varRech = 'nom_produit';
                break;
            case 'category':
                $varRech = 'category';
                break;
            case 'date_produit':
                $varRech = 'date_ajout';
                break;
            case 'price':
                $varRech = 'price';
                break;
        }


        connexion();
        $sql = 'select * from produit order by '.$varRech;
        $reponse = $bdd->query($sql);
        echo "<table border=1 >";
        echo "<tr><th bgcolor=\"#FF9966\">id_produit</th><th bgcolor=\"#FF9966\">name_produit</th><th bgcolor=\"#FF9966\">category</th><th bgcolor=\"#FF9966\">date_d'ajout</th><th bgcolor=\"#FF9966\">Price</th></tr>";
        while ($enreg = $reponse->fetch()) {
            $id = $enreg['id_produit'];
            echo "<tr>
            <td>" . $enreg['id_produit'] . "</td>
            <td>" . $enreg['nom_produit'] . "</td>
            <td>" . $enreg['category'] . "</td>
            <td>" . $enreg['date_ajout'] . "</td>
            <td>" . $enreg['price'] . "</td>
            </tr>";

        }
        echo "</table>";
    }
    ?>
</center>
</body>
</html>
