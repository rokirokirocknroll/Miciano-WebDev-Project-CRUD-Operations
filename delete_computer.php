<?php
require 'db.php';
$id = $_GET['id'];
$query = "DELETE FROM computers WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->execute(['id' => $id]);
header("Location: index.php");
?>