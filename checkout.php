<?php
include 'config/koneksi.php';
$keranjang = mysqli_query($conn, "SELECT keranjang.*, menu.nama, menu.harga FROM keranjang JOIN menu ON keranjang.id_menu = menu.id");
$total = 0;
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout — SmartCoffe</title>
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
                    <li><a href="pesan.php">Pesan</a></li>
                    <li><a href="checkout.php" class="active">Checkout</a></li>
                </ul>
            </nav>
        </div>
    </header>


    <section class="checkout-section">
        <div class="container">
            <h2>Keranjang Anda</h2>


            <table class="checkout-table">
                <tr>
                    <th>Menu</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>


                <?php while ($row = mysqli_fetch_assoc($keranjang)) : ?>
                    <?php $subtotal = $row['jumlah'] * $row['harga'];
                    $total += $subtotal; ?>
                    <tr>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['jumlah']; ?></td>
                        <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                        <td>Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></td>
                    </tr>
                <?php endwhile; ?>


                <tr>
                    <td colspan="3" class="total-text">Grand Total</td>
                    <td>Rp <?php echo number_format($total, 0, ',', '.'); ?></td>
                </tr>
            </table>


            <a href="proses_checkout.php" class="btn-primary">Bayar Sekarang</a>
        </div>
    </section>


    <footer>
        <p>© 2025 SmartCoffe | Crafted with ❤ by Tim SmartCoffe</p>
    </footer>
</body>

</html>