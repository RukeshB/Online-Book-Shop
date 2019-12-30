<?php 
include 'layout/header.php';
include 'layout/side_bar.php'; 

?>

			   <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Products</h4>
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="#">Ubold</a>
                                    </li>
                                    <li class="active">
                                        Products
                                    </li>
                                </ol>
                            </div>
                        </div>

                        <!-- SECTION FILTER
                        ================================================== -->
                        <div class="row m-t-10 m-b-10">

                            <div class="col-sm-6">
                                <form role="form">
                                    <div class="form-group contact-search m-b-0">
                                        <input type="text" id="search" class="form-control product-search" placeholder="Search here...">
                                        <button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button>
                                    </div> <!-- form-group -->
                                </form>
                            </div>

                            <div class="col-sm-6">
                                <div class="h5 m-0 text-right">
                                    <label class="vertical-middle m-r-10">Sort By:</label>
                                    <div class="btn-group vertical-middle" data-toggle="buttons">
                                         <label class="btn btn-default btn-md waves-effect active">
                                            <input type="radio" autocomplete="off" checked=""> Status
                                         </label>
                                         <label class="btn btn-default btn-md waves-effect">
                                            <input type="radio" autocomplete="off"> Type
                                         </label>
                                         <label class="btn btn-default btn-md waves-effect">
                                            <input type="radio" autocomplete="off"> Name
                                         </label>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="m-b-15">
                                  <?php
                                    $i=1;
                                    $data = new database;
                                    $stmt= $data -> selectbooks(); 
                                    if($stmt):
                                    foreach($stmt->fetchAll() as $key => $info):
                                    if($info['user'] != $_SESSION['id'])
                                    {
                                    ?>
                                <div class="col-sm-6 col-lg-3 col-md-4 desktops">
                                    <div class="product-list-box thumb">
                                        <a href="javascript:void(0);" class="image-popup" title="Screenshot-1">
                                            <img <?php if($info['photo']!= NULL) echo "src= ../uploadImage/".$info['photo']; else echo "src= assets/images/products/big/book.jpg";
                                             ?> class="thumb-img" alt="work-thumbnail" width="150" height="200">
                                        </a>

                                        <div class="product-action">
                                            <a href="#" class="btn btn-success btn-sm"><i class="md md-mode-edit"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm"><i class="md md-close"></i></a>
                                        </div>

                                        <div class="price-tag">
                                            <?php echo "Rs." .$info['price'];  ?>
                                        </div>
                                        <div class="detail">
                                            <h4 class="m-t-0"><a href="" class="text-dark"><?php echo $info['title'];  ?></a> </h4>
                                            <div class="rating">
                                                <ul class="list-inline">
                                                    <li><a class="fa fa-star" href=""></a></li>
                                                    <li><a class="fa fa-star" href=""></a></li>
                                                    <li><a class="fa fa-star" href=""></a></li>
                                                    <li><a class="fa fa-star" href=""></a></li>
                                                    <li><a class="fa fa-star-o" href=""></a></li>
                                                </ul>
                                            </div>
                                            <h5 class="m-0"> <span class="text-muted"> Stock :98pcs.</span></h5>
                                        </div>
                                    </div>
                                </div>

                                    <?php
                                    }
                                    endforeach ;
                                         endif;
                                    ?>


                            </div>
                        </div> <!-- End row -->

                        
                        
                        


                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer">
                    © 2016. All rights reserved.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


          <?php include 'layout/right_side_bar.php'; ?>
	
	</body>
</html>