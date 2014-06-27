<div class="main carttable">
	<table>
		<tr><h1 id="carttitle">Cart</h1></tr>
		<tr>
			<th>Image</th>
			<th width="300">Name</th>
			<th width="150">Price</th>
			<th width="280">Quantity</th>
			<th width="150">Total Price</th>
			<th></th>
		</tr>
		<!-- if there are some products in the cart -->
		<?php if(count($cart_products)): ?>
			<!-- for each product in cart_products do all this -->
			<?php foreach($cart_products as $product): ?>
				<tr>
					
					<td><img class="cartimage" src="<?=$product['image']?>"></td>
					<td><?=$product['name']?></td>
					<td>$<?=$product['price']?></td>
					<td>
						<?=Form::open('update_quantity.php')?>
							<?=Form::hidden('id', $product['id'])?>
							<?=Form::number('quantity', $product['quantity'], 'min="1" style="width: 100px;"')?>
							<?=Form::submit('save', 'style="width: 60px;"')?>
						<?=Form::close()?>
					</td>
					<td>$<?=$product['total_price']?></td>
					<td><a class="circle" href="remove_from_cart.php?id=<?=$product['id']?>"><i class="istyle fa fa-times"></i></a></td>

				</tr>
			<?php endforeach; ?>
		<!-- if there are no products in the cart-->
		<?php else: ?>

			<tr>
				<td colspan="6">There are no products in your cart.</td>
			</tr>

		<?php endif; ?>
	</table>

	<p class="total">Grand Total: $<?=$grand_total?></p>

</div>