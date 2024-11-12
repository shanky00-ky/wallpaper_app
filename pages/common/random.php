<?php
include 'header.php';

$wallpapers = [ /* ... wallpaper array ... */ ];
$randomWallpaper = $wallpapers[array_rand($wallpapers)];
?>

<section id="random">
    <h2>Random Wallpaper</h2>
    <div class="wallpaper-card">
        <img src="<?= $randomWallpaper['url'] ?>" alt="<?= $randomWallpaper['title'] ?>">
        <h3><?= htmlspecialchars($randomWallpaper['title']) ?></h3>
        <a href="<?= $randomWallpaper['url'] ?>" download class="download-btn">Download</a>
    </div>
</section>

<?php include 'pages/common/footer.php'; ?>
