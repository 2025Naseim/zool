<?php
include('database.php'); // استدعاء ملف الاتصال

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>زول مفقود - الصفحة الرئيسية</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: "Tahoma", sans-serif;
      background: linear-gradient(to bottom right, #cce7ff, #e6ffe6, #fff0f5);
      background-attachment: fixed;
      color: #333;
      overflow-x: hidden;
    }

    /* الهيدر وشريط التنقل */
    .navbar {
      position: sticky;
      top: 0;
      background: linear-gradient(to right, #006699, #0099cc);
      padding: 12px 20px;
      display: flex;
      justify-content: flex-start; /* يبدأ العناصر من اليمين */
      align-items: center;
      box-shadow: 0 2px 8px rgba(0,0,0,0.2);
      z-index: 1000;
      gap: 20px;
    }

    .navbar .logo {
      color: white;
      font-weight: bold;
      font-size: 20px;
      text-decoration: none;
      margin-right: 10px;
    }

    .navbar .links {
      display: flex;
      gap: 25px;
    }

    .navbar a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      font-size: 16px;
      transition: 0.3s;
    }

    .navbar a:hover { color: #ffeb3b; }

    /* زر القائمة للموبايل - جهة اليمين */
    .menu-toggle {
      display: none;
      background: rgba(255, 255, 255, 0.2);
      color: white;
      padding: 8px 12px;
      border: 1px solid rgba(255, 255, 255, 0.4);
      cursor: pointer;
      font-size: 22px;
      border-radius: 5px;
      transition: 0.3s;
    }
    
    .menu-toggle:hover {
      background: #ffeb3b;
      color: #006699;
    }

    /* القائمة الجانبية (Sidebar) من اليمين */
    .sidebar {
      position: fixed;
      top: 0;
      right: -280px; /* مخفية لجهة اليمين */
      width: 260px;
      height: 100%;
      background: white;
      transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      z-index: 2000;
      box-shadow: -5px 0 15px rgba(0,0,0,0.1);
      padding-top: 10px;
    }

    .sidebar.active { right: 0; }

    .sidebar a {
      display: block;
      color: #006699;
      padding: 15px 25px;
      text-decoration: none;
      font-weight: bold;
      border-bottom: 1px solid #f0f0f0;
      transition: 0.3s;
    }

    .sidebar a:hover {
      background-color: #f9f9f9;
      padding-right: 35px; /* تأثير حركة عند التمرير */
    }

    .sidebar .close-btn {
      text-align: left; /* زر الإغلاق لليسار داخل القائمة اليمينية */
      padding: 15px;
      font-size: 26px;
      cursor: pointer;
      color: #ff4444;
      display: block;
    }

    /* طبقة التعتيم */
    .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.4);
      backdrop-filter: blur(3px); /* تأثير ضبابي عصري */
      z-index: 1500;
    }
    .overlay.active { display: block; }

    /* المحتوى الرئيسي */
    .container {
      text-align: center;
      padding: 120px 20px;
      min-height: 50vh;
    }

    .welcome {
      font-size: 36px;
      font-weight: bold;
      color: #006699;
      margin-bottom: 10px;
      text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .subtext {
      font-size: 20px;
      color: #444;
      margin-top: 10px;
      font-style: italic;
    }

    .start-button {
      margin-top: 50px;
      padding: 18px 45px;
      background: linear-gradient(135deg, #0099cc, #006699);
      color: white;
      border: none;
      border-radius: 50px;
      font-size: 20px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s ease;
      text-decoration: none;
      display: inline-block;
      box-shadow: 0 10px 20px rgba(0,102,153,0.2);
    }

    .start-button:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 25px rgba(0,102,153,0.3);
      filter: brightness(1.1);
    }

    /* الفوتر */
    footer {
      background: #004d73;
      color: white;
      text-align: center;
      padding: 40px 20px;
      margin-top: 80px;
    }

    footer a { color: #ffeb3b; text-decoration: none; margin: 0 12px; font-weight: bold; }
    footer a:hover { text-decoration: underline; }

    /* استعلامات التجاوب */
    @media (max-width: 768px) {
      .navbar .links { display: none; }
      .menu-toggle { display: block; } /* يظهر الزر في اليمين */
      .welcome { font-size: 26px; }
      .container { padding: 80px 20px; }
    }
  </style>
</head>
<body>

  <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

  <div class="navbar">
    <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
    
    <a href="index.php" class="logo">🌟 زول مفقود</a>
    
    <div class="links">
      <a href="index.php">🏠 الرئيسية</a>
      <a href="about.php">عن الموقع</a>
      <a href="RR.php">➕ إضافة بلاغ</a>
      <a href="helping.php">📞 استفسار</a>
    </div>
  </div>

  <div class="sidebar" id="sidebar">
    <span class="close-btn" onclick="toggleSidebar()">×</span>
    <a href="index.php">🏠 الرئيسية</a>
    <a href="about.php">📖 عن الموقع</a>
    <a href="RR.php">➕ إضافة بلاغ جديد</a>
    <a href="helping.php">📞 مركز الاستفسارات</a>
    <a href="privacy.php">🔒 سياسة الخصوصية</a>
    <a href="login.php" style="color: #ff4444; border-top: 2px solid #f9f9f9;">🚪 تسجيل خروج</a>
  </div>

  <div class="container">
    <div class="welcome">🌟 مرحبًا بك في منصة زول مفقود</div>
    <div class="subtext" id="randomMessage">بصيص أمل في كل مكان...</div>
    <a href="home.php" class="start-button">ابدأ البحث الآن 🔍</a>
  </div>

  <footer>
    <p>🌸 زول مفقود - منصة إنسانية تجمع القلوب وتزرع الأمل 💖</p>
    <p>
      <a href="about.php">عن الموقع</a> | 
      <a href="privacy.php">الخصوصية</a> | 
      <a href="contact.php">تواصل معنا</a>
    </p>
    <div style="margin-top:20px; font-size: 26px;">
      <a href="#" title="فيسبوك">📘</a> 
      <a href="#" title="واتساب">💬</a> 
      <a href="#" title="تويتر">🐦</a>
    </div>
    <p style="margin-top:20px; opacity: 0.7; font-size: 14px;">© 2026 جميع الحقوق محفوظة - منصة زول مفقود</p>
  </footer>

  <script>
    // دالة التحكم في القائمة والطبقة المظلمة
    function toggleSidebar() {
      const sidebar = document.getElementById("sidebar");
      const overlay = document.getElementById("overlay");
      
      sidebar.classList.toggle("active");
      overlay.classList.toggle("active");
    }

    // رسائل ترحيب متجددة عند كل دخول
    const messages = [
      "💖 الأمل يبدأ من هنا، كل بلاغ يقربنا من اللقاء 🙂",
      "🌸 معًا نصنع غدًا أفضل، لا تفقد الأمل 🌟",
      "✨ كل مشاركة قد تكون سببًا في لمّ شمل أسرة 💫",
      "🌟 زول مفقود هنا ليجمع القلوب 💖🙂",
      "💫 الأمل لا ينقطع، وكل خطوة تقربنا من الفرح 🌸"
    ];
    document.getElementById("randomMessage").innerText = messages[Math.floor(Math.random() * messages.length)];
  </script>

</body>
</html>