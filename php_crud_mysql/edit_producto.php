<?php
include("db.php");
$Nombre = '';
$Precio= '';
if  (isset($_GET['idProducto'])) {
  $idProducto = $_GET['idProducto'];
  $query = "SELECT * FROM producto WHERE idProducto=$idProducto";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $Nombre = $row['Nombre'];
    $Precio = $row['Precio'];
  }
}
if (isset($_POST['update'])) {
  $idProducto = $_GET['idProducto'];
  $Nombre= $_POST['Nombre'];
  $Precio = $_POST['Precio'];
  $query = "UPDATE producto set Nombre = '$Nombre', Precio = '$Precio' WHERE idProducto=$idProducto";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Producto Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index_Producto.php');
}
?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_producto.php?idProducto=<?php echo $_GET['idProducto']; ?>" method="POST">
        <div class="form-group">
          <input name="Nombre" type="text" class="form-control" value="<?php echo $Nombre; ?>" placeholder="Modifica el nombre del producto">
        </div>
        <div class="form-group">
          <input name="Precio" type="text" class="form-control" value="<?php echo $Precio; ?>" placeholder="Modifica el precio del producto">
        </div>
        <button class="btn-success" name="update">
          Modificar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>