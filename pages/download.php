<?php
session_start();

// Check if there are any wallpapers in the download history
$downloadHistory = isset($_SESSION['download_history']) ? $_SESSION['download_history'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Wallpapers</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="assets/images/images.png" alt="Wallpaper Logo">
            Wallpaper Downloader
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="pages/gallery.php">Gallery</a></li>
                
                <li class="nav-item"><a class="nav-link" href="pages/favorite.php">Favorites</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/register.php">Register</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Download History Section -->
<section class="download-history container mt-5">
    <h2>Previously Downloaded Wallpapers</h2>
    <?php if (count($downloadHistory) > 0): ?>
        <div class="row">
            <?php foreach ($downloadHistory as $wallpaper): ?>
                <div class="col-md-4 mb-4">
                    <div class="wallpaper-card">
                        <img src="<?= $wallpaper['url'] ?>" alt="<?= $wallpaper['title'] ?>">
                        <div class="wallpaper-info">
                            <h3><?= $wallpaper['title'] ?></h3>
                            <p>Category: <?= $wallpaper['category'] ?></p>
                            <a href="<?= $wallpaper['url'] ?>" download class="btn btn-primary">Download Again</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No wallpapers downloaded yet.</p>
    <?php endif; ?>
</section>

<!-- Footer Section -->
<footer class="footer">
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
