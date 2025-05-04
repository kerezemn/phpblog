<?php
if (!is_user_logged()) {
    header("Location: /login", true, 301);
    exit;
};

// Collect messages
$db = new PDO('sqlite:' . __DIR__ . '/../db.sqlite3');

$stmt = $db->query("SELECT * FROM contact_messages ORDER BY created_at DESC");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-3">
    Hoşgeldin, <?= $valid_username ?>!

    <?php if (count($messages) === 0): ?>
        <div class="alert alert-info">Hiç mesaj bulunamadı.</div>

    <?php else: ?>
        <div class="overflow-auto" style="max-width: 100%;">
            <table class="table table-bordered table-striped mt-3 text-nowrap">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Ad Soyad</th>
                        <th>E-posta</th>
                        <th>Telefon</th>
                        <th>Konu</th>
                        <th>Mesaj</th>
                        <th>Tarih</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($messages as $msg): ?>
                        <tr>
                            <td><?= htmlspecialchars($msg['id']) ?></td>
                            <td><?= htmlspecialchars($msg['ad'] . ' ' . $msg['soyad']) ?></td>
                            <td><?= htmlspecialchars($msg['email']) ?></td>
                            <td><?= htmlspecialchars($msg['tel']) ?></td>
                            <td><?= htmlspecialchars($msg['konu']) ?></td>
                            <td><?= nl2br(htmlspecialchars($msg['mesaj'])) ?></td>
                            <td><?= htmlspecialchars($msg['created_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <?php endif; ?>
</div>