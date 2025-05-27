<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #141e30, #243b55);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            animation: fadeIn 1s ease-in-out;
        }

        .container {
            background-color: rgba(32, 32, 32, 0.85);
            padding: 50px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 0 25px rgba(99, 98, 98, 0.5);
            
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        p {
            margin-bottom: 30px;
            font-size: 1.1rem;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            margin: 10px;
            font-size: 1rem;
            font-weight: 600;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn i {
            margin-right: 8px;
            animation: pulse 2s infinite;
        }

        .btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }
         #bg-video {
      position: fixed;
      top: 0;
      left: 0;
      min-width: 100%;
      min-height: 100%;
      object-fit: cover;
      z-index: -1;
    }

  
    .content {
      position: relative;
      z-index: 1;
      color: white;
      text-align: center;
      padding-top: 20%;
      font-family: sans-serif;
    }
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Website<br>Daftar Hero Mobile Legends</h1>
        <p>Silakan pilih salah satu tombol di bawah untuk melanjutkan.</p>
        <a href="index.php" class="btn" onclick="playClick()"><i class="fas fa-list"></i>Lihat Semua Hero</a>
        <a href="add_hero.php" class="btn" onclick="playClick()"><i class="fas fa-plus-circle"></i>Tambah Hero Baru</a>

         <video id="bg-video" autoplay loop muted playsinline>
    <source src="ssstik.io_1748332222066.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
</body>
</html>
