<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        input {
            border-radius: 8px;
            margin: 10px;
        }
        span {
            color: black;
            background-color: white;
            border-radius: 7px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #f1b16c;
            color: #fdfbf8;
            cursor: pointer;
            margin-bottom: 10px;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #333;
        }
        .tab{
        background-color: #fdfbf8;
    }
    #clf {
        display:inline;
        background-color:#FF9966;
        border-radius:6px;
    }
    .lin{
        text-decoration:none;
        color: black;
            background-color: white;
            border-radius: 7px;

    }
    </style>
   
</head>

<body>
<?php include('../function.php'); 
?>
    <h1>welcome admin </h1>

    <p>
        <a href="admin_ajouter.php">Ajouter Produit</a>
        <a href="admin_chercher.php">Chercher Produit</a>
        <a href="admin_lister.php">lister Produit</a>
    </p>

    <center>

        <form action="admin_chercher.php" method="POST">
            <table>
                <tr>
                    <td><span style="padding: 1px 11px;">Mot Clé: </span> </td>
                    <td><input type="text" name="mc"></td>
                </tr>
            </table>
            <br>
            <input type="submit" value="Rechercher"> &nbsp;&nbsp;<input type="reset" value="Annuler">
        </form>
    </center>

    <?php
    if (isset($_POST['mc'])) {
        if (!empty($_POST['mc'])) {

            connexion();
            $mc = $_POST['mc'];

            $sql1 = "SELECT * FROM produit WHERE nom_produit = '$mc' OR category = '$mc'  OR price = '$mc'";
            $reponse = $bdd->query($sql1);

            $nbrDeLigne = $reponse->rowCount();
            echo "<center id='clf'> <b>Il y a " . $nbrDeLigne . " Produit(s)</b></center>";
            ?>

            <center>
                <table border="1" class="tab">
                    <tr bgcolor="#FF9966">
                        <th>id</th>
                        <th>nom</th>
                        <th>Catégorie</th>
                        <th>date d'ajout</th>
                        <th>prix</th>
                        <th>Modifier / Supprimer</th>
                    </tr>
                    <?php
                    while ($enreg = $reponse->fetch()) {
                    
                        $id = $enreg['id_produit'];
                        echo "<tr><td>" . $id . "</td>";
                        echo "<td>" . $enreg['nom_produit'] . "</td>";
                        echo "<td>" . $enreg['category'] . "</td>";
                        echo "<td>" . $enreg['date_ajout'] . "</td>";
                        echo "<td>" . $enreg['price'] . "</td>";
                        echo "<td><a class='lin' href='admin_modifier.php?id_produit=" . $id . "'>Modifier</a> 
                        &nbsp;<a class='lin' href='admin_supprimer.php?id_produit=" . $id . "'>Supprimer</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    
                    echo "<script>alert('Taper un mot cle');</script>";
                }
            } 
            ?>
</body>

</html>
