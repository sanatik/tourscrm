<?php	
	foreach($data->products as $product){
	
	$productName = NormDoc::model()->findByPk($product->product_id);
?>
<tr>
	<td>
		 <div class="item">
			<div class="item_image">
				<h5><?=mb_substr($productName->title,0,70, 'UTF-8');?></h5>
				<img src="/themes/front/images/item.png">
			</div>

			 <div class="item_desc">
				 <h4><?=$productName->title;?> </h4>

				  <!--Код МКС: 01.080.50<br>-->
				 <!--Категория: ГОСТ<br>-->
				 Обозначение: <?=$productName->ndcode?><br>
				  <!--Перевод: Русский<br>-->
				  <!--Количество страниц: 86<br>-->
				  <!--С голограммой-->
			 </div>
		 </div>
	</td>
	<td><span><?=$product->quantity;?>	шт</span></td>
	<td><span><?=$productName->price;?> т</span></td>
	<td><span><?=$productName->price*$product->quantity?> т</span></td>
</tr>
<?php }	?> 
