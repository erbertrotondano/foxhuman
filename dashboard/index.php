<?php 
include_once '../functions.php'; 
$title = 'Mercado Genérico';
getHeader();
?>

	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 pl-5 text-center">
			<h3 id='page-intro' class='text-muted'>Dashboard</h3>
		</div>
	</div>
	<div  class="col-md-12 pt-3">
		<div class="row">
			<div class="card text-center" style="width: 18rem;">
			  <div class="card-body">
			    <a href="../produtos" class="btn btn-primary">Produtos</a>
			  </div>
			</div>
			<div class="card text-center" style="width: 18rem;">
			  <div class="card-body">
			    <a href="../categorias_de_produtos" class="btn btn-primary">Tipos de Produto</a>
			  </div>
			</div>
			<div class="card text-center" style="width: 18rem;">
			  <div class="card-body">
			    <a href="../imposto" class="btn btn-primary">Impostos</a>
			  </div>
			</div>
		</div>
	</div>
	


<?php function scripts(){ ?>
<?php } ?>
<?php getFooter(); ?>
