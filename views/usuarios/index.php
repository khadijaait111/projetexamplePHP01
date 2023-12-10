<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>

<div id= "content">
        <section>
        <div class="container mt-5">
<div class="row">
<div class="col-sm-12 mb-3">
<center><h1>Productos</h1></center>
<a href="producto_agregar.php"><input  class="btn btn-primary" type="button" value="Ajouter Produit"></a>
</div>
<div class="col-sm-12">
<div class="table-responsive">


<table class="table table-striped table-hover">
<thead>

<tr>
<th>Reference</th>
<th>Libelle</th>
<th>Prix Unitaire</th>
<th>Quantite</th>
<th>Date Achat</th>
<th>Categorie</th>
<th>Photo Produit</th>
<th>ACTION</th>


</tr>

</thead>

<tbody>

<?php

$sql = "SELECT * FROM productos";
$productos = mysqli_query($conexion, $sql);
if($productos -> num_rows > 0){
foreach($productos as $key => $row ){
?>
<!--fonctionnement et styles pour les cellules en erreur-->
<?php

if ($row['cantidad'] <= $row['cantidad_min']) {
  $color = '#F78E8E';
  $clase = 'problema';
} else {
  $clase = 'correcto';
}
 
// ...

?>
<style>
      .problema{
        background-color: <?php echo $color?>;
        color: #000000;
    }
</style>
<!-- commence le tableau-->
<tr>
<td <?php echo  'class="'.$row['categorias'] .'"'; ?>><?php echo $row['id']; ?></td>
<td><?php echo $row['nombre']; ?></td>
<td><?php echo $row['descripcion']; ?></td>
<td><?php echo $row['color']; ?></td>
<td><?php echo $row['precio']; ?>$</td>



<td <?php echo  'class="'.$clase .'"'; ?>><?php echo $row['cantidad']; ?></td>
<td><?php echo $row['cantidad_min']; ?></td>


<td><?php echo $row['categorias']; ?></td>
<td><img width="100" src="data:image;base64,<?php echo base64_encode($row['imagen']);  ?>" ></td>

<td>
  <a href="producto_editar.php?id=<?php echo $row['id']?>">
    <div">
      Editer
    </div>
  </a>
  <a>|</a>
  <a href="producto_eliminar.php?id=<?php echo $row['id']?>">
    <div">
    Supprimer
    </div>
  </a>
</td>
</tr>


<?php
}
}else{

    ?>
    <tr class="text-center">
    <td colspan="4">Aucun produit existant</td>
    </tr>

    <?php
}?>
</tbody>

</table>
</div>
</div>
</div>
</div>
        </section>


        <section>
            <div class= "container">
                <div class= "row">
                    <div class= "col-lg-9">
            </div>
        </section>
    </div>
   
</html
