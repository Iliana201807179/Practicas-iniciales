<?php
include('db.php');
if (isset($_POST['save_vendedor'])) {
  $Nombre = $_POST['Nombre'];
  $Telefono = $_POST['Telefono'];
  $query = "INSERT INTO vendedor(Nombre, Telefono) VALUES ('$Nombre', '$Telefono')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  $_SESSION['message'] = 'Vendedor Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');
}
?>