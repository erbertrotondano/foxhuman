<?php 
include_once '../functions.php'; 
$title = 'Mercado Genérico - Listagem de Produtos';
getHeader();
?>
	<div class="d-flex justify-content-between">
		<a href="../dashboard" type="button" class="btn btn-danger">Voltar</a>
		<h3>Impostos</h3>		
		<a href="novo.php" type="button" class="btn btn-primary">Novo</a>
	</div>
	<div  class="col-md-12 pt-3">
		<div class="row">
			<ul class="list-group w-100">
			<?php 
			$taxes = getAllTaxes($CONNECTION); 
			foreach($taxes as $tax){ ?>
				<li class="list-group-item">
					<?php echo $tax['tax_name']; ?>	
					<div class="float-right">
						<a href="excluir.php?id=<?php echo $tax['id'] ?>" class="badge badge-danger">X</a>
					</div>
				</li>
			<?php } ?>
			</ul>
		</div>
	</div>
	


<?php function scripts(){ ?>
<?php } ?>
<?php getFooter(); ?>
