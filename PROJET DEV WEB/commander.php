<?php
include('../function.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $cin = $_POST["cin"];
    $adresse = $_POST["adresse"];
    $quantity = $_POST["quantite"];
    $totalAmount = $_POST["montantTotal"];

   connexion();
    // Insert data into the database
    $sql = "INSERT INTO orders (cin,nom, email, telephone, adresse, quantity, total_amount)
            VALUES ( '$cin','$nom', '$email', '$telephone', '$adresse', '$quantity', '$totalAmount')";

    if ($bdd->query($sql) == TRUE) {
        echo "<h2>Order placed successfully!</h2>";
        header('Location:home1.html');
    } else {
        echo "Error: " . $sql . "<br>" . $bdd->error;
    }

} else {
    
    echo "Invalid access!";
}
?>
