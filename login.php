<?php include 'db.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>تسجيل الدخول</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<style>
body {
  background: linear-gradient(to right, #6a11cb, #2575fc);
  font-family: "Cairo", sans-serif;
  direction: rtl;
}
.card {
  border-radius: 20px;
  background: #fff;
}
.btn-custom {
  background: #673ab7;
  color: #fff;
}
.btn-custom:hover {
  background: #512da8;
}
</style>
</head>
<body>
<div class="container mt-5">
  <div class="card shadow p-4 mx-auto" style="max-width:400px;">
    <h3 class="text-center mb-3">🔑 تسجيل الدخول</h3>
    <form method="POST">
      <input type="email" name="email" class="form-control mb-3" placeholder="الإيميل" required>
      <input type="password" name="password" class="form-control mb-3" placeholder="كلمة المرور" required>
      <button name="login" class="btn btn-custom w-100">دخول</button>
    </form>
    <?php
    if(isset($_POST['login'])){
      $email=$_POST['email']; $pass=$_POST['password'];
      $res=$conn->query("SELECT * FROM users WHERE email='$email'");
      if($res->num_rows>0){
        $row=$res->fetch_assoc();
        if(password_verify($pass,$row['password'])){
          $_SESSION['user_id']=$row['id']; $_SESSION['name']=$row['name'];
          header("Location: dashboard.php");
        } else echo "<div class='alert alert-danger mt-3'>كلمة مرور خاطئة</div>";
      } else echo "<div class='alert alert-danger mt-3'>الحساب غير موجود</div>";
    }
    ?>
  </div>
</div>
</body>
</html>

