<?php
session_start();
// التأكد من الاتصال بقاعدة البيانات (اختياري حسب حاجتك للكود أدناه)
$con = mysqli_connect("localhost","root","","phptutorials");
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>زول مفقود | منصة لمّ الشمل</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --primary-dark: #1b5e20;
            --primary-light: #4caf50;
            --accent-yellow: #ffeb3b;
            --sky-blue: #2196F3;
            --bg-gradient: linear-gradient(135deg, #e3f2fd 0%, #f1f8e9 100%);
            --white: #ffffff;
            --shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: var(--bg-gradient);
            margin: 0;
            padding: 0;
            color: #333;
            overflow-x: hidden;
        }

        /* --- الهيدر مع الشعار المقترح --- */
        header {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-light) 100%);
            color: white;
            padding: 50px 20px;
            text-align: center;
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
            position: relative;
        }

        .logo-container {
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            transition: 0.3s;
        }

        .logo-container:hover { transform: scale(1.05); }

        .logo-icon {
            font-size: 3.5rem;
            color: var(--accent-yellow);
            margin-bottom: 10px;
            filter: drop-shadow(0 0 10px rgba(255,235,59,0.5));
            animation: heartBeat 2s infinite;
        }

        @keyframes heartBeat {
            0% { transform: scale(1); }
            14% { transform: scale(1.1); }
            28% { transform: scale(1); }
            42% { transform: scale(1.1); }
            70% { transform: scale(1); }
        }

        .logo-text {
            font-size: 2.8rem;
            font-weight: 900;
            color: white;
            margin: 0;
            letter-spacing: 1px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        header p {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-top: 15px;
            font-weight: 300;
        }

        /* --- شريط التنقل (Navbar) --- */
        nav {
            position: sticky;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: center;
            background: rgba(33, 150, 243, 0.9);
            backdrop-filter: blur(12px);
            padding: 10px 0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        nav a {
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
            border-radius: 50px;
            margin: 0 5px;
        }

        nav a:hover {
            background: white;
            color: var(--sky-blue);
        }

        /* --- زر القائمة للموبايل --- */
        .menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--accent-yellow);
            color: var(--primary-dark);
            width: 50px;
            height: 50px;
            border: none;
            cursor: pointer;
            font-size: 24px;
            border-radius: 50%;
            z-index: 1100;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        /* --- القائمة الجانبية (Sidebar) --- */
        .sidebar {
            position: fixed;
            top: 0;
            right: -300px;
            width: 280px;
            height: 100%;
            background: var(--white);
            transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            padding-top: 70px;
            z-index: 2000;
            box-shadow: -10px 0 30px rgba(0,0,0,0.1);
        }

        .sidebar.active { right: 0; }

        .sidebar a {
            display: flex;
            align-items: center;
            color: #444;
            padding: 18px 25px;
            text-decoration: none;
            font-weight: 600;
            border-bottom: 1px solid #f8f8f8;
            transition: 0.3s;
        }

        .sidebar a i { margin-left: 15px; color: var(--sky-blue); font-size: 1.2rem; }
        .sidebar a:hover { background: #f0f7ff; padding-right: 35px; color: var(--sky-blue); }

        .sidebar .close-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 30px;
            cursor: pointer;
            color: #ff5252;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            backdrop-filter: blur(4px);
            z-index: 1500;
        }
        .overlay.active { display: block; }

        /* --- شبكة البطاقات (Cards Grid) --- */
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .sections {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .card {
            background: var(--white);
            border-radius: 25px;
            overflow: hidden;
            position: relative;
            padding: 40px 20px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: 0.4s;
            border: 1px solid rgba(0,0,0,0.02);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 5px;
            background: linear-gradient(to right, var(--sky-blue), var(--primary-light));
        }

        .card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 40px rgba(33, 150, 243, 0.2);
        }

        .card i {
            font-size: 50px;
            color: var(--sky-blue);
            margin-bottom: 25px;
            display: block;
        }

        .card a {
            color: #2c3e50;
            text-decoration: none;
            font-size: 1.3rem;
            font-weight: 800;
            display: block;
            margin-bottom: 15px;
        }

        .card p {
            font-size: 0.95rem;
            color: #777;
            line-height: 1.6;
        }

        .card .btn-go {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 25px;
            background: #f0f7ff;
            color: var(--sky-blue);
            border-radius: 50px;
            font-weight: bold;
            transition: 0.3s;
        }

        .card:hover .btn-go {
            background: var(--sky-blue);
            color: white;
        }

        footer {
            background: #1a237e;
            color: white;
            text-align: center;
            padding: 40px 20px;
            margin-top: 60px;
        }

        /* --- التجاوب (Responsive) --- */
        @media (max-width: 768px) {
            nav { display: none; }
            .menu-toggle { display: block; }
            .logo-text { font-size: 2rem; }
            header { padding: 80px 20px 50px; }
            .sections { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>
    
    <button class="menu-toggle" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>

    <header>
        <a href="welcome.php" class="logo-container">
            <i class="fas fa-hand-holding-heart logo-icon"></i>
            <h1 class="logo-text">زول مفقود</h1>
        </a>
        <p>منصة إنسانية ذكية تزرع الأمل وتجمع القلوب الضائعة</p>
    </header>

    <nav id="navbar">
        <a href="welcome.php"><i class="fas fa-home"></i> الرئيسية</a>
        <a href="Missing.php">إبلاغ مفقود</a>
        <a href="Researcher.php">إبلاغ أهل</a>
        <a href="missingsearch.php">بحث عن شخص</a>
        <a href="inside.php">بيانات الحي</a>
    </nav>

    <div class="sidebar" id="sidebar">
        <span class="close-btn" onclick="toggleSidebar()">&times;</span>
        <a href="welcome.php"><i class="fas fa-home"></i> الرئيسية</a>
        <a href="Missing.php"><i class="fas fa-user-plus"></i> إبلاغ من المفقود</a>
        <a href="Researcher.php"><i class="fas fa-users"></i> إبلاغ من الأهل</a>
        <a href="missingsearch.php"><i class="fas fa-search"></i> باحث عن مفقود</a>
        <a href="R_search.php"><i class="fas fa-heart-circle-check"></i> مفقود يبحث عن أهله</a>
        <a href="inside.php"><i class="fas fa-map-marked-alt"></i> بيانات الحي</a>
        <a href="golobalnear.php"><i class="fas fa-house-chimney-search"></i> بحث الحي</a>
        <a href="login.php" style="color:#ff5252; border-top: 1px solid #eee;"><i class="fas fa-power-off"></i> خروج</a>
    </div>

    <div class="container">
        <div class="sections">
            <div class="card">
                <i class="fas fa-user-tag"></i>
                <a href="Missing.php">إبلاغ من المفقود</a>
                <p>هل أنت بعيد عن أهلك؟ سجل بياناتك هنا ليتعرفوا عليك.</p>
            </div>
            <div class="card">
                <i class="fas fa-search-location"></i>
                <a href="Researcher.php">إبلاغ من الأهل</a>
                <p>تبحث عن شخص عزيز؟ أضف بياناته وصورته لنساعدك في البحث.</p>
              
            </div>
            <div class="card">
                <i class="fas fa-binoculars"></i>
                <a href="missingsearch.php">باحث عن مفقود</a>
                <p>تصفح قائمة المفقودين المسجلين في المنصة لتقديم مساعدة.</p>
               
            </div>
            <div class="card">
                <i class="fas fa-people-pulling"></i>
                <a href="R_search.php">مفقود يبحث عن أسرته</a>
                <p>قائمة الأشخاص الذين عثرنا عليهم ويبحثون عن ذويهم.</p>
               
            </div>
            <div class="card">
                <i class="fas fa-house-medical"></i>
                <a href="inside.php">إضافة بيانات الحي</a>
                <p>ساهم في توثيق الأشخاص المتواجدين داخل الحي لسهولة الحصر.</p>
            
            </div>
            <div class="card">
                <i class="fas fa-street-view"></i>
                <a href="golobalnear.php">بحث داخل الحي</a>
                <p>ابحث عن أقاربك في نطاق جغرافي محدد (أحياء وقرى).</p>
                
            </div>
        </div>
    </div>

    <footer>
        <p>🌟 منصة زول مفقود - جميع الحقوق محفوظة © 2026</p>
        <div style="margin-top:10px; font-size: 0.8rem; opacity: 0.7;">
            صنع بكل حب لدعم الروابط الإنسانية
        </div>
    </footer>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            const overlay = document.getElementById("overlay");
            sidebar.classList.toggle("active");
            overlay.classList.toggle("active");
        }
    </script>

</body>
</html>