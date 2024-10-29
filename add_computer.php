<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$model = $_POST['model'];
$brand = $_POST['brand'];
$price = $_POST['price'];
$stock = $_POST['stock'];

$query = "INSERT INTO computers (model, brand, price, stock) VALUES (:model, :brand, :price, :stock)";
$stmt = $pdo->prepare($query);
$stmt->execute(['model' => $model, 'brand' => $brand, 'price' => $price, 'stock' => $stock]);

header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>🖳Add Computer🖳</title>
</head>
<body>
<?php include 'views/header.php'; ?>

<h2>🖥️Add New Computer🖥️</h2>
<form method="POST" action="">
 Model: <input type="text" name="model" required><br>
Brand: <input type="text" name="brand" required><br>
Price: <input type="number" step="0.01" name="price" required><br>
Stock: <input type="number" name="stock" required><br>
<button type="submit">Add Computer</button>
</form>

<?php include 'views/footer.php'; ?>
</body>
</html>