<?php

if (isset($_COOKIE['item'])) 
{
	# code...
	foreach ($_COOKIE['item'] as $name1 => $value) 
	{
		# code...
		if (isset($_POST["delete$name1"])) 
		{
			# code...
			setcookie("item[$name1]","",time()-1800);
			?>
			<script type="text/javascript">
				window.location.href=window.location.href;
			</script>
			<?php
		}
	}
}


include "header.php";
?>
<div class="container my-5">
	<h2 class="text-center ">Cart Details</h2>
	<table class="table table-hover text-center mt-5">
		<?php
		$d=0;
		if(isset($_COOKIE['item']))
		{
			$d=$d+1;
		}
		if ($d==0) {
                                            	# code...
			echo "<br>";
			echo "<h4>No items in the Cart</h4>";
			echo "<br>";

		}
		else{
			?>
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Product Name</th>
					<th scope="col">Price</th>
					<th scope="col">Quantity</th>
					<th scope="col">Total</th>
					<th scope="col">Remove</th>
				</tr>
			</thead>
			<tbody>

				<?php
				foreach ($_COOKIE['item'] as $name => $value) 
				{
					$values11=explode("__", $value);

					?>
					<tr>
						<th scope="row "><img src="<?php echo $values11[0] ?>" height="50px" ></th>
						<td><?php echo $values11[1] ?></td>
						<td><?php echo $values11[2] ?></td>
						<td>
							<?php echo $values11[3] ?>
						</td>
						<td>
							<?php echo $values11[4] ?>
						</td>
						<td>
							<!-- <button class="btn">
								<i class="fa fa-times text-danger" aria-hidden="true"></i>
							</button> -->
							<form name="submit1" action="" method="post">
								<button type="submit" class="btn" name="delete<?php echo $name1?>" id="s3">
									<i class="fa fa-times text-danger" aria-hidden="true"></i>
								</button>
							</form>
						</td>
					</tr>
					<?php
				}
				$tot=0;
				foreach ($_COOKIE['item'] as $name => $value) 
				{
					$values11=explode("__", $value);
					$tot=$tot+$values11[4];
				}
				
				?>
			</tbody>
			<tfoot >
				<tr class="bg-dark text-white">
					<td colspan="5" ><h5 class="text-left pl-3 pt-2">Grand Total : <?php echo $tot ?></h5>
					</td>
					<td>
						<a href="checkout.php" target="_blank">
							<button class="btn btn-danger">Checkout</button>
						</a>
					</td>
				</tr>
				<!-- <tr>
					<td><div class="d-flex justify-content-center">
						
						</div>
					</td>
				</tr> -->
			</tfoot>

		</table>
		<?php
	}
	
	?> 
</table>
</div>


<?php
include "footer.php";
?>