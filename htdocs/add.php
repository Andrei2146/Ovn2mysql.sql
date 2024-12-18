<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = "INSERT INTO members (firstname, lastname, birthday, phone, email) VALUES (:firstname, :lastname, :birthday, :phone, :email)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':firstname' => $_POST['firstname'],
        ':lastname' => $_POST['lastname'],
        ':birthday' => $_POST['birthday'],
        ':phone' => $_POST['phone'],
        ':email' => $_POST['email'],
    ]);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Member</title>
</head>
<body>
    <h1>Add New Member</h1>
    <form method="POST" action="">
       
    <input type="text" name="firstname" placeholder="First Name" required>
    
    <input type="text" name="lastname" placeholder="Last Name" required>
    
    <input type="date" name="birthday" required>
    
    <input type="text" name="phone" placeholder="Phone" required>
    
    <input type="email" name="email" placeholder="Email" required>
    
    <button type="submit">Add Member</button>
    
</form>
</body>
</html>
