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

<div id="app" class="container mt-3" style="max-width: 800px;">
    <form ref="iletisimForm" method="POST" @submit.prevent="handleSubmit" class="mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-light">
                <h5 class="card-title">İletişim Formu</h5>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="ad" class="form-label">Ad</label>
                        <input type="text" name="ad" class="form-control" id="ad" v-model="form.ad">
                        <div v-if="errors.ad" class="text-danger">{{ errors.ad }}</div>
                    </div>
                    
                    <div class="mb-3 col-md-6">
                        <label for="soyad" class="form-label">Soyad</label>
                        <input type="text" name="soyad" class="form-control" id="soyad" v-model="form.soyad">
                        <div v-if="errors.soyad" class="text-danger">{{ errors.soyad }}</div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-posta</label>
                    <input type="text" name="email" class="form-control" id="email" v-model="form.email">
                    <div v-if="errors.email" class="text-danger">{{ errors.email }}</div>
                </div>

                <div class="mb-3">
                    <label for="tel" class="form-label">Telefon Numarası</label>
                    <div class="input-group">
                        <span class="input-group-text">0</span>
                        <input type="text" name="tel" class="form-control" id="tel" v-model="form.tel" maxlength="10">
                    </div>
                    <div v-if="errors.tel" class="text-danger">{{ errors.tel }}</div>
                </div>

                <div class="mb-3">
                    <label for="konu" class="form-label">Konu</label>
                    <select class="form-select" name="konu" id="konu" v-model="form.konu">
                        <option>Öneri</option>
                        <option>Şikayet</option>
                        <option>Soru</option>
                    </select>

                    <div v-if="errors.konu" class="text-danger">{{ errors.konu }}</div>
                </div>

                <div class="mb-3">
                    <label for="mesaj" class="form-label">Mesaj</label>
                    <textarea class="form-control" name="mesaj" id="mesaj" rows="4" v-model="form.mesaj"></textarea>
                    <div v-if="errors.mesaj" class="text-danger">{{ errors.mesaj }}</div>
                </div>

                <button type="submit" class="btn btn-primary">Gönder</button>
            </div>
        </div>
    </form>
</div>

<!-- Vue.js -->
<script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.prod.js"></script>
<script>
const { createApp, ref } = Vue;

createApp({
  setup() {
    const iletisimForm = ref(null);
    const form = ref({
        ad: '',
        soyad: '',
        email: '',
        tel: '',
        konu: 'Öneri',
        mesaj: '',
    });

    const errors = ref({});

    const validateForm = () => {
        errors.value = {};

        if (!form.value.ad) errors.value.ad = "Ad boş olamaz.";
        if (!form.value.soyad) errors.value.soyad = "Soyad boş olamaz.";

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!form.value.email) {
            errors.value.email = "E-posta zorunludur.";
        } else if (!emailRegex.test(form.value.email)) {
            errors.value.email = "Geçerli bir e-posta giriniz.";
        }

        const telRegex = /^[0-9]{10}$/;
        if (!form.value.tel) {
            errors.value.tel = "Telefon numarası zorunludur.";
        } else if (!telRegex.test(form.value.tel)) {
            errors.value.tel = "Telefon numarası geçersiz.";
        };

        if (!form.value.konu) errors.value.konu = "Konu seçiniz.";
        if (!form.value.mesaj) errors.value.mesaj = "Mesaj boş bırakılamaz.";

        return Object.keys(errors.value).length === 0;
    };

    const handleSubmit = () => {
        if (validateForm()) {
            iletisimForm.value.submit();
        };
    };

    return {
        form,
        errors,
        handleSubmit,
        iletisimForm
    };
  }
}).mount('#app');
</script>

