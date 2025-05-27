<link rel="Stylesheet" href="stle.css">
<?php
include 'db.php';

$filter = $_GET['roles'] ?? 'All';

$sql = "SELECT * FROM heroes";
if ($filter !== 'All') {
    $sql .= " WHERE roles LIKE '%$filter%'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hero List</title>
    <style>
        
    </style>
</head>
<nav style="background-color: #0f172a; padding: 1rem; display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 100;">
  <div style="color: white; font-size: 1.5rem; font-weight: bold;">
    List Heroes Mobile Legends
  </div>
  <div>
    <a href="welcome.php" style="color: white; text-decoration: none; margin-right: 20px;">Kembali</a>
    <a href="add_hero.php" style="
      background-color: #3b82f6;
      color: white;
      padding: 8px 16px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
      transition: background-color 0.3s ease;
    " onmouseover="this.style.backgroundColor='#2563eb'" onmouseout="this.style.backgroundColor='#3b82f6'">
      Tambahkan Hero
    </a>
  </div>
</nav>

<body class="badan">

<h2 style="margin: 20px;">Filter Berdasarkan Role</h2>
<div class="filter-buttons">
    <?php
    $roles = ['All', 'Mage', 'Fighter', 'Tank', 'Assassin', 'Marksman', 'Support'];
    foreach ($roles as $r) {
        echo "<a href='?roles=$r'>$r</a>";
    }
    ?>
</div>
<h2 style="margin: 20px;">All Heroes</h2>
<div class="hero-container">


    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="card">
            <img src="<?= $row['image_path'] ?>" alt="<?= $row['name'] ?>">
            <h3><?= $row['name'] ?></h3>
            <p><?= $row['roles'] ?></p>
            <div class="action-buttons">
                <a href="edit_hero.php?id=<?= $row['id'] ?>" class="btn-edit">Edit</a>
                <a href="remove_hero.php?id=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus hero ini?')">Hapus</a>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<button onclick="scrollToTop()" id="toTopBtn" title="Kembali ke Atas">
  ↑
</button>
<script>
const toTopBtn = document.getElementById("toTopBtn");

window.onscroll = function() {
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    toTopBtn.classList.add("show");
  } else {
    toTopBtn.classList.remove("show");
  }
};

function scrollToTop() {
  window.scrollTo({ top: 0, behavior: 'smooth' });
}
</script>

<style>
#toTopBtn {
  opacity: 0;
  visibility: hidden;
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 999;
  font-size: 20px;
  border: none;
  outline: none;
  background-color: #444;
  color: white;
  cursor: pointer;
  padding: 12px 16px;
  border-radius: 50%;
  transition: opacity 0.5s ease, visibility 0.5s ease;
}

#toTopBtn.show {
  opacity: 1;
  visibility: visible;
}

#toTopBtn:hover {
  background-color: #666;
}
</style>

</body>
    

</html>
