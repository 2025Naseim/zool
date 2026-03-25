<?php
session_start();
$con = mysqli_connect("localhost","root","","phptutorials");
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>نموذج استفسار</title>
    <style>

        body {
    font-family: Arial, sans-serif;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    direction: rtl;
    background: linear-gradient(to bottom right, #fceabb, #f8b500, #ff6f61);
    background-size: cover;
    background-attachment: fixed;
    color: #333;
}

.container {
    background: rgba(255, 255, 255, 0.95);
    padding: 25px;
    border-radius: 10px;
    width: 350px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    position: relative;
}

.container::before {
    content: "🤝🌸 رسالة واحدة قد تصنع فرقًا";
    position: absolute;
    top: -30px;
    right: 0;
    left: 0;
    text-align: center;
    font-size: 14px;
    color: #fff;
    background: #ff6f61;
    padding: 5px;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #f08a5d;
}

label {
    display: block;
    margin-top: 10px;
    font-weight: bold;
}

input, textarea {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
    background-color: #fdfdfd;
}

button {
    width: 100%;
    margin-top: 15px;
    padding: 10px;
    border: none;
    background: linear-gradient(to right, #4facfe, #00c6ff);
    color: white;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s ease;
}

button:hover {
    background: linear-gradient(to right, #43e97b, #38f9d7);
}

#result {
    margin-top: 10px;
    text-align: center;
    font-weight: bold;
    color: #4caf50;
}

    </style>
</head>
<body>

<div class="container">
    <h2>استفسار</h2>

    <form action="helpingcode.php" method="POST">
        <label>الاسم</label>
        <input type="text" name="name" placeholder="اكتب اسمك">

        <label>البريد الإلكتروني</label>
        <input type="email" name="email" placeholder="example@email.com">

        <label>موضوع الاستفسار</label>
        <input type="text" name="subjects" placeholder="عنوان الاستفسار">

        <label>الرسالة</label>
        <textarea name="messages" rows="4" placeholder="اكتب استفسارك هنا"></textarea>

      <input type="submit" name="insert_data" value="ارسال">
        <p id="result"></p>
    </form>
</div>

<script src="script.js"></script>
</body>
</html>
