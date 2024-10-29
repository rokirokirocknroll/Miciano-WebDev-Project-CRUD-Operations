<?php
require 'db.php';

$query = "SELECT * FROM computers";
$stmt = $pdo->prepare($query);
$stmt->execute();
$computers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
<title>🖳Computer Shop Management🖳</title>
</head>
<body>
<?php include 'views/header.php'; ?>

<h2>🖥️Computer Inventory🖥️</h2>
<a href="add_computer.php">Add New Computer</a>
<table border="1">
<tr>
 <th>ID</th>
 <th>Model</th>
 <th>Brand</th>
 <th>Price</th>
 <th>Stock</th>
 <th>Actions</th>
</tr>
    <?php foreach ($computers as $computer): ?>
<tr>
 <td><?= $computer['id']; ?></td>
 <td><?= $computer['model']; ?></td>
 <td><?= $computer['brand']; ?></td>
 <td><?= $computer['price']; ?></td>
 <td><?= $computer['stock']; ?></td>
 <td>
 <a href="edit_computer.php?id=<?= $computer['id']; ?>">Edit</a>
 <a href="delete_computer.php?id=<?= $computer['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
  </td>
</tr>
    <?php endforeach; ?>
</table>

<?php include 'views/footer.php'; ?>
</body>
</html>