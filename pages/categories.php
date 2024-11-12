<?php
include 'pages/common/header.php';

$wallpapers = [ /* ... wallpaper array ... */ ];
$categories = array_unique(array_column($wallpapers, 'category'));
?>

<section id="categories">
    <h2>Categories</h2>
    <?php foreach ($categories as $category): ?>
        <h3><?= htmlspecialchars($category) ?></h3>
        <div class="category-gallery">
            <?php foreach ($wallpapers as $wallpaper): ?>
                <?php if ($wallpaper['category'] === $category): ?>
                    <div class="wallpaper-card">
                        <img src="<?= $wallpaper['url'] ?>" alt="<?= $wallpaper['title'] ?>">
                        <h4><?= $wallpaper['title'] ?></h4>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</section>

<?php include 'pages/common/footer.php'; ?>
