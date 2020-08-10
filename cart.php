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
		                                                <!-- <th scope="col">Quantity</th> -->
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
                                                <!-- <td>
                                                    <button class="btn">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                    </button> 4
                                                    <button class="btn">
                                                        <i class="fa fa-plus text-success" aria-hidden="true"></i></button>
                                                </td> -->
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
			                                                $tot=$tot+$values11[2];
			                                            }
			                                            echo $tot;	
		                                        	?>
                                            </tbody>
                                            	<?php
                                            }

                                            		
                                        	?> 
                                    </table>
                                </div>
                                <div class="bg-danger text-white text-center py-3">
                                	<h3>Total : 
                                	<?php
                                        $Total=$tot;
                                        echo $Total;

                                     ?>
                                     </h3>
                                </div>

<?php
include "footer.php";
?>