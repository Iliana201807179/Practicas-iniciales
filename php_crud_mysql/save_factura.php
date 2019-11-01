<?php
include('db.php');
if (isset($_POST['save_factura'])) {
  $Nombre = $_POST['Nombre'];
  $Nit = $_POST['Nit'];
  $Vendedor_Codigo = $_POST['Vendedor_Codigo'];
  $query = "INSERT INTO factura(Nombre, Nit, Vendedor_Codigo) VALUES ('$Nombre', '$Nit',$Vendedor_Codigo)";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  $_SESSION['message'] = 'Factura Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index_factura.php');
}
?>