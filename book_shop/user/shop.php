<?php 
    include "../Class/databaseClass.php";
    include "header.php";
    /*$id = 0;
    if($result)
    {
        $id = $_SESSION['id'];
    }*/
     ?>
    
    <div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="home.php">Home</a>
            <span class="breadcrumb-item active">Shop</span>
        </div>
    </div>
    <section class="static about-sec">
        <div class="container">
            <h2>recently added books to our store</h2>
            <div class="recomended-sec">
                <div class="row">
                 <?php
                 $i=1;
                    $cd=date("Y-m-d");
                    $pd= date('Y-m-d',strtotime("-5 days"));
                    $data = new user;
                    $stmt= $data -> selectallbook("b.date BETWEEN '$pd' AND '$cd'"); 
                    if($stmt):
                        foreach($stmt->fetchAll() as $key => $info):
                            if($info['user'] != $id):
                             if($i>=5)
                                break;
                            $i++;
                                                
                    ?>
                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <img src=<?php echo "../uploadImage/".$info['photo']; ?> alt="img" style="height: 200px; object-fit: scale-down;">
                        <h3><?php echo $info['title']; ?></h3>
                        <h6><span class="price"><?php echo "Rs. ". $info['price']; ?></span> / <a href="#">Add To Cart</a></h6>
                        <span class="sale"><?php echo $info['booktype']; ?></span>
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
            <h2>First Hand Book</h2>
            <div class="recent-book-sec">
                <div class="row">
               <?php
                    $data = new user;
                    $stmt= $data -> selectallbook("type","first hand"); 
                    if($stmt):
                        foreach($stmt->fetchAll() as $key => $info):
                                  if($info['user'] != $id):              
                ?>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="item" style="padding-bottom: 30px; ">
                        <div style="height: 200px;">
                         <a href="product-single.php?ref=<?php echo $info['id']; ?>"><img src=<?php echo "../uploadImage/".$info['photo']; ?> alt="img" style="height: 200px; object-fit: scale-down;"></a>
                        <h3><a href="product-single.php?ref=<?php echo $info['id']; ?>"><?php echo $info['title']; ?></a></h3>
                        <h6><span class="price"><?php echo "Rs. ". $info['price']; ?></span> / <a href="#">Add To Cart</a></h6>
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

           <br>
            <h2>Second Hand Book</h2>
            <div class="recent-book-sec">
                <div class="row">
               <?php
                    $data = new user;
                    $stmt= $data -> selectallbook("type","second hand"); 
                    if($stmt):
                        foreach($stmt->fetchAll() as $key => $info):
                            if($info['user'] != $id):                        
                ?>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="item">
                        <div style="height: 200px;">
                         <a href="product-single.php?ref=<?php echo $info['id']; ?>"><img src=<?php echo "../uploadImage/".$info['photo']; ?> alt="img" style="height: 200px; object-fit: scale-down;"></a>
                        <h3><a href="product-single.php?ref=<?php echo $info['id']; ?>"><?php echo $info['title']; ?></a></h3>
                        <h6><span class="price"><?php echo "Rs. ". $info['price']; ?></span> / <a href="#">Add To Cart</a></h6>
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
    </section>
   <?php include "footer.php"; ?>