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



