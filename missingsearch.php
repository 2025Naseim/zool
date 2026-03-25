<!doctype html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- خط عربي أنيق -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>نافذة البحث عن المفقودين</title>
    <style>
        body {
            background-color: #f5f9fc;
            font-family: 'Tajawal', sans-serif;
        }
        .card-header {
            background-color: #0077b6;
            color: #fff;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #0096c7;
            border: none;
        }
        .btn-primary:hover {
            background-color: #023e8a;
        }
        .welcome-message {
            background: linear-gradient(90deg, #0077b6, #0096c7);
            color: #fff;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            animation: fadeIn 2s ease-in-out;
        }
        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }
        /* تخصيص عرض البطاقات على الجوال */
        @media (max-width: 767px) {
            .desktop-table {
                display: none;
            }
            .mobile-card {
                display: block;
                margin-bottom: 15px;
                border-radius: 10px;
                box-shadow: 0 2px 6px rgba(0,0,0,0.1);
                background-color: #ffffff;
            }
            .mobile-card .card-body p {
                margin: 0;
                font-size: 14px;
            }
            .mobile-card .card-body p strong {
                color: #0077b6;
            }
        }
        @media (min-width: 768px) {
            .mobile-card {
                display: none;
            }
        }
    </style>
</head>
<body>

<?php
// دالة لإضافة ابتسامة إذا وُجد إيموجي
function addSmileIfEmoji($text) {
    $emojiPattern = '/[\x{1F600}-\x{1F64F}\x{1F300}-\x{1F5FF}\x{1F680}-\x{1F6FF}\x{2600}-\x{26FF}\x{2700}-\x{27BF}]/u';
    if (preg_match($emojiPattern, $text)) {
        return $text . " 🙂";
    }
    return $text;
}
?>

<div class="container-fluid">
    <div class="row" style="background-color: #B0E0E6;">
        <div class="col-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>نافذة للمفقود يبحث عن أسرته</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-7">
                            <form action="" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" required 
                                        value="<?php if(isset($_GET['search'])){echo htmlspecialchars($_GET['search']); } ?>" 
                                        class="form-control" 
                                        placeholder="ادخل اسم المفقود أو والدة المفقود">
                                    <button type="submit" class="btn btn-primary">بحث</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php 
            $con = mysqli_connect("localhost","root","","phptutorials");
            if(isset($_GET['search'])) {
                $filtervalues = mysqli_real_escape_string($con, $_GET['search']);
                $query = "SELECT * FROM missing
                          WHERE name LIKE '%$filtervalues%' 
                             OR mather LIKE '%$filtervalues%'";
                $query_run = mysqli_query($con, $query);

                // رسالة ترحيبية ديناميكية حسب النتيجة
                if(mysqli_num_rows($query_run) > 0) {
                    echo "<div class='welcome-message'>
                            ✅ تم العثور على نتائج مطابقة، نأمل أن تساعدك هذه المعلومات في لمّ شمل أحبائك 💙 🙂
                          </div>";
                } else {
                    echo "<div class='welcome-message'>
                            ❌ نعتذر، لم نجد نتائج بهذا البحث، لكننا هنا معك دومًا لمساعدتك 🌷 🙂
                          </div>";
                }
            }
        ?>

        <!-- الجدول للشاشات الكبيرة -->
        <div class="col-12 desktop-table">
            <div class="card mt-4">
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover table-striped align-middle text-center">
                        <thead class="table-primary">
                            <tr>
                                   <th>اسم الباحث</th>
                                    <th>اسم المفقود</th>
                                    <th>اسم والدة المفقود</th>
                                    <th>منطقة المفقود</th>
                                    <th>مكان الميلاد</th>
                                    <th>اسم احد الاخوه</th>
                                    <th> اسم الجار </th>
                                    
                                    <th>مكات اقامة الباحث</th>
                                    <th>تلفون</th>
                                    <th>البريد</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if(isset($query_run)) {
                                    if(mysqli_num_rows($query_run) > 0) {
                                        foreach($query_run as $items) {
                                            echo "<tr>
                                                <td>".addSmileIfEmoji($items['name'])."</td>
                                                <td>".addSmileIfEmoji($items['fam'])."</td>
                                                <td>".addSmileIfEmoji($items['mather'])."</td>
                                                <td>".addSmileIfEmoji($items['place'])."</td>
                                                <td>".addSmileIfEmoji($items['vil'])."</td>
                                                <td>".addSmileIfEmoji($items['bro'])."</td>
                                                <td>".addSmileIfEmoji($items['GR'])."</td>
                                                <td>".addSmileIfEmoji($items['placenow'])."</td>
                                                <td>".addSmileIfEmoji($items['phone'])."</td>
                                                <td>".addSmileIfEmoji($items['email'])."</td>
                                            </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='11' class='text-danger'>لا يوجد اسم مطابق بهذا البحث</td></tr>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- البطاقات على الجوال -->
        <div class="col-12">
            <?php 
                if(isset($query_run)) {
                    if(mysqli_num_rows($query_run) > 0) {
                        foreach($query_run as $items) {
                            echo "<div class='card mobile-card'>
                                    <div class='card-body'>
                                        <p><strong>اسم المفقود:</strong> ".addSmileIfEmoji($items['name'])."</p>
                                        <p><strong>كبير الأسرة:</strong> ".addSmileIfEmoji($items['fam'])."</p>
                                        <p><strong>اسم أم المفقود:</strong> ".addSmileIfEmoji($items['mather'])."</p>
                                        <p><strong>مكان ميلاد المفقود:</strong> ".addSmileIfEmoji($items['place'])."</p>
                                        <p><strong>منطقة الميلاد:</strong> ".addSmileIfEmoji($items['vil'])."</p>
                                        <p><strong>اسم أحد الإخوة:</strong> ".addSmileIfEmoji($items['bro'])."</p>
                                        <p><strong>اسم الجار:</strong> ".addSmileIfEmoji($items['GR'])."</p>
                                        <p><strong>مكان  اقامةالباخث:</strong> ".addSmileIfEmoji($items['placenow'])."</p>
                                        
                                        <p><strong>الهاتف:</strong> ".addSmileIfEmoji($items['phone'])."</p>
                                        <p><strong>ايميل:</strong> ".addSmileIfEmoji($items['email'])."</p>
                                    </div>
                                  </div>";
                        }
                    } else {
                        echo "<div class='card mobile-card'>
                                
                              </div>";
                    }
                }
            ?>
        </div>

    </div>
</div>

<script src="https://