<?php
require_once 'db.php';

$id = (int)($_GET['id'] ?? 0);

$stmt = $pdo->prepare("SELECT * FROM incidents WHERE id = ?");
$stmt->execute([$id]);
$incident = $stmt->fetch();

if (!$incident) {
    die("Incident not found.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare(
        "UPDATE incidents
         SET title = ?, category = ?, severity = ?, status = ?, description = ?
         WHERE id = ?"
    );

    $stmt->execute([
        $_POST['title'],
        $_POST['category'],
        $_POST['severity'],
        $_POST['status'],
        $_POST['description'],
        $id
    ]);

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Incident</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container small">
    <header>
        <div>
            <h1>Edit Incident</h1>
        </div>
    </header>

    <form method="post" class="panel form">
        <label>Title
            <input type="text" name="title" value="<?= htmlspecialchars($incident['title']) ?>" required>
        </label>

        <label>Category
            <select name="category">
                <?php foreach (['Malware','Phishing','Unauthorized Access','Data Leak','Other'] as $value): ?>
                    <option <?= $incident['category'] === $value ? 'selected' : '' ?>><?= $value ?></option>
                <?php endforeach; ?>
            </select>
        </label>

        <label>Severity
            <select name="severity">
                <?php foreach (['Low','Medium','High'] as $value): ?>
                    <option <?= $incident['severity'] === $value ? 'selected' : '' ?>><?= $value ?></option>
                <?php endforeach; ?>
            </select>
        </label>

        <label>Status
            <select name="status">
                <?php foreach (['Open','Resolved'] as $value): ?>
                    <option <?= $incident['status'] === $value ? 'selected' : '' ?>><?= $value ?></option>
                <?php endforeach; ?>
            </select>
        </label>

        <label>Description
            <textarea name="description" rows="6" required><?= htmlspecialchars($incident['description']) ?></textarea>
        </label>

        <div class="actions">
            <button class="button" type="submit">Save Changes</button>
            <a href="index.php">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>
