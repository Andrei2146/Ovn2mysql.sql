<?php
require 'db.php';
$query = "SELECT * FROM members";
$stmt = $pdo->query($query);
$members = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Members</title>
</head>
<body>
    <h1>Members List</h1>
    <a href="add.php">Add New Member</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birthday</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Actions</th>
                </tr>
              </thead>
        <tbody>
        <?php if (count($members) > 0): ?>
            <?php foreach ($members as $member): ?>
         <tr>
                     <td><?= $member['id'] ?></td>
                    <td><?= htmlspecialchars($member['firstname']) ?></td>
                    <td><?= htmlspecialchars($member['lastname']) ?></td>
                    <td><?= $member['birthday'] ?></td>
                    <td><?= htmlspecialchars($member['phone']) ?></td>
                    <td><?= htmlspecialchars($member['email']) ?></td>
                        <td>
                            <a href="update.php?id=<?= $member['id'] ?>">Update</a>
                            <a href="delete.php?id=<?= $member['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                           </td>
                        </tr>
                     <?php endforeach; ?>
                     <?php else: ?>
                  <tr>
                      <td colspan="7">No members found.</td>
                       </tr>
                       <?php endif; ?>
                      </tbody>
                      </table>
                     </body>
                      </html>
