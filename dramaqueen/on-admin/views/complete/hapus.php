<?php
require_once('koneksi.php');
$id = $_POST['delete_id'];
  $sql = mysqli_query($connect,"DELETE FROM complete WHERE id='$id'");
?>