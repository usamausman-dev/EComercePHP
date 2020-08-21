<?php
session_start();
if ($_SESSION["admin"]=="") {
    ?>
    <script type="text/javascript">
        window.location="admin_login.php"
    </script>
    <?php 
    # code...
}
?>

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Admin Panel</title>
</head>
<style type="text/css">
    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #dc3545;
    }

    a {
        color: #dc3545;
        text-decoration: none;
        background-color: transparent;
    }

    a:hover {
        color: #dc3545;
        opacity: 0.8;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand mr-auto" href="#">Admin Panel</a>
        <!-- <button type="button" class="btn btn-danger">
            Logout
        </button> -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#logout">
            Logout
        </button>
        <!-- Modal -->
        <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure , you want to logout?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="logout.php"class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 bg-dark" style="height: 90vh">
                <div class="nav flex-column nav-pills pt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Orders</a>

                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Products</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h2 class="my-3">Users</h2>


                        <!-- Users Order Data -->


                        <div class="table-responsive" style="height:78vh">
                            <table class="table table-hover overflow-auto">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Contact</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Zip</th>
                                        <th scope="col">
                                            Details
                                        </th>
                                    </tr>
                                </thead>
                                <?php
                                $res=mysqli_query($link,"select * from checkout_address order by id asc");
                                while ($row=mysqli_fetch_array($res)) {
                                # code...
                                    echo "<tr>";
                                    echo "<td>";    echo $row[0];  echo "</td>";
                                    echo "<td>";    echo $row[1]; echo " "; echo$row[2]; echo "</td>";
                                    // echo "<td>";    echo $row[2]; echo "</td>";
                                    echo "<td>";    echo $row[3]; echo "</td>";
                                    echo "<td>";    echo $row[4]; echo "</td>";
                                    echo "<td>";    echo $row[5]; echo "</td>";
                                    echo "<td>";    echo $row[6]; echo "</td>";
                                    echo "<td>";    echo $row[7]; echo "</td>";
                                    echo "<td>";
                                    ?>
                                    <a href="invoice.php?id=<?php echo $row["id"]?>" target="_blank" type="button" class="btn btn-danger">
                                        View
                                    </a>
                                    <?php echo "</td>";
                                    echo "<tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <h2 class="my-3" style="display: inline-block;">Products</h2>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger my-3" data-toggle="modal" data-target="#addproduct" style="display: inline-block;float: right;">
                            <i class="fa fa-plus mr-2" aria-hidden="true"></i> Add Products
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form name="form1" action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Product Name</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product Name" name="pnm" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Price</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product Price" name="pprice" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Product Image:</label>
                                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="pimage">    
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Category</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="pcategory">
                                                    <option value="" disabled selected hidden>Select Category:</option>
                                                    <option value="kids">Kids</option>
                                                    <option value="men">Men</option>
                                                    <option value="women">Women</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Description</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="pdesc" required></textarea>
                                            </div>
                                            <div class="modal-footer">  
                                                <input type="submit" class="btn btn-danger" name="submit1" value="Add Product">
                                            </div>
                                        </form>


                                        <?php
                                        if (isset($_POST["submit1"])) {
                                            $v1=rand(1111,9999);
                                            $v2=rand(1111,9999);
                                            $v3=$v1.$v2;
                                            $v3=md5($v3);
                                            $fnm=$_FILES["pimage"]["name"];
                                            $dst="./product_image/".$v3.$fnm;
                                            $dst1="product_image/".$v3.$fnm;
                                            move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);

                                            mysqli_query($link,"insert into product values('','$_POST[pnm]','$_POST[pprice]','$dst1','$_POST[pcategory]','$_POST[pdesc]')");
                                        }
                                        ?>
                                    </div>

                                </div>
                            </div>
                        </div>





                        <div class="table-responsive" style="height:78vh">
                            <table class="table table-hover overflow-auto">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Product Category</th>
                                        <th scope="col">Decription</th>
                                        <th scope="col">Delete</th>
                                        <th scope="col">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $res1=mysqli_query($link,"select * from product");

                                    while ($row=mysqli_fetch_array($res1)) {
                            # code...
                                        echo "<tr>";
                                        echo "<td>";
                                        ?><img width="100" height="100" src="<?php echo $row["product_image"];?>">
                                        <?php
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row["product_name"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row["product_price"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row["product_category"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row["product_description"];
                                        echo "</td>";

                                        echo "<td>"; ?>

                                        <a href="delete.php?id=<?php echo $row["id"] ?>" type="button" class="btn">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>
                                        <?php         
                                        echo "</td>";

                                        echo "<td>"; ?>

                                        <a href="editProduct.php?id=<?php echo $row["id"] ?>" type="button" class="btn">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        <?php         
                                        echo "</td>";


                        echo "</tr>";

                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>