<?php include 'db.php'; session_start(); if(!isset($_SESSION['user_id'])) header("Location: login.php"); ?>
<!DOCTYPE html>
<html lang="ar">
<head><meta charset="UTF-8">
<title>عرض الأخبار</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-4">
  <div class="card shadow p-4">
    <h3 class="mb-3">جميع الأخبار</h3>
    <table class="table table-bordered table-hover">
      <tr class="table-primary">
        <th>#</th><th>العنوان</th><th>الفئة</th><th>التفاصيل</th><th>صورة</th><th>حذف</th>
      </tr>
      <?php
      $res=$conn->query("SELECT news.*, categories.category_name FROM news
                         LEFT JOIN categories ON news.category_id=categories.id");
      while($row=$res->fetch_assoc()){
        echo "<tr>
          <td>".$row['id']."</td>
          <td>".$row['title']."</td>
          <td>".$row['category_name']."</td>
          <td>".$row['details']."</td>
          <td>".($row['image'] ? "<img src='".$row['image']."' width='80'>" : "")."</td>
          <td><a href='delete_news.php?id=".$row['id']."' class='btn btn-danger btn-sm'>حذف</a></td>
        </tr>";
      }
      ?>
    </table>
  </div>
</div>
</body>
</html>

