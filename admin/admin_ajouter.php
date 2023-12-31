<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
        text-align:center;
        background-image: url('../img/background.jpeg');
        }
        p{
            display:flex;
            justify-content:space-evenly;
        }
        p a {
            text-decoration: none;
            color: black;
            background-color: white;
            border-radius: 12px;
            padding: 8px 12px;
            transition: background-color 0.3s, color 0.3s;
        }

        p a:hover {
            background-color: #333;
            color: #e4ceb6;
        }
        input{
            border-radius:8px;
            margin:10px;
        }
        table{
            display:flex;
            height:70vh;
            justify-content:center;
            align-items:center;

        }
        th  span{
            color: black;
            background-color: white;
            border-radius: 7px;
        }
        
        
        input[type="submit"] ,input[type="reset"] {
            background-color: #f1b16c;
            color: #fdfbf8;
            cursor: pointer;
            margin-bottom:12px;

        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #333;
        }
        label{
            font-weight:bolder;
            color: white;
        }
    </style>
</head>

<body>
<?php include('../function.php');?>
<h1>welcome admin </h1>
  
<p>
        <a href="admin_ajouter.php">Ajouter Produit</a>
        <a href="admin_chercher.php">Chercher Produit</a>
        <a href="admin_lister.php">lister Produit</a>
    </p>

 
    <form action="admin_ajouter.php" method="Post">
        <table >
    <tr>
        <th><span style="padding:0 24px;">Nom:</span></th>
        <td><input type="text" name="nom"></td>
    </tr>
    <tr>
        <th><span style="padding:0 11px;">categorie:</span></th>
        <td><input type="radio" name="cat" id="male" value="male"> <label for="male"> male</label> <input type="radio" name="cat" id="femal" value="female"> <label for="female"> female</label></td>
    </tr>
	
	<tr>
         <th><span style="padding:0 5px;">date d'ajout:</span></th>
        <td><input type="date" name="date_ajout" style="padding:0 31px;"></td>
    </tr>
	<tr>
        <th><span style="padding:0 24px;">Prix:</span></th>
        <td><input type="text" name="prix"></td>
    </tr>
    <tr>
         <td colspan="2"> <input type="submit" value="Ajouter"> <input type="reset" value="Effacer"></td>
       
       
    </tr>
       </table>
      
    </form>

</body>
<?php
if(isset($_POST['nom']) and isset($_POST['cat']) and isset($_POST['date_ajout'])  and isset($_POST['prix']))
{
    if(!empty($_POST['nom']) and !empty($_POST['cat']) and !empty($_POST['date_ajout'])  and !empty($_POST['prix'])){
       connexion();
        $sql1="select * from produit where category='".$_POST['cat']."'";
		$reponse = $bdd->query($sql1);
	    $donnees = $reponse->fetch();
  if(empty($donnees)){
    
        $id=autoidproduit();
        $sql = "INSERT INTO produit (id_produit, nom_produit, category, date_ajout, price) VALUES ('$id', '" . $_POST['nom'] . "', '" . $_POST['cat'] . "', '" . $_POST['date_ajout'] . "', '" . $_POST['prix'] . "')";
$bdd->exec($sql);
             
        echo "<script>alert('Le produit".$_POST['nom']." est ajouté avec succés')</script>";
        header('Location: admin_menu.php');
  }else
  echo "<script>alert('Le produit".$_POST['nom']." est ajouté avec succés')</script>";
    }
}
?>

</html>