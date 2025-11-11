<?php
include 'config/koneksi.php';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$menu = mysqli_query($conn, "SELECT * FROM menu WHERE id=$id");
$data = mysqli_fetch_assoc($menu);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pesan Menu — SmartCoffe</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="navbar">
<div class="container">
<div class="logo">☕ SmartCoffe</div>
<nav>
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="menu.php">Menu</a></li>
<li><a href="pesan.php" class="active">Pesan</a></li>
<li><a href="checkout.php">Checkout</a></li>
</ul>
</nav>
</div>
</header>


<section class="order-section">
<div class="container">
<h2>Pesan Menu</h2>
<?php if (!empty($data)) : ?>
<div class="order-card">
<img src="<?php echo $data['gambar']; ?>" alt="<?php echo $data['nama']; ?>">
<div class="info">
<h3><?php echo $data['nama']; ?></h3>
<p>Harga: Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?></p>
<form action="proses_pesan.php" method="POST">
<input type="hidden" name="id_menu" value="<?php echo $data['id']; ?>">
<label>Jumlah:</label>
<input type="number" name="jumlah" min="1" value="1">
<button type="submit" class="btn-primary">Tambah ke Keranjang</button>
</form>
</div>
</div>
<?php else : ?>
<p>Menu tidak ditemukan!</p>
<?php endif; ?>
</div>
</section>


<footer>
<p>©️ 2025 SmartCoffe | Crafted with ❤️ by Tim SmartCoffe</p>
</footer>
</body>
</html>