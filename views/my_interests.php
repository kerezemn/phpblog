<?php
$api_key = 'API_KEY';

$url = "https://api.themoviedb.org/3/movie/popular?api_key=$api_key&language=tr-TR&page=1";

$response = file_get_contents($url);
$data = json_decode($response, true);

if ($data && isset($data['results'])) {
    $movies = $data['results'];
} else {
    $movies = [];
}
?>

<div class="container mt-3">
    <h3 class="text-center">Favori filmlerim</h3>
    <div class="row">
        <?php foreach ($movies as $movie): ?>
            <div class="col mb-3">
                <div class="card" style="min-width: 200px;">
                    <img src="https://image.tmdb.org/t/p/w500<?php echo $movie['poster_path']; ?>" style="max-width: 400px; max-height: 400px;" alt="<?php echo htmlspecialchars($movie['title']); ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($movie['title']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars(substr($movie['overview'], 0, 100)); ?>...</p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>