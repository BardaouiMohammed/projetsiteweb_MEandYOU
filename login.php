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

connexion();

if (isset($_POST['email']) && isset($_POST['password'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql1 = "SELECT * FROM client WHERE email = :email AND password = :password";
        $stmt = $bdd->prepare($sql1);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the user is a regular client
        if ($user) {
            echo "Authentication successful. Welcome, " . $user['prenom'];
            header('Location:projet dev web/home1.html');
        } else {
            // Check if the user is an admin
            $sql2 = "SELECT * FROM admin WHERE email = :email AND password = :password";
            $stmt2 = $bdd->prepare($sql2);  // Fix: Use $sql2 instead of $sql1
            $stmt2->bindParam(':email', $email);
            $stmt2->bindParam(':password', $password);
            $stmt2->execute();

            $admin = $stmt2->fetch(PDO::FETCH_ASSOC);

            if ($admin) {
                echo "Authentication successful. Welcome, Admin " . $admin['admin_name'];  // Update admin_name to the actual column name
                header('Location:admin/admin_menu.php');
            } else {
                header('Location: login.html');
                alert('Authentication failed. Invalid email or password');
            }
        }
    }
}
?>
</body>
</html>
