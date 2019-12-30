<?php 
    include "../class/databaseClass.php";
    include "header.php";
 ?>
    <section class="slider">
        <div class="container">
            <div id="owl-demo" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="slide">
                        <img src="images/slide1.jpg" alt="slide1">
                        <div class="content">
                            <div class="title">
                                <h3>welcome to bookstore</h3>
                                <h5>Discover the best books online with us</h5>
                                <a href="#" class="btn">shop books</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slide">
                        <img src="images/slide2.jpg" alt="slide1">
                        <div class="content">
                            <div class="title">
                                <h3>welcome to bookstore</h3>
                                <h5>Discover the best books online with us</h5>
                                <a href="#" class="btn">shop books</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slide">
                        <img src="images/slide3.jpg" alt="slide1">
                        <div class="content">
                            <div class="title">
                                <h3>welcome to bookstore</h3>
                                <h5>Discover the best books online with us</h5>
                                <a href="#" class="btn">shop books</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slide">
                        <img src="images/slide4.jpg" alt="slide1">
                        <div class="content">
                            <div class="title">
                                <h3>welcome to bookstore</h3>
                                <h5>Discover the best books online with us</h5>
                                <a href="#" class="btn">shop books</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="recomended-sec">
        <div class="container">
            <div class="title">
                <h2>Recently Added Books To Our Store</h2>
                <hr>
            </div>
            <div class="row">
                 <?php
                 $c=0;
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
                            $c++;
                                                
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
                if($c == 0):
                    ?>
                            <h2>No Recently Added Books</h2>
                            
                <?php
                    endif;
                 ?>
                
            </div>
        </div>
    </section>
    <section class="about-sec">
        <div class="about-img">
            <figure style="background:url(./images/about-img.jpg)no-repeat;"></figure>
        </div>
        <div class="about-content">
            <h2>About bookstore,</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's printer took a galley of type and Scrambled it to make a type and typesetting industry. Lorem Ipsum has been the book. </p>
            <p>It has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's printer took a galley of type and</p>
            <div class="btn-sec">
                <a href="shop.php" class="btn yellow">shop books</a>
                <?php 
                $loged= new logedin;
                $result = $loged-> loginCheck();

                  if($result)
                  {?>
                      <a href="../admin/logout.php" class="btn black">subscriptions</a>
                      <?php
                  }
                  else
                  {?>
                    <a href="login.html" class="btn black">subscriptions</a>
                    <?php
                 }
                 ?>
            </div>
        </div>
    </section>
    <section class="recent-book-sec">
        <div class="container">
            <div class="title">
                <h2>First Hand Book</h2>
                <hr>
            </div>
            <div class="row">
               <?php
                    $i=1;
                    $data = new user;
                    $stmt= $data -> selectallbook("type","first hand"); 
                    if($stmt):
                        foreach($stmt->fetchAll() as $key => $info):
                            if($info['user'] != $id):
                                if($i>=6)
                                    break;
                                $i++;
                                                    
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
    </section>
    <section class="features-sec">
        <div class="container">
            <ul>
                <li>
                    <span class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                    <h3>SAFE SHOPPING</h3>
                    <h5>Safe Shopping Guarantee</h5>
                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's...</h6>
                </li>
                <li>
                    <span class="icon return"><i class="fa fa-reply-all" aria-hidden="true"></i></span>
                    <h3>30- DAY RETURN</h3>
                    <h5>Moneyback guarantee</h5>
                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's...</h6>
                </li>
                <li>
                    <span class="icon chat"><i class="fa fa-comments" aria-hidden="true"></i></span>
                    <h3>24/7 SUPPORT</h3>
                    <h5>online Consultations</h5>
                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's...</h6>
                </li>
            </ul>
        </div>
    </section>
    <section class="offers-sec" style="background:url(images/offers.jpg)no-repeat;">
        <div class="cover"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail">
                        <h3>Top 50% OFF on Selected</h3>
                        <h6>We are now offering some good discount 
                    on selected books go and shop them</h6>
                        <a href="products.html" class="btn blue-btn">view all books</a>
                        <span class="icon-point percentage">
                            <img src="images/precentagae.png" alt="">
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail">
                        <h3>Shop $ 500 Above and Get Extra!</h3>
                        <h6>We are now offering some good discount 
                    on selected books go and shop them</h6>
                        <a href="products.html" class="btn blue-btn">view all books</a>
                        <span class="icon-point amount"><img src="images/amount.png" alt=""></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonial-sec">
        <div class="container">
            <div id="testimonal" class="owl-carousel owl-theme">
                <div class="item">
                    <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's printer took a galley of type and Scrambled it to make a type and typesetting industry. been the book</h3>
                    <div class="box-user">
                        <h4 class="author">Susane Mathew</h4>
                        <span class="country">Australia</span>
                    </div>
                </div>
                <div class="item">
                    <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's printer took a galley of type and Scrambled it to make a type and typesetting industry. been the book</h3>
                    <div class="box-user">
                        <h4 class="author">Susane Mathew</h4>
                        <span class="country">Australia</span>
                    </div>
                </div>
                <div class="item">
                    <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's printer took a galley of type and Scrambled it to make a type and typesetting industry. been the book</h3>
                    <div class="box-user">
                        <h4 class="author">Susane Mathew</h4>
                        <span class="country">Australia</span>
                    </div>
                </div>
                <div class="item">
                    <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's printer took a galley of type and Scrambled it to make a type and typesetting industry. been the book</h3>
                    <div class="box-user">
                        <h4 class="author">Susane Mathew</h4>
                        <span class="country">Australia</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="left-quote">
            <img src="images/left-quote.png" alt="quote">
        </div>
        <div class="right-quote">
            <img src="images/right-quote.png" alt="quote">
        </div>
    </section>
    <?php include "footer.php"; ?>
    