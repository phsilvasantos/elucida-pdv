<br/>    
<form id="frmRegs" name="frmRegs">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-sm">
					<i class="fas fa-angle-right"></i> Opera&ccedil;&otilde;es Financeiras
				</div>
				<div lang="col-sm text-right">
					<a href="<?php echo $this->Url->build('/financial/financial_operation_create');?>" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> Nova</a>
					<a href="<?php echo $this->Url->build('/financial/financial_operation_order')?>" class="btn btn-sm btn-warning"><i class="fas fa-sort"></i> Ordem</a>
					<button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#modalFilter"><i class="fas fa-filter"></i> Filtrar</button>
				</div>
			</div>
		</div>
		<div class="card-body" id="divResult"></div>
	</div>
</form>
<br/>

<script>
$(document).ready(function(){
    url_data = '<?=$this->Url->build($url_data); ?>';
    getData();
   	url_filter = '<?=$this->Url->build($url_filter); ?>';
});
</script>