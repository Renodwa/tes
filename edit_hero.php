<link rel="Stylesheet" href="sty.css">
<?php
require 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    die("Hero ID tidak ditemukan.");
}

$stmt = $conn->prepare("SELECT * FROM heroes WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$hero = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $roles = $_POST['roles'];
    $imagePath = $hero['image_path'];

    if ($_FILES['image']['tmp_name']) {
        $uploadDir = 'uploads/';
        $imagePath = $uploadDir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    }

    $stmt = $conn->prepare("UPDATE heroes SET name = ?, roles = ?, image_path = ? WHERE id = ?");
    $stmt->bind_param("sssi", $name, $roles, $imagePath, $id);
    $stmt->execute();

    header("Location: index.php");
    exit;
}
?>
<center>
<body>
<h2>Edit Hero</h2>
<form method="POST" enctype="multipart/form-data">
   
    <input name="name" value="<?= htmlspecialchars($hero['name']) ?>" required><br><br>

    <input name="roles" placeholder="Role (contoh: Fighter/Assassin)" required><br>

    
    <input type="file" name="image"><br>
    <img src="<?= $hero['image_path'] ?>" width="120" class="center-img"><br><br>

    <button type="submit">Update</button>
</form>
<div style="text-align: center; margin-top: 20px;">
  <a class="kmbli" href="index.php" style="display: inline-block; background-color: #3b82f6; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
    ← Kembali ke Halaman Utama
  </a>
</div>
</body>
    

</center>