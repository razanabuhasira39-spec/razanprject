<?php
include 'db.php'; session_start();
if(!isset($_SESSION['user_id'])) header("Location: login.php");
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $conn->query("DELETE FROM news WHERE id=$id");
}
header("Location: view_news.php");
?>
