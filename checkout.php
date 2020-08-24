<?php
include "header.php";
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"maniexpress");

?>
<div class="container">
    <h2 class="text-center pt-4 underline-small">Checkout</h2>
    <div class="row">
        <div class="col-md-6">
            <img src="cart.jpg" class="img-fluid">
        </div>
        <div class="col-md-6 pt-4 mb-5">
            <form name="form1" action="" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" name="firstName" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" name="lastName" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" name="contact" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" name="address" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" name="city" required>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" name="zip" required>
                    </div>
                </div>
                
                <input type="submit" class="btn btn-danger" value="Check Out" name="submit1">
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST["submit1"])) 
{
    $link=mysqli_connect("localhost","root","");
    mysqli_select_db($link,"maniexpress");
    mysqli_query($link,"insert into checkout_address values('','$_POST[firstName]','$_POST[lastName]','$_POST[email]','$_POST[contact]','$_POST[address]','$_POST[city]','$_POST[zip]')");

    ?>
    <script type="text/javascript">
        alert("Order Placed Successfully");
    </script>
    <?php
}


$res=mysqli_query($link,"select id from checkout_address order by id desc limit 1");
while ($row=mysqli_fetch_array($res)) 
{
    # code...
    $id=$row["id"];
}   

if (isset($_COOKIE['item'])) 
{

    foreach ($_COOKIE['item'] as $name1 => $value) 
    {
    # code...
        $values11=explode("__", $value);
        mysqli_query($link,"insert into confirm_order_product values('','$id','$values11[1]','$values11[2]','$values11[3]','$values11[0]','$values11[4]')");
    }
}
?>


<?php
include "footer.php"
?>