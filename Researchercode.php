<?php
session_start();
$con = mysqli_connect("localhost","root","","phptutorials");

if(isset($_POST['insert_data'])){
    $name = $_POST['name'];
    $fam = $_POST['Fim'];
    $mather = $_POST['mather'];
    $place = $_POST['place'];
    $vil = $_POST['vil'];
    $bro = $_POST['bro'];
    $GR = $_POST['GR'];
    $placenow = $_POST['relation'];
    $live = $_POST['live'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $query = "INSERT INTO research (name,Fim,mather,place,vil,bro,GR,relation,live,phone,email) 
              VALUES ('$name','$fam','$mather','$place','$vil','$bro','$GR','$placenow','$live','$phone','$email')";
    $query_run = mysqli_query($con,$query);

    // مجموعة رسائل الأمل
    $success_messages = [
        "🌸 شكراً لك، الأمل دائمًا يضيء الطريق 💖🙂",
        "✨ كل خطوة تقربنا من لمّ الشمل 🌟🙂",
        "💖 تذكر أن الأمل لا ينقطع أبدًا 🙂🌸",
        "🌟 معًا نصنع غدًا أفضل، ابتسم 🙂💫",
        "🌸 الأمل هو قوتنا، شكراً لمساهمتك 💖🙂"
    ];

    $error_messages = [
        "❌ حدث خطأ، لكن لا تفقد الأمل 🌟🙂",
        "💔 لم يتم الحفظ، حاول مرة أخرى 🙂🌸",
        "⚠️ هناك مشكلة، لكن الأمل دائمًا معنا 💖🙂",
        "❌ لم تنجح العملية، ابتسم وحاول مجددًا 🙂✨"
    ];

    if($query_run){
        // اختيار رسالة عشوائية
        $msg = $success_messages[array_rand($success_messages)];
        echo "
        <div style='text-align:center; margin-top:50px; font-family:Tahoma;'>
            <h2 style='color:green;'>✅ تم حفظ البيانات بنجاح</h2>
            <p style='font-size:18px; color:#333;'>$msg</p>
            <a href='index.php' style='display:inline-block; margin-top:20px; 
               padding:10px 20px; background:#007BFF; color:white; text-decoration:none; border-radius:5px;'>
               العودة للصفحة الرئيسية
            </a>
        </div>
        ";
    } else {
        $msg = $error_messages[array_rand($error_messages)];
        echo "
        <div style='text-align:center; margin-top:50px; font-family:Tahoma;'>
            <h2 style='color:red;'>❌ حدث خطأ أثناء حفظ البيانات</h2>
            <p style='font-size:18px; color:#333;'>$msg</p>
            <a href='index.php' style='display:inline-block; margin-top:20px; 
               padding:10px 20px; background:#dc3545; color:white; text-decoration:none; border-radius:5px;'>
               العودة للنموذج
            </a>
        </div>
        ";
    }
}
?>
