<?php
require_once 'db.php';

$incidents = $pdo->query("SELECT * FROM incidents ORDER BY created_at DESC")->fetchAll();
$total = count($incidents);
$open = count(array_filter($incidents, fn($i) => $i['status'] === 'Open'));
$high = count(array_filter($incidents, fn($i) => $i['severity'] === 'High'));
$resolved = count(array_filter($incidents, fn($i) => $i['status'] === 'Resolved'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Incident Tracker</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <header>
        <div>
            <h1>Cyber Incident Tracker</h1>
            <p>Monitor and manage security incidents.</p>
        </div>
        <a class="button" href="create.php">+ New Incident</a>
    </header>

    <section class="stats">
        <div class="card"><span>Total</span><strong><?= $total ?></strong></div>
        <div class="card"><span>Open</span><strong><?= $open ?></strong></div>
        <div class="card"><span>High Severity</span><strong><?= $high ?></strong></div>
        <div class="card"><span>Resolved</span><strong><?= $resolved ?></strong></div>
    </section>

    <section class="panel">
        <h2>Incidents</h2>
        <?php if (!$incidents): ?>
            <p class="empty">No incidents registered.</p>
        <?php else: ?>
            <div class="table-wrap">
                <table>
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Severity</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($incidents as $incident): ?>
                        <tr>
                            <td><?= htmlspecialchars($incident['title']) ?></td>
                            <td><?= htmlspecialchars($incident['category']) ?></td>
                            <td><span class="badge <?= strtolower($incident['severity']) ?>"><?= htmlspecialchars($incident['severity']) ?></span></td>
                            <td><?= htmlspecialchars($incident['status']) ?></td>
                            <td><?= htmlspecialchars($incident['created_at']) ?></td>
                            <td>
                                <a href="edit.php?id=<?= $incident['id'] ?>">Edit</a>
                                <a class="danger-link" href="delete.php?id=<?= $incident['id'] ?>" onclick="return confirm('Delete this incident?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </section>
</div>
</body>
</html>
