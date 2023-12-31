<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

 <?php include('function.php'); ?>

</head>
<body>
    <?php
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
            connexion();
                
            $newId = autoidcontact();
            $sql2 = "INSERT INTO contact (idcont, name, email, tel, message) VALUES (?, ?, ?, ?, ?)";
            $stmt2 = $bdd->prepare($sql2);
            $stmt2->execute([$newId, $_POST['name'], $_POST['email'], $_POST['tel'], $_POST['message']]);


            echo "<script>alert('The message has been added successfully')</script>";
           
        } else {

            echo "<script>alert('Please fill in all required fields.')</script>";
        }
    } else {
        echo "<script>alert('Invalid request.')</script>";
     
    }
?>

</body>
</html>