<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>إنشاء حساب</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<style>
body {
  background: linear-gradient(to right, #d16ba5, #c777b9, #ba83ca);
  font-family: "Cairo", sans-serif;
  direction: rtl;
}
.card {
  border-radius: 20px;
  background: #fff;
}
.btn-custom {
  background: #9c27b0;
  color: #fff;
}
.btn-custom:hover {
  background: #7b1fa2;
}
</style>
</head>
<body>
<div class="container mt-5">
  <div class="card shadow p-4 mx-auto" style="max-width:400px;">
    <h3 class="text-center mb-3">✨ إنشاء حساب جديد ✨</h3>
    <form method="POST">
      <input type="text" name="name" class="form-control mb-3" placeholder="اسمك" required>
      <input type="email" name="email" class="form-control mb-3" placeholder="الإيميل" required>
      <input type="password" name="password" class="form-control mb-3" placeholder="كلمة المرور" required>
      <button type="submit" name="register" class="btn btn-custom w-100">تسجيل</button>
    </form>
    <a href="login.php" class="d-block text-center mt-3">لديك حساب؟ تسجيل الدخول</a>
    <?php
    if(isset($_POST['register'])){
      $name=$_POST['name'];
      $email=$_POST['email'];
      $pass=password_hash($_POST['password'], PASSWORD_BCRYPT);
      $sql="INSERT INTO users (name,email,password) VALUES ('$name','$email','$pass')";
      echo $conn->query($sql) ?
           "<div class='alert alert-success mt-3'>تم إنشاء الحساب بنجاح!</div>" :
           "<div class='alert alert-danger mt-3'>حدث خطأ.</div>";
    }
    ?>
  </div>
</div>
</body>
</html>

