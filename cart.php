<?php
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
                                                    <button class="btn">
                                                        <i class="fa fa-times text-danger" aria-hidden="true"></i>
                                                    </button>
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
                                            <tfoot class="bg-dark text-white">
                                        		<tr>
                                        			<td colspan="6"><h5>Total:<?php echo $tot ?></h5></td>
                                        		</tr>
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