// ======================= menu.php =======================
<?php
include 'config/koneksi.php';
$menus = mysqli_query($conn, "SELECT * FROM menu");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Menu — SmartCoffe</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="navbar">
<div class="container">
<div class="logo">☕ SmartCoffe</div>
<nav>
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="menu.php" class="active">Menu</a></li>
<li><a href="pesan.php">Pesan</a></li>
<li><a href="checkout.php">Checkout</a></li>
</ul>
</nav>
</div>
</header>

<section class="menu-section">
<div class="container">
<h2>Semua Menu</h2>
<div class="menu-grid">
<?php while ($row = mysqli_fetch_assoc($menus)) : ?>
<div class="menu-card">
<img src="<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama']; ?>">
<h3><?php echo $row['nama']; ?></h3>
<p>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
<a href="pesan.php?id=<?php echo $row['id']; ?>" class="btn-secondary">Pesan</a>
</div>
<?php endwhile; ?>
</div>
</div>
</section>

<footer>
<p>©️ 2025 SmartCoffe | Crafted with ❤️ by Tim SmartCoffe</p>
</footer>
</body>
</html>
