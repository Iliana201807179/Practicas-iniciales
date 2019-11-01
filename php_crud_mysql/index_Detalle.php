<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_DetalleFactura.php" method="POST">
          <div class="form-group">
            <input type="text" name="Factura_NoFactura" class="form-control" placeholder="No. de factura" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Cantidad" class="form-control" placeholder="Cantidad de productos" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Id_Producto" class="form-control" placeholder="Codigo del vendedor" autofocus>
          </div>
          <input type="submit" name="save_DetalleFactura" class="btn btn-success btn-block" value="save factura">
          </form>
          <form action="prueba.php" method="POST">
          <input type="submit" name="prueba" class="btn btn-success btn-block" value="save">
          </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No. Factura</th>
            <th>ID Producto</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM detallefactura";
          $result_detallefactura = mysqli_query($conn, $query);    
          while($row = mysqli_fetch_assoc($result_detallefactura)) { ?>
          <tr>
            <td><?php echo $row['Factura_NoFactura']; ?></td>
            <td><?php echo $row['Id_Producto']; ?></td>
            <td><?php echo $row['Cantidad']; ?></td>
            <td><?php echo $row['Subtotal']; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>