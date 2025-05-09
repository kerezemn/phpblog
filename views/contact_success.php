<?php

if (!isset($_SESSION['contact_form'])) {
    // if there's not session yet redirect to the contact page
    header('Location: /contact');
    exit;
}

$form_data = $_SESSION['contact_form'];

// unsetting session for not to display again
unset($_SESSION['contact_form']);
?>

<div class="container mt-4" style="max-width: 600px;">
    <div class="alert alert-success" role="alert">Mesajınız başarıyla gönderildi!</div>
    <p><strong>Ad:</strong> <?= htmlspecialchars($form_data['ad']) ?></p>
    <p><strong>Soyad:</strong> <?= htmlspecialchars($form_data['soyad']) ?></p>
    <p><strong>E-posta:</strong> <?= htmlspecialchars($form_data['email']) ?></p>
    <p><strong>Telefon:</strong> <?= htmlspecialchars($form_data['tel']) ?></p>
    <p><strong>Konu:</strong> <?= htmlspecialchars($form_data['konu']) ?></p>
    <p><strong>Mesaj:</strong> <?= nl2br(htmlspecialchars($form_data['mesaj'])) ?></p>
</div>
