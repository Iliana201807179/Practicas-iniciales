<?php
include('db.php');
if (isset($_POST['save_producto'])) {
  $Nombre = $_POST['Nombre'];
  $Precio = $_POST['Precio'];
  $query = "INSERT INTO producto(Nombre, Precio) VALUES ('$Nombre', '$Precio')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  $_SESSION['message'] = 'Producto Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index_Producto.php');
}
?>