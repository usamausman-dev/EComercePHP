<?php

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"maniexpress"); 

$id=$_GET["id"];
$res=mysqli_query($link,"select * from product where id=$id");
while ($row=mysqli_fetch_array($res)) {

    # code...
    $product_name=$row["product_name"];
    $product_price=$row["product_price"];
    $product_image=$row["product_image"];;
    $product_cat=$row["product_category"];
    $product_description=$row["product_description"];
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Edit Product - <?php echo $product_name ; ?></title>
</head>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <h3 class="mb-5">
                        <?php echo $product_name ; ?>
                    </h3>
                    <img class="img-fluid" src="<?php echo $product_image ?>">
                </div>  
            </div>
            <div class="col-md-6"> 
                <form name="form1" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="ProductName">Product Name</label>
                        <input type="text" class="form-control" required name="pnm" value="<?php echo $product_name ?>">
                    </div>

                    <div class="form-group">
                        <label for="ProductPrice">Product Price</label>
                        <input type="text" class="form-control" required name="pprice" value="<?php echo $product_price ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Product Image:</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="pimage">    
                    </div>

                    <div class="form-group">
                        <label for="ProductCategory">Product Category</label>
                        <select class="form-control" name="pcategory">
                            <!-- <option value="" disabled selected hidden>Select Category:</option> -->
                            <option value="kids">Kids</option>
                            <option value="men">Men</option>
                            <option value="women">Women</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Description">Description</label>
                        <textarea class="form-control" name="pdesc" rows="3" required><?php echo $product_description ?>
                    </textarea>
                    <input  name="submit1" type="submit" class="btn btn-danger mt-3" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>

<?php

if (isset($_POST["submit1"])) {
    # code...

    $fnm=$_FILES["pimage"]["name"];

    if ($fnm=="") {
        # code...
        mysqli_query($link,"update product set product_name='$_POST[pnm]',product_price='$_POST[pprice]',product_category='$_POST[pcategory]',product_description='$_POST[pdesc]' where id=$id");

    }
    else{

        $v1=rand(1111,9999);
        $v2=rand(1111,9999);
        $v3=$v1.$v2;
        $v3=md5($v3);
        $fnm=$_FILES["pimage"]["name"];
        $dst="./product_image/".$v3.$fnm;
        $dst1="product_image/".$v3.$fnm;
        move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);

        mysqli_query($link,"update product set product_image='$dst1',product_name='$_POST[pnm]',product_price='$_POST[pprice]',product_category='$_POST[pcategory]',product_description='$_POST[pdesc]' where id=$id");
    }

    ?>
    <script type="text/javascript">
        window.location="admin.php"
    </script>
    <?php

}


?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
