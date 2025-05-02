<?php

// connect db
$db = new PDO('sqlite:' . __DIR__ . '/../db.sqlite3');

// handle form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ad    = $_POST['ad'] ?? '';
    $soyad = $_POST['soyad'] ?? '';
    $email = $_POST['email'] ?? '';
    $tel   = $_POST['tel'] ?? '';
    $konu  = $_POST['konu'] ?? '';
    $mesaj = $_POST['mesaj'] ?? '';

    // Basit validation (dilersen genişletebilirsin)
    if ($ad && $soyad && $email && $mesaj) {
        $stmt = $db->prepare("INSERT INTO contact_messages (ad, soyad, email, tel, konu, mesaj)
                              VALUES (:ad, :soyad, :email, :tel, :konu, :mesaj)");
        $stmt->execute([
            ':ad'    => $ad,
            ':soyad' => $soyad,
            ':email' => $email,
            ':tel'   => $tel,
            ':konu'  => $konu,
            ':mesaj' => $mesaj
        ]);
    }
}
?>

<div class="container mt-3">
    <form method="POST" class="mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-info-subtle">
                <h5 class="card-title text-center">İletişim Formu</h5>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="ad" class="form-label">Ad</label>
                        <input type="text" class="form-control" id="ad" name="ad" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="soyad" class="form-label">Soyad</label>
                        <input type="text" class="form-control" id="soyad" name="soyad" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-posta</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="tel" class="form-label">Telefon Numarası</label>
                    <input type="tel" class="form-control" id="tel" name="tel">
                </div>

                <div class="mb-3">
                    <label for="konu" class="form-label">Konu</label>
                    <select class="form-select" id="konu" name="konu">
                        <option value="Öneri">Öneri</option>
                        <option value="Şikayet">Şikayet</option>
                        <option value="Soru">Soru</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="mesaj" class="form-label">Mesaj</label>
                    <textarea class="form-control" id="mesaj" name="mesaj" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Gönder</button>
            </div>
        </div>
    </form>
</div>
