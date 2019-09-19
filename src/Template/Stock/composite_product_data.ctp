<?php
// Change a template
$this->Paginator->meta(['prev' => false, 'next' => false]);
$this->Paginator->setTemplates([
	'number' 		=> '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
	'nextActive' 	=> '<li class="page-item"><a class="page-link" href="{{url}}" title="Pr&oacute;ximo">{{text}}</a></li>',
	'prevActive' 	=> '<li class="page-item"><a class="page-link" href="{{url}}" title="Anterior">{{text}}</a></li>',
	'nextDisabled' 	=> '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
	'prevDisabled' 	=> '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
	'current' 		=> '<li class="page-item active"><a class="page-link" href="">{{text}}</a></li>'
]);
?>
<table class='table table-hover' id='tblResult'>
    <thead>
        <tr>
            <th class='first-column'><input type='checkbox' id='chCheckAll' name='chCheckAll'></th>
            <th>Novo</th>
            <th>SKU</th>
            <th>Pre&ccedil;o Venda</th>
            <th class='text-center last-column'>A&ccedil;&atilde;o</th>
        </tr>
    </thead>
    <tbody>
    <?php if($product_kit_list->count()>0):?>
    <?php foreach($product_kit_list as $product): ?>
        <?php if($product->STATUS=="D"){ $inicio = "<del>"; $fim = "</del>"; $disabled=" disabled"; }else{ $inicio = ""; $fim = ""; $disabled=""; }?>
        <tr>
            <td class="first-column"><input type="checkbox" id="check_list[]" name="check_list[]" value="<?php echo $product->IDPRODUTO; ?>"></td>
            <td><?php echo $inicio.$product->NOME.$fim; ?></td>
            <td><?php echo $inicio.$product->SKU.$fim; ?></td>
            <td class="text-right"><?php echo $inicio.$this->Number->currency($product->PRECO_VENDA,"BRL").$fim; ?></td>
            <td class="last-column"><a href="<?php echo $this->Url->build('stock/product_kit_create/'.$product->IDPRODUTO);?>" class="btn btn-light btn-sm<?php echo $disabled; ?>" id="btnEdit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></td>
        </tr>
    <?php endforeach;?>
    <?php else: ?>
        <tr><td colspan="5" class="text-center">Nenhum registro encontrado!</td></tr>
    <?php endif;?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5">
            	<div class="row">
					<div class="col-sm">
						<?php
							echo $this->Paginator->counter(array(
							'format' => "P&aacute;gina {{page}} de {{pages}}, exibindo <strong>{{current}}</strong> registros do total de {{count}}"
							));
						?>
					</div>
					<div class="col-sm">
						<ul class="pagination justify-content-end">
							<?php echo $this->Paginator->prev('<<'); ?><?php echo $this->Paginator->numbers(); ?><?php echo $this->Paginator->next('>>'); ?>
						</ul>
					</div>
				</div>
            </td>
        </tr>
    </tfoot>
</table>