<?php
session_start();

// Sample wallpapers (replace URLs with actual image paths)
$wallpapers = [
    ["title" => "Mountain", "url" => "assets/images/1.jpg", "category" => "Nature"],
    ["title" => "City Lights", "url" => "assets/images/2.jpg", "category" => "Abstract"],
    ["title" => "Forest", "url" => "assets/images/3.jpg", "category" => "Nature"],
    ["title" => "Lion", "url" => "assets/images/4.jpg", "category" => "Animals"],
    ["title" => "Space", "url" => "assets/images/5.jpg", "category" => "Abstract"],
    ["title" => "Ocean", "url" => "assets/images/6.jpg", "category" => "Nature"],
];

// Initialize favorites in session
if (!isset($_SESSION['favorites'])) {
    $_SESSION['favorites'] = [];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorites</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Navbar (same as previous) -->

<!-- Favorites Section -->
<section class="favorites" id="favorites">
    <h2>Your Favorites</h2>
    <?php if (count($_SESSION['favorites']) > 0): ?>
        <div class="gallery">
            <?php foreach ($_SESSION['favorites'] as $index): ?>
                <div class="wallpaper-card">
                    <img src="<?= $wallpapers[$index]['url'] ?>" alt="<?= $wallpapers[$index]['title'] ?>">
                    <div class="wallpaper-info">
                        <h3><?= $wallpapers[$index]['title'] ?></h3>
                        <a href="?remove_from_favorites=<?= $index ?>" class="favorite-btn">Remove from Favorites</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No favorites yet. Start adding wallpapers to your favorites!</p>
    <?php endif; ?>
</section>

<!-- Footer -->

</body>
</html>
