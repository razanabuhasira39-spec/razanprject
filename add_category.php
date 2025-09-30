<?php include 'db.php'; session_start(); if(!isset($_SESSION['user_id'])) header("Location: login.php"); ?>
<!DOCTYPE html>
<html lang="ar">
<head><meta charset="UTF-8">
<title>إضافة فئة</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-4">
  <div class="card shadow p-4 mx-auto" style="max-width:400px;">
    <h3 class="text-center mb-3">إضافة فئة</h3>
    <form method="POST">
      <input type="text" name="category" class="form-control mb-3" placeholder="اسم الفئة" required>
      <button name="save" class="btn btn-success w-100">حفظ</button>
    </form>
    <?php
    if(isset($_POST['save'])){
      $cat=$_POST['category'];
      $conn->query("INSERT INTO categories (category_name) VALUES ('$cat')");
      echo "<div class='alert alert-success mt-3'>تم الحفظ!</div>";
    }
    ?>
  </div>
</div>
</body>
</html>
