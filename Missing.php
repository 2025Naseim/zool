<?php
include 'database.php';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إبلاغ من المفقود | زول مفقود</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --primary: #2196F3;
            --secondary: #4CAF50;
            --dark-green: #1b5e20;
            --light-bg: #f0f4f8;
            --white: #ffffff;
        }

        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: linear-gradient(135deg, #e3f2fd 0%, #f1f8e9 100%);
            margin: 0;
            padding: 0;
            color: #333;
            min-height: 100vh;
        }

        /* --- الهيدر والقائمة --- */
        .navbar {
            background: linear-gradient(to right, #1b5e20, #4caf50);
            padding: 15px 20px;
            display: flex;
            justify-content: flex-start;
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

        /* --- القائمة الجانبية (Sidebar) --- */
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

        .sidebar a:hover { background: #f9f9f9; color: var(--primary); }

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

        /* --- تصميم النموذج (Form) --- */
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }

        form {
            background: var(--white);
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            border-top: 8px solid var(--secondary);
        }

        h2 {
            text-align: center;
            color: var(--dark-green);
            margin-bottom: 30px;
            font-size: 1.8rem;
        }

        .form-section-title {
            background: #e8f5e9;
            color: var(--dark-green);
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
        }

        input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 8px rgba(33, 150, 243, 0.2);
            outline: none;
        }

        button[name="insert_data"] {
            background: linear-gradient(to right, var(--secondary), var(--dark-green));
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
            box-shadow: 0 8px 20px rgba(27, 94, 32, 0.2);
        }

        footer {
            text-align: center;
            padding: 30px;
            color: #888;
            font-size: 0.9rem;
        }

        /* تجاوب الشاشات */
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
        <a href="Researcher.php"><i class="fas fa-users"></i> إبلاغ أهل</a>
        <a href="missingsearch.php"><i class="fas fa-search"></i> بحث عن شخص</a>
        <a href="login.php" style="color:red;"><i class="fas fa-sign-out-alt"></i> خروج</a>
    </div>

    <div class="container">
        <form action="Missingcode.php" method="post">
            <h2>إبلاغ من خلال المفقود</h2>
            <p style="text-align: center; color: #666; margin-top: -20px;">املأ البيانات لمساعدتنا في مطابقتها مع بلاغات الأهالي</p>

            <div class="form-section-title">
                <i class="fas fa-id-card"></i> معلوماتك الشخصية
            </div>
            
            <label>الاسم الكامل للمفقود</label>
            <input type="text" name="name" placeholder="أدخل اسمك كما هو معروف لدى أهلك" required>

            <label>مكان الميلاد (الولاية/المدينة)</label>
            <input type="text" name="place" placeholder="مثال: الخرطوم، مدني..." required>

            <label>الحي أو القرية</label>
            <input type="text" name="vil" placeholder="اسم المنطقة التي نشأت فيها" required>

            <div class="form-section-title">
                <i class="fas fa-users-rays"></i> معلومات التعرف (العائلة)
            </div>

            <label>اسم كبير الأسرة</label>
            <input type="text" name="fam" placeholder="اسم الأب أو الجد" required>

            <label>اسم الأم الكامل</label>
            <input type="text" name="mather" placeholder="اسم الأم ثلاثي" required>

            <label>اسم أحد الإخوة</label>
            <input type="text" name="bro" placeholder="للتحقق من البلاغ" required>

            <label>اسم جار معروف</label>
            <input type="text" name="GR" placeholder="اسم شخص يعرفه الجميع في حيك">

            <div class="form-section-title">
                <i class="fas fa-location-dot"></i> مكانك الحالي وكيفية الوصول إليك
            </div>

            <label>أين تتواجد حالياً؟</label>
            <input type="text" name="placenow" placeholder="حدد المكان أو المركز الذي تتواجد فيه" required>

            <label>رقم هاتف للتواصل</label>
            <input type="number" name="phone" placeholder="0XXXXXXXXX" required>

            <label>البريد الإلكتروني</label>
            <input type="email" name="email" placeholder="example@mail.com">

            <button type="submit" name="insert_data">
                <i class="fas fa-check-circle"></i> حفظ البيانات ونشر البلاغ
            </button>
        </form>
    </div>

    <footer>
        <p>© 2026 منصة زول مفقود - معاً لنعيد الأمل 💖</p>
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