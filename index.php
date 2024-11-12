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

// Initialize download counts in session (without database)
if (!isset($_SESSION['download_counts'])) {
    $_SESSION['download_counts'] = array_fill(0, count($wallpapers), 0);
}
// Initialize favorites in session
if (!isset($_SESSION['favorites'])) {
    $_SESSION['favorites'] = [];
}
// Handle wallpaper download
if (isset($_POST['download_wallpaper'])) {
    $index = $_POST['wallpaper_index']; // Get the wallpaper index from the form
    if (!isset($_SESSION['download_history'])) {
        $_SESSION['download_history'] = []; // Initialize the download history
    }
    if (!in_array($wallpapers[$index], $_SESSION['download_history'])) {
        $_SESSION['download_history'][] = $wallpapers[$index]; // Add to the download history
    }
}

// Handle random wallpaper
if (isset($_POST['random_wallpaper'])) {
    $randomWallpaper = $wallpapers[array_rand($wallpapers)];
}

// Handle search functionality
$searchQuery = isset($_POST['search']) ? strtolower($_POST['search']) : '';
$filteredWallpapers = array_filter($wallpapers, function($wallpaper) use ($searchQuery) {
    return empty($searchQuery) || strpos(strtolower($wallpaper['title']), $searchQuery) !== false;
});

// Handle category filter
$selectedCategory = isset($_POST['category']) ? $_POST['category'] : '';
if (!empty($selectedCategory)) {
    $filteredWallpapers = array_filter($filteredWallpapers, function($wallpaper) use ($selectedCategory) {
        return $wallpaper['category'] === $selectedCategory;
    });
}
// Handle removing from favorites
if (isset($_GET['remove_from_favorites'])) {
    $index = (int)$_GET['remove_from_favorites'];
    $_SESSION['favorites'] = array_filter($_SESSION['favorites'], function($item) use ($index) {
        return $item !== $index;
    });
    $_SESSION['favorites'] = array_values($_SESSION['favorites']); // Re-index the array
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallpaper Gallery</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="navbar" herf="css/navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="assets/images/images.png" alt="Wallpaper Logo" class="logo">
            Wallpaper
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="pages/gallery.php">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/download.php">Download</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/favorite.php">Favorites</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/register.php">Register</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Wallpaper Gallery -->
<section class="wallpaper-gallery container mt-5">
    <h2>Wallpaper Gallery</h2>

    <!-- Search and Filter Section -->
    <form method="POST" action="index.php" class="mb-4">
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="search" class="form-control" placeholder="Search wallpapers..." value="<?= $searchQuery ?>">
            </div>
            <div class="col-md-6">
                <select name="category" class="form-select">
                    <option value="">All Categories</option>
                    <option value="Nature" <?= $selectedCategory == 'Nature' ? 'selected' : '' ?>>Nature</option>
                    <option value="Abstract" <?= $selectedCategory == 'Abstract' ? 'selected' : '' ?>>Abstract</option>
                    <option value="Animals" <?= $selectedCategory == 'Animals' ? 'selected' : '' ?>>Animals</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <div class="row">
        <?php foreach ($filteredWallpapers as $index => $wallpaper): ?>
            <div class="col-md-4 mb-4">
                <div class="wallpaper-card">
                    <img src="<?= $wallpaper['url'] ?>" alt="<?= $wallpaper['title'] ?>" class="img-fluid">
                    <div class="wallpaper-info">
                        <h3><?= $wallpaper['title'] ?></h3>
                        <p>Category: <?= $wallpaper['category'] ?></p>
                        <form method="POST" action="index.php">
                            <input type="hidden" name="wallpaper_index" value="<?= $index ?>">
                            <button type="submit" name="download_wallpaper" class="btn btn-primary">Download</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Random Wallpaper Section -->
    <section class="random-wallpaper mt-5">
        <h3>Random Wallpaper</h3>
        <?php
        if (isset($randomWallpaper)): ?>
            <div class="row">
                <div class="col-md-6">
                    <img src="<?= $randomWallpaper['url'] ?>" alt="<?= $randomWallpaper['title'] ?>" class="img-fluid">
                    <h3><?= $randomWallpaper['title'] ?></h3>
                    <p>Category: <?= $randomWallpaper['category'] ?></p>
                    <form method="POST" action="index.php">
                        <input type="hidden" name="wallpaper_index" value="<?= $index ?>">
                        <button type="submit" name="download_wallpaper" class="btn btn-primary">Download</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </section>

</section>

<!-- Footer Section -->
<footer class="footer mt-5">
    <div class="container">
        <p>&copy; 2024 Wallpaper Downloader. All Rights Reserved.</p>
        <div class="social-icons">
            <a href="#" target="_blank"><i class="bi bi-facebook"></i></a>
            <a href="#" target="_blank"><i class="bi bi-twitter"></i></a>
            <a href="#" target="_blank"><i class="bi bi-instagram"></i></a>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
