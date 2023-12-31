<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<?php include('function.php') ?>
<body>
<?php
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['sexe']) && isset($_POST['email']) && isset($_POST['tele']) && isset($_POST['password'])) {
        if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['sexe']) && !empty($_POST['email']) && !empty($_POST['tele']) && !empty($_POST['password'])) {
            connexion();
            $sql1 = "SELECT * FROM client WHERE email = ? AND password = ?";
            $stmt1 = $bdd->prepare($sql1);
            $stmt1->execute([$_POST['email'], $_POST['password']]);
            $donnees = $stmt1->fetch();

            if(empty($donnees)) {
                $newId = autoid();
                $sql2 = "INSERT INTO client (id, nom, prenom, sexe, email, tele, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt2 = $bdd->prepare($sql2);
                $stmt2->execute([$newId, $_POST['nom'], $_POST['prenom'], $_POST['sexe'], $_POST['email'], $_POST['tele'], $_POST['password']]);

                echo "Le client ".$_POST['nom']." est ajouté avec succès";
                header('Location: login.html');
            } else {
                echo "Le client existe déjà";
    
            }
        }
    }
?>
</body>
</html>