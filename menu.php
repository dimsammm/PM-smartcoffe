<?php
include 'config/koneksi.php';

// Ambil semua menu dari database
$menus = mysqli_query($conn, "SELECT * FROM menu ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Kopi - SmartCoffe</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #3b2f2f;
      padding: 15px 0;
      color: #fff;
      text-align: center;
    }

    .container {
      width: 90%;
      margin: auto;
    }

    h1 {
      text-align: center;
      margin-top: 30px;
      color: #3b2f2f;
    }

    .menu-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 25px;
      margin: 40px 0;
    }

    .menu-card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      overflow: hidden;
      transition: 0.3s;
      text-align: center;
    }

    .menu-card:hover {
      transform: scale(1.05);
    }

    .menu-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .menu-card h3 {
      margin: 10px 0 5px;
      color: #3b2f2f;
    }

    .menu-card p {
      margin: 5px 0;
      color: #555;
    }

    .btn-pesan {
      display: inline-block;
      background-color: #6f4e37;
      color: #fff;
      text-decoration: none;
      padding: 8px 15px;
      border-radius: 8px;
      margin: 10px 0 15px;
      transition: 0.3s;
    }

    .btn-pesan:hover {
      background-color: #8b5e3c;
    }

    footer {
      background-color: #3b2f2f;
      color: #fff;
      text-align: center;
      padding: 15px;
      margin-top: 40px;
    }
  </style>
</head>
<body>

  <header>
    <h2>☕ SmartCoffe - Daftar Menu</h2>
  </header>

  <div class="container">
    <h1>Daftar Menu Kopi</h1>
    <div class="menu-grid">
      <?php while ($row = mysqli_fetch_assoc($menus)) : ?>
        <div class="menu-card">
          <img src="<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama']; ?>">
          <h3><?php echo $row['nama']; ?></h3>
          <p>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
          <a href="pesan.php?id=<?php echo $row['id']; ?>" class="btn-pesan">Pesan Sekarang</a>
        </div>
      <?php endwhile; ?>
    </div>
  </div>

  <footer>
    <p>© 2025 SmartCoffe | Dikembangkan oleh Ni Wayan Widari</p>
  </footer>
</body>
</html>
