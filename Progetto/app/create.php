<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare(
        "INSERT INTO incidents (title, category, severity, status, description)
         VALUES (?, ?, ?, ?, ?)"
    );

    $stmt->execute([
        $_POST['title'],
        $_POST['category'],
        $_POST['severity'],
        $_POST['status'],
        $_POST['description']
    ]);

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Incident</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container small">
    <header>
        <div>
            <h1>New Incident</h1>
            <p>Register a security incident.</p>
        </div>
    </header>

    <form method="post" class="panel form">
        <label>Title
            <input type="text" name="title" required>
        </label>

        <label>Category
            <select name="category">
                <option>Malware</option>
                <option>Phishing</option>
                <option>Unauthorized Access</option>
                <option>Data Leak</option>
                <option>Other</option>
            </select>
        </label>

        <label>Severity
            <select name="severity">
                <option>Low</option>
                <option>Medium</option>
                <option>High</option>
            </select>
        </label>

        <label>Status
            <select name="status">
                <option>Open</option>
                <option>Resolved</option>
            </select>
        </label>

        <label>Description
            <textarea name="description" rows="6" required></textarea>
        </label>

        <div class="actions">
            <button class="button" type="submit">Create Incident</button>
            <a href="index.php">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>
