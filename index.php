<?php
include 'config/koneksi.php';
$menus = mysqli_query($conn, "SELECT * FROM menu LIMIT 6");
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartCoffe — Nikmati Harimu dengan Secangkir Kopi</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header class="navbar">
        <div class="container">
            <div class="logo">☕ SmartCoffe</div>
            <nav>
                <ul>
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="pesan.php">Pesan</a></li>
                    <li><a href="checkout.php">Checkout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Rasakan Aroma & Kenikmatan Kopi Terbaik</h1>
            <p>SmartCoffe menghadirkan pengalaman ngopi yang tak terlupakan. Pilih kopi favoritmu dan pesan langsung!
            </p>
            <a href="menu.php" class="btn-primary">Lihat Menu</a>
        </div>
    </section>

    <section class="menu-section">
        <div class="container">
            <h2>Menu Populer Wisnu</h2>
            <div class="menu-grid">
                <?php while ($row = mysqli_fetch_assoc($menus)) : ?>
                    <div class="menu-card">
                        <img src="<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama']; ?>">
                        <h3><?php echo $row['nama']; ?></h3>
                        <p>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
                        <a href="pesan.php?id=<?php echo $row['id']; ?>" class="btn-secondary">Pesan Sekarang</a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <footer>
        <p>©️ 2025 SmartCoffe | Crafted with ❤️ by Tim SmartCoffe</p>
        <p>Update by Wayan Wisnu</p>
    </footer>
</body>

</html>