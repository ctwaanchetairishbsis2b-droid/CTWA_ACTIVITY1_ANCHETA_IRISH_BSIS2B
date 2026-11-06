<?php

session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PinkSpace</title>
    <link rel="stylesheet" href="dashboard.css?v=<?php echo time(); ?>">
</head>
<body>

<nav>
    <div class="logo">PinkSpace</div>

    <div class="search-box">
        <input type="text" placeholder="Search inspiration...">
    </div>

    <div class="nav-right">
        <?php if ($username): ?>
            <span class="user-greeting">Hello, <?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8') ?></span>
        <?php endif; ?>
        <a href="index.php" class="logout-btn">Log Out</a>
    </div>
</nav>

<header>
    <h1>Discover Beautiful Ideas</h1>
    <p>Your personal inspiration board</p>
</header>

<main class="gallery">
    <div class="card">
        <img src="img/fashion.jpg" alt="Pink Fashion">
        <h3>Pink Fashion</h3>
    </div>

    <div class="card">
        <img src="img/pink1.jpg" alt="Pink Dreams">
        <h3>Pink Dreams</h3>
    </div>

    <div class="card">
        <img src="img/pink1.jpg" alt="Pinky">
        <h3>Pinky</h3>
    </div>

    <div class="card">
        <img src="img/pink2.jpg" alt="Pink Sky">
        <h3>Pink Sky</h3>
    </div>

    <div class="card">
        <img src="img/pink3.jpg" alt="Sabrina">
        <h3>Sabrina</h3>
    </div>

    <div class="card">
        <img src="img/pink4.jpg" alt="Pinkaholic">
        <h3>Pinkaholic</h3>
    </div>
</main>

</body>
</html>