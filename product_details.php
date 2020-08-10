<?php
include "header.php";
$id=$_GET["id"];
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"maniexpress"); 

if(isset($_POST["submit1"]))
{
	$d=0;
	if(is_array($_COOKIE['item']))
	{
		foreach ($_COOKIE['item'] as $name => $value) {
			# code...
			$d=$d+1;
		}
		$d=$d+1;
	}
	else{
		$d=$d+1;
	}

	$res3=mysqli_query($link,"select * from product where id=$id");
	while ($row3=mysqli_fetch_array($res3)) {
		# code...
		$img1=$row3["product_image"];
		$nm=$row3["product_name"];
		$price=$row3["product_price"];
		$size="1";
	}
	setcookie("item[$d]",$img1."__".$nm."__".$price."__".$size,time()+1800);
	
}
?>





<?php
$res=mysqli_query($link,"select * from product where id=$id");
while ($row=mysqli_fetch_array($res)) {
	# code...
?>

<div class="container">
	<h2 class="text-center my-5"><?php echo $row["product_name"]; ?></h2>

	<div class="row mb-5">
		<div class="col-md-6">
			<img src="<?php echo $row["product_image"]; ?>" class="img-fluid">
			
		</div>
	
		<div class="col-md-6">
			<form name="form1" action="" method="post">
            <div class="row mt-3">
                <div class="col-sm-12">
                    <h5>Product Name</h5>
                    <p><?php echo $row["product_name"]; ?></p>
                </div>
                <div class="col-sm-12">
                    <h5>Price:</h5>
                    <p><?php echo $row["product_price"]; ?></p>
                </div>
                <div class="col-sm-12">
                    <h5>Shoe Size:</h5>
                    <input type="text" class="form-control" id="shoeSize" placeholder="Shoe Size">
                </div>
                                                  
                <div class="col-sm-12 mt-3">
                	<h5 >Description:</h5>
                    <p><?php echo $row["product_description"]; ?></p>
                </div>

                <div class="col-sm-12 mt-3">
                	<button type="submit" name="submit1" class="btn btn-danger">Add to Cart</button>
                </div>
            </div>
            </form>
        </div>
    
    </div>
</div>


<?php

}

?>






<?php
include "footer.php";
?>