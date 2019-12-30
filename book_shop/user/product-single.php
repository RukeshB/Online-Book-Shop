<?php 
    include "../class/databaseClass.php";
    include "header.php";
    $bookid = $_GET['ref'];
 ?>
<div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="index.html">Home</a>
            <span class="breadcrumb-item active">Terms and Condition</span>
        </div>
    </div>
    <section class="product-sec">
        <div class="container">
            <?php
                    $data = new user;
                    $stmt= $data -> selectallbook("id",$bookid); 
                    if($stmt):
                        foreach($stmt->fetchAll() as $key => $info):
                                                
                ?>
            <h1><?php echo $info['title']; ?></h1>
            <div class="row">
                <div class="col-md-6 slider-sec">
                    <!-- main slider carousel -->
                    <div id="myCarousel" class="carousel slide">
                        <!-- main slider carousel items -->
                        <div class="carousel-inner">
                            <div class="active item carousel-item" data-slide-number="0">
                                <img <?php echo "src= ../uploadImage/".$info['photo']; ?> class="img-fluid">
                            </div>
                           
                        </div>
                        <!-- main slider carousel nav controls -->
                       
                    </div>
                    <!--/main slider carousel-->
                </div>
                <div class="col-md-6 slider-content">
                    <p><?php echo $info['description']; ?></p>
                    <ul>
                        <h4>Book Info:</h4>
                        <li>
                            <span class="name">Publication</span><span class="clm">:</span>
                            <span style="padding-left: 20px;font-weight: 600;width: 100px;"><?php echo $info['publication']; ?></span>
                        </li>
                        <li>
                            <span class="name">Author</span><span class="clm">:</span>
                            <span style="padding-left: 20px;font-weight: 600;width: 100px;"><?php echo $info['author']; ?></span>
                        </li>
                        <li>
                            <span class="name">Edition</span><span class="clm">:</span>
                            <span style="padding-left: 20px;font-weight: 600;width: 100px;"><?php echo $info['edition']; ?></span>
                        </li>
                        <li>
                            <span class="name">Category</span><span class="clm">:</span>
                            <span style="padding-left: 20px;font-weight: 600;width: 100px;"><?php $catagory = $info['category']; echo $info['category']; ?></span>
                        </li>
                        <li>
                            <span class="name">Type</span><span class="clm">:</span>
                            <span style="padding-left: 20px;font-weight: 600;width: 100px;"><?php echo $info['booktype']; ?></span>
                        </li>
                        <li>
                            <span class="name">Price</span><span class="clm">:</span>
                            <span style="padding-left: 20px;font-weight: 600;width: 100px;"><?php echo "Rs. ". $info['price']; ?></span>
                        </li>
                        <h4>Book Owner Info:</h4>
                        <li>
                            <span class="name">Full Name</span><span class="clm">:</span>
                            <span style="padding-left: 20px;font-weight: 600;width: 100px;"><?php if($info['user']==0) echo $info['afname']." ". $info['alname']; else echo $info['ufname']." ". $info['ulname']; ?></span>
                        </li>
                        <li>
                            <span class="name">Contact Number</span><span class="clm">:</span>
                            <span style="padding-left: 20px;font-weight: 600;width: 100px;"><?php if($info['user']==0) echo $info['acontact']; else echo $info['ucontact'];?></span>
                        </li>
                        <li>
                            <span class="name">Address</span><span class="clm">:</span>
                            <span style="padding-left: 20px;font-weight: 600;width: 100px;"><?php if($info['user']==0) echo $info['aaddress']; else echo $info['uaddress'];?></span>
                        </li>
                      
                    </ul>
                    <div class="btn-sec">
                        <button class="btn "><a href="AddToCart.php?ref=<?php echo $info['id'];?>">Add To cart</a></button>
                        <button class="btn black">Buy Now</button>
                    </div>
                </div>
            </div>
        <?php 
                endforeach; 
            endif;
            ?>
        </div>
    </section>
    <section class="related-books">
        <div class="container">
            <h2>You may also like these book</h2>
            <div class="recomended-sec">
                <div class="row">
                    <?php
                    $data = new user;
                    $stmt= $data -> selectallbook("category",$catagory); 
                    if($stmt):
                        foreach($stmt->fetchAll() as $key => $info):
                            if($info['id'] != $bookid && $info['user'] != $id):
                                                
                         ?>
                    <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <img src=<?php echo "../uploadImage/".$info['photo']; ?> alt="img" style="height: 200px">
                        <h3><?php echo $info['title']; ?></h3>
                        <h6><span class="price"><?php echo "Rs. ". $info['price']; ?></span> / <a href="#">Add To Cart</a></h6>
                       
                        <div class="hover">
                            <a href="product-single.php?ref=<?php echo $info['id']; ?>">
                            <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php 
                        endif;
                    endforeach;
                endif;
                 ?>
                </div>
            </div>
        </div>
    </section>
    <?php 
        include "footer.php";
     ?>