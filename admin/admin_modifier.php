<html>
<head>
<title>Modifier un produit</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
       span {
        display:inline;
        background-color:#FF9966;
        border-radius:6px;
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
<?php 

	if(isset($_GET['id_produit']))
	{
		connexion();
		$sql1="select * from produit where id_produit='".$_GET['id_produit']."'";
		$reponse = $bdd->query($sql1);
		while($enreg = $reponse->fetch())
		{
?>
			<center>
			<h3 ><span>Modification du produit : <?php echo $_GET['id_produit'] ?></span></h3>
			<form action="admin_modifier.php" method="post">
			<table border="1">
			<tr><td bgcolor="#FF9966">Nom</td><td><input type="text" name="nom_produit" value="<?php echo $enreg['nom_produit']; ?>"></td></tr>
			<tr><td bgcolor="#FF9966">category</td><td><input type="text" name="category" placeholder='male/female' value=" <?php echo $enreg['category']; ?>"></td></tr>
			<tr><td bgcolor="#FF9966">date</td><td><input type="date" name="date_ajout" value="<?php echo $enreg['date_ajout']; ?>"></td></tr>
<tr><td bgcolor="#FF9966">Price</td><td><input type="text" name="price" value="<?php echo $enreg['price']; ?>"></td></tr>
</table>
<input type="submit" value="Modifier"> &nbsp;&nbsp;<input type="reset" value="Annuler">
<input type="hidden" name="id_produit" value="<?php echo $_GET['id_produit']; ?>"> <!-- Add this line -->
</form>
</center>
<?php
		}
    }
	// mise à jour de produit
	if(isset($_POST['nom_produit']) and isset($_POST['category']) and isset($_POST['date_ajout']) and isset($_POST['price']))
{
    connexion();
    $sql="update produit set nom_produit='".$_POST['nom_produit']."', category='".$_POST['category']."', price='".$_POST['price']."' where id_produit= '".$_POST['id_produit']."'";
    $bdd->exec($sql);
    echo '<center style= background-color:#FF9966; > Modification du produit <strong>'.$_POST['nom_produit'].'</strong> effectué avec succés </center>';
    
}
?>
</body>
</html>