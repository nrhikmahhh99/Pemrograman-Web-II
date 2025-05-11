<html>
<head>
    <title>Dashboard Perpustakaan</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Georgia', sans-serif;
            background-image: url('perpustakaan.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .dashboard-container {
            width: 90%;
            max-width: 900px;
            background-color: #faf0f8;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            padding: 50px;
        }
        .dashboard-title {
            text-align: center;
            margin-bottom: 50px;
            font-size: 30px;
            font-weight: bold;
        }
        .menu-grid {
            display: flex;
            justify-content: space-around;
            gap: 20px;
        }

        .menu-card {
            flex: 1;
            min-width: 200px;
            background-color:#fadcf7;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }
        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        .menu-card h3 {
            font-size: 20px;
            color: #2b2b2b;
            margin-bottom: 10px;
        }
        .menu-card a {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #f673cf;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        .menu-card a:hover {
            background-color: #e15cd6;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-title">PERPUSTAKAAN</div>
        <div class="menu-grid">
            <div class="menu-card">
                <h3>Member</h3>
                <a href="Member.php">Kelola Member</a>
            </div>
            <div class="menu-card">
                <h3>Buku</h3>
                <a href="Buku.php">Lihat Daftar Buku</a>
            </div>
            <div class="menu-card">
                <h3>Peminjaman</h3>
                <a href="Peminjaman.php">Data Peminjaman</a>
            </div>
        </div>
    </div>
</body>
</html>
