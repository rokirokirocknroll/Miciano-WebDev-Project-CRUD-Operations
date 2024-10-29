<?php
require 'db.php';

$id = $_GET['id'];
$query = "SELECT * FROM computers WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->execute(['id' => $id]);
$computer = $stmt->fetch(PDO::FETCH_ASSOC);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$model = $_POST['model'];
$brand = $_POST['brand'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$query = "UPDATE computers SET model = :model, brand = :brand, price = :price, stock = :stock WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->execute(['model' => $model, 'brand' => $brand, 'price' => $price, 'stock' => $stock, 'id' => $id]);
header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>🖳Edit Computer🖳</title>
</head>
<body>
<?php include 'views/header.php'; ?>

<h2>🖥️Edit Computer🖥️</h2>
<form method="POST" action="">
Model: <input type="text" name="model" value="<?= $computer['model'] ?>" required><br>
Brand: <input type="text" name="brand" value="<?= $computer['brand'] ?>" required><br>
Price: <input type="number" step="0.01" name="price" value="<?= $computer['price'] ?>" required><br>
Stock: <input type="number" name="stock" value="<?= $computer['stock'] ?>" required><br>
<button type="submit">Update Computer</button>
</form>

<?php include 'views/footer.php'; ?>
</body>
</html>