<?php session_start(); if(!isset($_SESSION['user_id'])) header("Location: login.php"); ?>
<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>لوحة التحكم</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<style>
body { background: #f3e5f5; font-family: "Cairo", sans-serif; direction: rtl; }
.card { border-radius: 15px; }
</style>
</head>
<body>
<div class="container mt-4">
  <div class="card shadow p-4">
    <h3 class="mb-4 text-center">مرحباً، <?php echo $_SESSION['name']; ?> 👋</h3>
    <div class="list-group">
      <a href="add_category.php" class="list-group-item list-group-item-action">➕ إضافة فئة</a>
      <a href="view_category.php" class="list-group-item list-group-item-action">📂 عرض الفئات</a>
      <a href="add_news.php" class="list-group-item list-group-item-action">📰 إضافة خبر</a>
      <a href="view_news.php" class="list-group-item list-group-item-action">📃 عرض الأخبار</a>
    </div>
  </div>
</div>
</body>
</html>

