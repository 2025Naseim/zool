<?php
include('database.php'); // استدعاء ملف الاتصال

// الآن يمكنك استخدام المتغير $con مباشرة
// مثال: $query = mysqli_query($con, "SELECT * FROM ...");
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إبلاغ من أهل المفقود | زول مفقود</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --primary-blue: #2196F3;
            --secondary-green: #4CAF50;
            --dark-blue: #1565C0;
            --bg-light: #f8fbff;
        }

        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: linear-gradient(135deg, #e3f2fd 0%, #f1f8e9 100%);
            margin: 0;
            padding: 0;
            color: #333;
            min-height: 100vh;
        }

        /* شريط التنقل العلوي */
        .navbar {
            background: linear-gradient(to right, #1565C0, #2196F3);
            padding: 15px 20px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            gap: 15px;
        }

        .navbar .logo {
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
            text-decoration: none;
        }

        .menu-toggle {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            font-size: 20px;
            border-radius: 5px;
        }

        /* القائمة الجانبية (Sidebar) */
        .sidebar {
            position: fixed;
            top: 0;
            right: -280px;
            width: 260px;
            height: 100%;
            background: white;
            transition: 0.4s ease;
            z-index: 2000;
            box-shadow: -5px 0 15px rgba(0,0,0,0.1);
            padding-top: 20px;
        }

        .sidebar.active { right: 0; }

        .sidebar a {
            display: block;
            color: #333;
            padding: 15px 25px;
            text-decoration: none;
            font-weight: bold;
            border-bottom: 1px solid #f0f0f0;
        }

        .sidebar a:hover { background: #f9f9f9; color: var(--primary-blue); }

        .sidebar .close-btn {
            text-align: left;
            padding: 10px 20px;
            font-size: 24px;
            cursor: pointer;
            color: #ff5252;
            display: block;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.4);
            z-index: 1500;
        }
        .overlay.active { display: block; }

        /* تصميم النموذج */
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }

        form {
            background: white;
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            border-top: 8px solid var(--primary-blue);
        }

        h2 {
            text-align: center;
            color: var(--dark-blue);
            margin-bottom: 30px;
            font-size: 1.8rem;
        }

        .form-section-title {
            background: #e3f2fd;
            color: var(--dark-blue);
            padding: 10px 15px;
            border-radius: 8px;
            margin: 25px 0 15px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
            font-size: 0.9rem;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 1rem;
            transition: 0.3s;
            box-sizing: border-box;
            background: #fdfdfd;
        }

        input:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 8px rgba(33, 150, 243, 0.2);
            outline: none;
            background: white;
        }

        button[name="insert_data"] {
            background: linear-gradient(to right, var(--primary-blue), var(--dark-blue));
            color: white;
            padding: 16px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            width: 100%;
            font-size: 1.2rem;
            font-weight: bold;
            transition: 0.3s;
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        button[name="insert_data"]:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(33, 150, 243, 0.2);
        }

        footer {
            text-align: center;
            padding: 30px;
            color: #888;
            font-size: 0.9rem;
        }

        @media (max-width: 600px) {
            form { padding: 25px 15px; }
            h2 { font-size: 1.4rem; }
        }
    </style>
</head>
<body>

    <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

    <div class="navbar">
        <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
        <a href="welcome.php" class="logo">🌟 زول مفقود</a>
    </div>

    <div class="sidebar" id="sidebar">
        <span class="close-btn" onclick="toggleSidebar()">×</span>
        <a href="welcome.php"><i class="fas fa-home"></i> الرئيسية</a>
        <a href="Missing.php"><i class="fas fa-user-edit"></i> إبلاغ مفقود</a>
        <a href="Researcher.php"><i class="fas fa-users-viewfinder"></i> إبلاغ أهل</a>
        <a href="missingsearch.php"><i class="fas fa-search"></i> بحث عن شخص</a>
        <a href="login.php" style="color:red;"><i class="fas fa-power-off"></i> خروج</a>
    </div>

    <div class="container">
        <form action="Researchercode.php" method="post">
            <h2>إبلاغ من قبل أهل المفقود</h2>
            <p style="text-align: center; color: #666; margin-top: -20px;">ساعدنا بتوفير أدق التفاصيل لنصل لمطابقة صحيحة</p>

            <div class="form-section-title">
                <i class="fas fa-user-slash"></i> بيانات الشخص المفقود
            </div>
            
            <label>الاسم الكامل للمفقود</label>
            <input type="text" name="name" placeholder="الاسم رباعي كما في الأوراق الرسمية" required>

            <label>اسم الأم الكامل</label>
            <input type="text" name="mather" placeholder="اسم الأم ثلاثي للتوثيق" required>

            <label>مكان الميلاد</label>
            <input type="text" name="place" placeholder="الولاية / المدينة" required>

            <label>منطقة الميلاد (الحي/القرية)</label>
            <input type="text" name="vil" placeholder="اسم المنطقة الأصلية" required>

            <div class="form-section-title">
                <i class="fas fa-sitemap"></i> تفاصيل العائلة والروابط
            </div>

            <label>اسم كبير الأسرة</label>
            <input type="text" name="Fim" placeholder="اسم الأب أو الجد" required>

            <label>اسم أحد الإخوة</label>
            <input type="text" name="bro" placeholder="اسم أخ/أخت معروف للجميع" required>

            <label>اسم جار معروف في المنطقة الأصلية</label>
            <input type="text" name="GR" placeholder="اسم شخص يمكنه التعرف عليه" required>

            <div class="form-section-title">
                <i class="fas fa-handshake-angle"></i> بيانات مقدم البلاغ والتواصل
            </div>

            <label>صلة القرابة (العلاقة)</label>
            <input type="text" name="relation" placeholder="مثال: أب، أم، أخ، ابن عم..." required>

            <label>آخر مكان شوهد فيه / مكان السكن الحالي المتوقع</label>
            <input type="text" name="live" placeholder="حدد المنطقة التي فقد فيها أو يسكن فيها حالياً" required>

            <label>رقم هاتف للتواصل (الأهل)</label>
            <input type="number" name="phone" placeholder="0XXXXXXXXX" required>

            <label>البريد الإلكتروني للتواصل</label>
            <input type="email" name="email" placeholder="example@mail.com" required>

            <button type="submit" name="insert_data">
                <i class="fas fa-paper-plane"></i> إرسال البلاغ ونشره
            </button>
        </form>
    </div>

    <footer>
        <p>© 2026 منصة زول مفقود - نبحث معكم بكل حب 🕊️</p>
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