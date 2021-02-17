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
		<div class="row mb-3">
			<div class="col-md-6">
				<div class="card text-center w-100">
				  <div class="card-body">
				    <a href="../produtos" class="btn btn-primary">Produtos</a>
				  </div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card text-center w-100">
				  <div class="card-body">
				    <a href="../categorias_de_produtos" class="btn btn-primary">Tipos de Produto</a>
				  </div>
				</div>
			</div>
		</div>
		<div class="row mb-3">
				<div class="col-md-6">
					<div class="card text-center w-100">
					  <div class="card-body">
					    <a href="../imposto" class="btn btn-primary">Impostos</a>
					  </div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card text-center w-100">
					  <div class="card-body">
					    <a href="../comprar" class="btn btn-primary">Comprar</a>
					  </div>
					</div>
				</div>
		</div>
	</div>
	


<?php function scripts(){ ?>
<?php } ?>
<?php getFooter(); ?>
