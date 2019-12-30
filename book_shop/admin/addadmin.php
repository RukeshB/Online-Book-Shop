<?php 
include 'layout/header.php';
include 'layout/side_bar.php';
require('../class/fileClass.php');
    
    $data = new database;
    $filedata = new file;
    if(isset($_POST['savebtn']))
    { 
      $_POST['photo']= $filedata-> uploadphoto($_FILES['photo']);
      $data-> insert($_POST,'admin');
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
                                <div class="btn-group pull-right m-t-15">
                                    <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                                    <ul class="dropdown-menu drop-menu-right" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>

								<h4 class="page-title">Books Form</h4>
								<ol class="breadcrumb">
									<li>
										<a href="#">Online Book Shop</a>
									</li>
									<li>
										<a href="#">Books</a>
									</li>
									<li class="active">
										Add Books
									</li>
								</ol>
							</div>
						</div>

                        
                        <?php 
                          //  displayMsg();
                        ?>
                        
                        
                        <div class="row">
                        	<div class="col-sm-12">
                        		<div class="card-box">
                        			<h4 class="m-t-0 header-title"><b>Add New Book</b></h4>
                        			<hr>
                        			<div class="row">
                        				<div class="col-md-8">
                        					<form class="form-horizontal"  method="POST" enctype="multipart/form-data">    <div class="form-group">
                                                    <div class="col-md-10">
                                                       <img src="assets/images/users/avatar-1.jpg" alt="user-img"  id="userphoto" class="img-circle">
              										   <input type="file" name="photo" class="inputfile" onchange="displayPhoto(this)" required>
                                                    </div>
                                                </div>                  
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">First Name </label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="fname" placeholder="Enter First Name" required>
	                                                </div>
	                                            </div>                              
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Last Name</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" required>
	                                                </div>
	                                            </div>
	                                            <div class="form-group">
                                                    <label class="col-md-2 control-label">Contact</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="contact" placeholder="Enter Contact" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Address</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="address" placeholder="Enter address" required>
                                                    </div>
                                                </div>
	                                            <div class="form-group">
                                                    <label class="col-md-2 control-label">Email Address</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="email" placeholder="Enter email address" required>
                                                    </div>
                                                </div>                     
	                                            <div class="form-group">
                                                    <label class="col-md-2 control-label">Password</label>
                                                    <div class="col-md-10">
                                                        <input type="password" class="form-control" name="password" required>
                                                    </div>
                                                </div>    
	                                              
	                                             <input type="hidden" name="date" value="<?php echo date("Y/m/d");?>" />
	                                             <input type="hidden" name="addedby" value="<?php echo $_SESSION['id'];?>" />                   
                                                                                                                 
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label"></label>
	                                                <div class="col-md-10">
                                                        <span class="input-group-btn">
                                                                <button type="submit" class="btn waves-effect waves-light btn-primary" name="savebtn">Submit</button>
                                                        </span>
	                                                </div>
	                                            </div>
	                           
	                                        </form>
                        				</div>
                        				
                        				
                        			</div>
                        		</div>
                        	</div>
                        </div>
                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer">
                    © 2016. All rights reserved.
                </footer>
                <?php include 'layout/right_side_bar.php'; ?>
            </div>
            <script  src="login_assets/js/index.js"></script>
            <script type="text/javascript">
                function displayPhoto(ele){
                  console.log(ele.value);
                  if (ele.files && ele.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#userphoto')
                                .attr('src', e.target.result)   
                                 .width(128)
                                .height(128);             
                        };

                        reader.readAsDataURL(ele.files[0]);
                    }
                }
              </script>
        </div>
	</body>
    
</html>