<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"maniexpress");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Invoice</title>
</head>

<body>
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding mt-5">
        <div class="card">
            <div class="card-header p-4">
                <a class="pt-2 d-inline-block" href="index.php" data-abc="true">ManiExpress</a>
                <div class="float-right">
                    <h3 class="mb-0">Customer Details : </h3>

                    <?php
                    $id=$_GET["id"];
                    $res=mysqli_query($link,"select * from checkout_address where id=$id");
                    while ($row=mysqli_fetch_array($res)) {
                                # code...

                                    // echo "<td>";    echo $row[0];  echo "</td>";
                        echo '<h5 class="text-dark mb-1 mt-3">';    
                        echo $row[1]; echo " "; echo$row[2]; 
                        echo "</h5>";

                                    // echo "<td>";    echo $row[2]; echo "</td>";
                        echo "<div>";    echo $row[3]; echo "</div>";
                        echo "<div>";    echo $row[4]; echo "</div>";
                        echo "<div>";    echo $row[5]; echo "</div>";
                        echo "<td>";    echo $row[6]; echo "</td>";
                        echo "<div>";    echo $row[7]; echo "</div>";                                 
                    }
                    ?>  
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Item Name</th>      
                                <th class="right">Price</th>
                                <th class="center">Qty</th>
                                <th class="right">Total</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $id=$_GET["id"];
                            $res=mysqli_query($link,"select * from confirm_order_product where order_id=$id");
                            while ($row=mysqli_fetch_array($res)) {
                                    # code...
                                echo "<tr>";
                                echo "<td>";
                                ?>
                                <img src="<?php echo $row["product_image"];?>" class="img-fluid" width="50">
                                <?php
                                echo "</td>";

                                echo "<td>"; echo $row["product_name"]; echo "</td>";
                                echo "<td>"; echo $row["product_price"]; echo "</td>";
                                echo "<td>"; echo $row["product_qty"]; echo "</td>";
                                echo "<td>"; echo $row["product_total"]; echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr class="text-white bg-dark">
                                <th colspan="5" class="text-center">
                                    <?php
                                    // echo $sum;
                                    $result=mysqli_query($link,"select SUM(product_total) as `totalsum` from confirm_order_product where order_id=$id");

                                    $data=mysqli_fetch_array($result);
                                    echo "Grand Total:".$data['totalsum'];


                                    ?>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p class="mb-0"> &#169; Mani Express -2020</p>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
