<center>
<link rel="Stylesheet" href="style.css">
<h1>Tambahkan Hero</h1>
<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $roles = $_POST['roles'];
    $image_path = 'img/' . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $image_path);

    $sql = "INSERT INTO heroes (name, roles, image_path) VALUES ('$name', '$roles', '$image_path')";
    $conn->query($sql);
    header('Location: index.php');
}
?>

<form method="POST" enctype="multipart/form-data">
    <input name="name" placeholder="Hero Name" required><br>
    <input name="roles" placeholder="Role (contoh: Fighter/Assassin)" required><br>
    <input type="file" name="image" required><br>
    <button type="submit">Tambah</button>
</form>
<div style="text-align: center; margin-top: 20px;">
  <a class="kmbli" href="index.php" style="display: inline-block; background-color: #3b82f6; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
    ← Kembali ke Halaman Utama
  </a>
</div>
     
</center>