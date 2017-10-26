<table  style="border-collapse:collapse;margin:0 auto" border="0" width="90%" >
	<tr>
		<td colspan="3" >
			<h1 style="font-size: 50px;">ORDER DETAILS</h1>

		</td>
	</tr>
	<tr>
		<td>
			<table border="1"  style="border-collapse:collapse" >
			  
			    <tr>
			    
			       <td class="two wide column" bgcolor="#f4f4f4"><strong>Customer Code</strong></td>
			      <td># <?=$order['order_coustomer_id']?></td>
			    </tr>
			    <tr>
			     
			       <td class="two wide column" bgcolor="#f4f4f4"><strong>CA By Supplie</strong></td>
			      <td># <?=$crws_code ?></td>
			    </tr>
			    <tr>
			      
			       <td class="two wide column" bgcolor="#f4f4f4"><strong>Order Number</strong></td>
			      <td># <?=$order['order_id']?></td>
			    </tr>
			    <tr>
			     
			       <td class="two wide column" bgcolor="#f4f4f4"><strong>Order Date</strong></td>
			      <td><?=$order['order_date'] ?></td>
			    </tr>
			    <tr>
			      
			       <td class="two wide column" bgcolor="#f4f4f4"><strong>Delivery Required</strong></td>
			      <td><?=$order['order_required_delivery_date'] ?></td>
			    </tr>
			  
			</table>
		</td>
		<td>
			<table border="1"  style="border-collapse:collapse">
			  <tbody>
			    <tr>
			      <td class="" bgcolor="#f4f4f4"><strong>Supplier Code</strong></td>
			      <td># <?=$order['order_supplier_id'] ?></td>
			    </tr>
			    <tr>
			      <td class="" bgcolor="#f4f4f4"><strong>Supplier PO</strong></td>
			      <td></td>
			    </tr>
			    <tr>
			     <td class="" bgcolor="#f4f4f4"><strong>ETA </strong></td>
			      <td><?=$order['order_eta'] ?></td>
			    </tr>
			    <tr>
			       <td class="" bgcolor="#f4f4f4"><strong>Tracking</strong></td>
			      <td><?=$order['order_tracking'] ?></td>
			    </tr>
			    <tr>
			       <td class="" bgcolor="#f4f4f4"><strong>Notes</strong></td>
			      <td><?=$order['supplier_special_note'] ?></td>
			    </tr>
			  </tbody>
			</table>
		</td>
		<td>
			<p style="text-align:center;font-size:30px"><?=strtoupper($order['order_status']) ?></p>
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<div class="vsap" style="height: 50px"></div>
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<table class="" style="border-collapse:collapse" border="1" width="100%">
				
					<tr>
						<td  bgcolor="#f4f4f4">No</td>
						<td  bgcolor="#f4f4f4" >Product Name</td>
						<td  bgcolor="#f4f4f4">Ordered Quantity</td>
						<td  bgcolor="#f4f4f4">Quantity Received</td>
						<td  bgcolor="#f4f4f4">Unit Price</td>
						<td  bgcolor="#f4f4f4">GST</td>
					</tr>
					
			

				
					<?php  foreach ($items as $item) :?>
						<tr>
							<td><?=$item['item_id'] ?></td>
							<td><?=$item['product_title'] ?> - # <?=$item['item_id'] ?></td>
							<td><?=$item['item_quantity'] ?> <?=$item['unit_name'] ?></td>
							<td  class="trim"><?=$item['item_recived_quantity'] ?> <?=$item['unit_name'] ?></td>
							<td> $<?=$item['product_regular_unit_price'] ?></td>
							<td>n/a</td>
							
						</tr>
					<?php endforeach; ?>
				
			
			</table>
		</td>
	</tr>

	<tr>
		<td colspan="3">
			<div class="vsap" style="height: 50px"></div>
		</td>
	</tr>

	<tr>
		<td>
			<p>
				<?=$order['order_notes'] ?>
			</p>
		</td>
		<td></td>
		<td>
			<table border="1"  style="border-collapse:collapse" width="100%">
			  <tbody>
			    <tr>
			      <td class="" bgcolor="#f4f4f4"><strong>Total Item</strong></td>
			      <td><?=count($items) ?></td>
			    </tr>
			    <tr>
			      <td class="" bgcolor="#f4f4f4"><strong>Total Quantity Ordered</strong></td>
			      <td><?=$totalQuantityOrdered ?></td>
			    </tr>
			    <tr>
			     <td class="" bgcolor="#f4f4f4"><strong>Total Quantity Received</strong></td>
			      <td><?=$totalQuantityReceived ?></td>
			    </tr>
			   
			  

			    <tr>
			       <td class="" bgcolor="#f4f4f4"><strong>Total Cost</strong></td>
			      <td>$<?=$order['order_total_price'] ?></td>
			    </tr>
			  </tbody>
			</table>
		</td>
	</tr>
</table>