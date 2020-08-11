<?php
$id=$_GET["id"];
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"maniexpress"); 

if(isset($_POST["submit1"]))
{
	$d=0;
	if(isset($_COOKIE['item']))
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
		$qty="1";
		$total=$price*$qty;
		// $size="1";
	}

	if(isset($_COOKIE['item']))
	{
		foreach ($_COOKIE['item'] as $name1 => $value) 
		{
			$values11=explode("__", $value);
			$found=0;
			if ($img1==$values11[0]) {
				$found=$found+1;
				$qty=$values11[3]+1;
				$total=$values11[2]*$qty;
				setcookie("item[$name1]",$img1."__".$nm."__".$price."__".$qty."__".$total,time()+1800);
				# code...
			}
			
		}
		if ($found==0) {
			setcookie("item[$d]",$img1."__".$nm."__".$price."__".$qty."__".$total,time()+1800);
		}
	}
	else{
		setcookie("item[$d]",$img1."__".$nm."__".$price."__".$qty."__".$total,time()+1800);
	}
	// setcookie("item[$d]",$img1."__".$nm."__".$price,time()+1800);
}
?>


<?php
include "header.php";
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
               <!--  <div class="col-sm-12">
                    <h5>Quantity</h5>
                    <input type="text" class="form-control" id="qty" placeholder="Quantity">
                </div> -->
                                                  
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