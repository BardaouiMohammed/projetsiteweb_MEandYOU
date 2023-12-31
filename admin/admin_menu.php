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
     
    </style>
</head>
<body>
    <h1>welcome admin </h1>
  
    <p>
        <a href="admin_ajouter.php">Ajouter Produit</a>
        <a href="admin_chercher.php">Chercher Produit</a>
        <a href="admin_lister.php">lister Produit</a>
    </p>

</body>
</html>