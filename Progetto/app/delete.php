<?php
require_once 'db.php';

$id = (int)($_GET['id'] ?? 0);

$stmt = $pdo->prepare("DELETE FROM incidents WHERE id = ?");
$stmt->execute([$id]);

header('Location: index.php');
exit;
