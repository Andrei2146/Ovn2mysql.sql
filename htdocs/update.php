<?php
require 'db.php';

$id = $_GET['id'];
$query = "SELECT * FROM members WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->execute([':id' => $id]);
$member = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = "UPDATE members SET firstname = :firstname, lastname = :lastname, birthday = :birthday, phone = :phone, email = :email WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':firstname' => $_POST['firstname'],
        ':lastname' => $_POST['lastname'],
        ':birthday' => $_POST['birthday'],
        ':phone' => $_POST['phone'],
        ':email' => $_POST['email'],
        ':id' => $id,
    ]);

    
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Member</title>
</head>
<body>
    <h1>Update Member</h1>
    <form method="POST" action="">
        
    
    <input type="text" name="firstname" value="<?= htmlspecialchars($member['firstname']) ?>" required>
    
    <input type="text" name="lastname" value="<?= htmlspecialchars($member['lastname']) ?>" required>
    
    <input type="date" name="birthday" value="<?= $member['birthday'] ?>" required>
    
    <input type="text" name="phone" value="<?= htmlspecialchars($member['phone']) ?>" required>
    
    <input type="email" name="email" value="<?= htmlspecialchars($member['email']) ?>" required>
    
    <button type="submit">Update Member</button>
    </form>
</body>
</html>
