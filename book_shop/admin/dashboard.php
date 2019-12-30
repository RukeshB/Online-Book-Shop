 <?php 
             
              include 'layout/header.php';
              include 'layout/side_bar.php';
              

              $data = new dashboard;
              $loged= new logedin;
              $result = $loged-> loginCheck();
             if($result == false  )
              {
                 //header('location: login.php');
                 redirection('login.php');
              }

             ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                
                                <h4 class="page-title">Dashboard</h4>
                                <p class="text-muted page-title-alt">Welcome to Book Shop admin panel !</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <?php 
                                        $stmt= $data -> totalrevenue(); 
                                            if($stmt):
                                                foreach($stmt->fetchAll() as $key => $info):
                                     ?>
                                    <i class="md md-attach-money text-primary"></i>
                                    <h2 class="m-0 text-dark counter font-600"><?php $total=$info['revenue']; echo $info['revenue']; ?></h2></h2>
                                    <div class="text-muted m-t-5">Total Revenue</div>
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <?php 
                                        $stmt= $data -> countnumber("buyerid","cart"); 
                                            if($stmt):
                                                foreach($stmt->fetchAll() as $key => $info):
                                     ?>
                                    <i class="md md-add-shopping-cart text-pink"></i>
                                    <h2 class="m-0 text-dark counter font-600"><?php echo $info['numb']; ?></h2>
                                    <div class="text-muted m-t-5">Sales</div>
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <?php 
                                        $stmt= $data -> countnumber("title","book_tbl"); 
                                            if($stmt):
                                                foreach($stmt->fetchAll() as $key => $info):
                                     ?>
                                <div class="widget-panel widget-style-2 bg-white">
                                    <i class="fa fa-book text-info"></i>
                                    <h2 class="m-0 text-dark counter font-600"><?php echo $info['numb']; ?></h2>
                                    <div class="text-muted m-t-5">Books</div>
                                     <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <?php 
                                        $stmt= $data -> countnumber("email","users"); 
                                            if($stmt):
                                                foreach($stmt->fetchAll() as $key => $info):
                                     ?>
                                    <i class="md md-account-child text-custom"></i>
                                    <h2 class="m-0 text-dark counter font-600"><?php echo $info['numb']; ?></h2>
                                    <div class="text-muted m-t-5">Users</div>
                                     <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="text-dark header-title m-t-0">Total Revenue</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="text-center">
                                                <ul class="list-inline chart-detail-list">
                                                    <li>
                                                        <h5><i class="fa fa-circle m-r-5" style="color: #5d9cec;"></i>First Hand</h5>
                                                    </li>
                                                    <li>
                                                        <h5><i class="fa fa-circle m-r-5" style="color: pink;"></i>Second Hand</h5>
                                                    </li>
                                                    
                                                </ul>
                                            </div>

                                            <div id="morris-area-with-dotted" style="height: 300px;"></div>

                                        </div>

                                        
                                        

                                         <div class="col-md-4">
                                            
                                            <?php 
                                                $stmt= $data -> totalrevenue("first hand"); 
                                                    if($stmt):
                                                        foreach($stmt->fetchAll() as $key => $info):
                                                ?>
                                            <p class="font-600">First Hand <span class="text-primary pull-right"><?php $prc1=($info['revenue']*100)/$total; echo $prc1."%"; ?></span></p>
                                            <div class="progress m-b-30">
                                              <div class="progress-bar progress-bar-primary progress-animated wow animated" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $prc1.'%'; ?>">
                                              </div><!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->
                                            <?php
                                                    endforeach;
                                                endif;
                                                ?>

                                            <?php 
                                                $stmt= $data -> totalrevenue("second hand"); 
                                                    if($stmt):
                                                        foreach($stmt->fetchAll() as $key => $info):
                                                ?>
                                            <p class="font-600">Second Hand <span class="text-pink pull-right"><?php $prc2=($info['revenue']*100)/$total; echo $prc2."%"; ?></span></p>
                                            <div class="progress m-b-30">
                                              <div class="progress-bar progress-bar-pink progress-animated wow animated" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $prc2.'%'; ?>">
                                              </div><!-- /.progress-bar .progress-bar-pink -->
                                            </div><!-- /.progress .no-rounded -->
                                            <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    
                                    <!-- end row -->
                                    
                                </div>
                                
                            </div>
                                    
                            

                        </div>
                        <!-- end row -->

                        <!-- end row -->

                        
                        

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    © 2016. All rights reserved.
                </footer>

            </div>
            
            
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
             <?php include 'layout/right_side_bar.php'; ?>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->


    
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <!-- jQuery  -->
        <script src="assets/plugins/moment/moment.js"></script>


        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>

         <script src="assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>

        <!-- Todojs  -->
        <script src="assets/pages/jquery.todo.js"></script>

        <!-- chatjs  -->
        <script src="assets/pages/jquery.chat.js"></script>

        <script src="assets/plugins/peity/jquery.peity.min.js"></script>
		
		<script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

		<script src="assets/pages/jquery.dashboard_2.js"></script>
		
        

    </body>
</html>