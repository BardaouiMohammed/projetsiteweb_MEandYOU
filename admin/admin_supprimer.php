<html>
<head>
<title>Supprission de produit</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
        center{
          
            height:80vh;
            display:flex;
            justify-content:center;
            align-items:center;
            font-size:35px;
        
        }
        span{
            background-color:#FF9966;
            border-radius:12px;
            padding: 0 20px;
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
	
		
		connexion();
		$sql="delete from produit where id_produit='".$_GET['id_produit']."'";
		$reponse = $bdd->query($sql);
		echo "<center> <span>Le produit de l'id : <strong>".$_GET['id_produit']."</strong> est supprimé avec succés</span></center>";
	?>
</body>
</html>