<?php include 'db.php'; session_start(); if(!isset($_SESSION['user_id'])) header("Location: login.php"); ?>
<!DOCTYPE html>
<html lang="ar">
<head><meta charset="UTF-8">
<title>إضافة خبر</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-4">
  <div class="card shadow p-4">
    <h3 class="text-center mb-3">إضافة خبر</h3>
    <form method="POST" enctype="multipart/form-data">
      <input type="text" name="title" class="form-control mb-3" placeholder="عنوان الخبر" required>
      <textarea name="details" class="form-control mb-3" placeholder="تفاصيل الخبر" required></textarea>
      <select name="category" class="form-select mb-3" required>
        <option value="">اختر الفئة</option>
        <?php
        $cats=$conn->query("SELECT * FROM categories");
        while($c=$cats->fetch_assoc()){echo "<option value='".$c['id']."'>".$c['category_name']."</option>";}
        ?>
      </select>
      <input type="file" name="image" class="form-control mb-3">
      <button name="save" class="btn btn-primary w-100">حفظ</button>
    </form>
    <?php
    if(isset($_POST['save'])){
      $title=$_POST['title'];
      $details=$_POST['details'];
      $cat=$_POST['category'];
      $user=$_SESSION['user_id'];
      $img="";
      if(!empty($_FILES['image']['name'])){
        if(!is_dir("uploads")) mkdir("uploads");
        $img="uploads/".basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'],$img);
      }
      $sql="INSERT INTO news (title,details,image,category_id,user_id)
            VALUES ('$title','$details','$img','$cat','$user')";
      $conn->query($sql);
      echo "<div class='alert alert-success mt-3'>تمت الإضافة!</div>";
    }
    ?>
  </div>
</div>
</body>
</html>

