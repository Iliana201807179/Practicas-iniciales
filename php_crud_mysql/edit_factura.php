<?php
include("db.php");
$Nombre = '';
$Nit= '';
$Vendedor_Codigo='';
if  (isset($_GET['NoFactura'])) {
  $NoFactura = $_GET['NoFactura'];
  $query = "SELECT * FROM factura WHERE NoFactura=$NoFactura";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $Nombre = $row['Nombre'];
    $Nit = $row['Nit'];
    $Vendedor_Codigo=$row['Vendedor_Codigo'];
  }
}
if (isset($_POST['update'])) {
  $NoFactura = $_GET['NoFactura'];
  $Nombre= $_POST['Nombre'];
  $Nit = $_POST['Nit'];
  $Vendedor_Codigo = $_POST['Vendedor_Codigo'];
  $query = "UPDATE factura set Nombre = '$Nombre', Nit = '$Nit', Vendedor_Codigo='$Vendedor_Codigo' WHERE NoFactura=$NoFactura";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Factura Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index_factura.php');
}
?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_factura.php?NoFactura=<?php echo $_GET['NoFactura']; ?>" method="POST">
        <div class="form-group">
          <input name="Nombre" type="text" class="form-control" value="<?php echo $Nombre; ?>" placeholder="Modifica el nombre del cliente">
        </div>
        <div class="form-group">
          <input name="Nit" type="text" class="form-control" value="<?php echo $Nit; ?>" placeholder="Modifica el NIT del cliente">
        </div>
        <div class="form-group">
          <input name="Vendedor_Codigo" type="text" class="form-control" value="<?php echo $Vendedor_Codigo; ?>" placeholder="Modifica el codigo del vendedor">
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