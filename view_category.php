<?php include 'db.php'; session_start(); if(!isset($_SESSION['user_id'])) header("Location: login.php"); ?>
<!DOCTYPE html>
<html lang="ar">
<head><meta charset="UTF-8">
<title>عرض الفئات</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-4">
  <div class="card shadow p-4">
    <h3 class="mb-3">جميع الفئات</h3>
    <table class="table table-bordered table-hover">
      <tr class="table-primary"><th>#</th><th>اسم الفئة</th></tr>
      <?php
      $res=$conn->query("SELECT * FROM categories");
      while($row=$res->fetch_assoc()){
        echo "<tr><td>".$row['id']."</td><td>".$row['category_name']."</td></tr>";
      }
      ?>
    </table>
  </div>
</div>
</body>
</html>
