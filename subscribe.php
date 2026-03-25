<?php
// إعداد الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";   // ضع اسم المستخدم الخاص بك
$password = "";       // ضع كلمة المرور الخاصة بك
$dbname = "phptutorials";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// معالجة الإرسال
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO subscribing (username, rating, comment) VALUES ('$user', '$rating', '$comment')";
    if ($conn->query($sql) === TRUE) {
        $message = "✅ شكراً على تقييمك!";
    } else {
        $message = "❌ خطأ: " . $conn->error;
    }
}

// حساب متوسط التقييم
$result_avg = $conn->query("SELECT AVG(rating) as avg_rating FROM subscribing");
$row_avg = $result_avg->fetch_assoc();
$average = round($row_avg['avg_rating'], 2);

// جلب آخر التقييمات
$result = $conn->query("SELECT username, rating, comment, id FROM subscribing ORDER BY id DESC LIMIT 5");
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>تقييم الموقع</title>
  <style>
    body {
      font-family: Tahoma, Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background: #f9f9f9;
      direction: rtl;
    }
    h2, h3 {
      text-align: center;
    }
    form {
      max-width: 500px;
      margin: auto;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    input, select, textarea, button {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }
    button {
      background: #007BFF;
      color: #fff;
      border: none;
      cursor: pointer;
    }
    button:hover {
      background: #0056b3;
    }
    .rating-box {
      background: #fff;
      margin: 10px auto;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
      max-width: 600px;
    }
    .stars {
      color: gold;
      font-size: 20px;
    }
    /* جعل التصميم متجاوب */
    @media (max-width: 600px) {
      body {
        padding: 10px;
      }
      form, .rating-box {
        padding: 15px;
      }
      input, select, textarea, button {
        font-size: 14px;
      }
    }
  </style>
</head>
<body>
  <h2>قيّم موقعنا ⭐</h2>

  <?php if (!empty($message)) echo "<p style='text-align:center;color:green;'>$message</p>"; ?>

  <form method="post" action="">
    <label>اسم المستخدم:</label>
    <input type="text" name="username" required>

    <label>التقييم (من 1 إلى 5):</label>
    <select name="rating" required>
      <option value="1">⭐</option>
      <option value="2">⭐⭐</option>
      <option value="3">⭐⭐⭐</option>
      <option value="4">⭐⭐⭐⭐</option>
      <option value="5">⭐⭐⭐⭐⭐</option>
    </select>

    <label>تعليقك:</label>
    <textarea name="comment" rows="4"></textarea>

    <button type="submit">إرسال التقييم</button>
  </form>

</body>
</html>

