<?php 
include 'layout/header.php';
include 'layout/side_bar.php';
include 'config/helper.php';
require('../class/fileClass.php');
    $admin_id= $_GET['ref']; 
    $data = new database;
    $filedata = new file;
    if(isset($_POST['updatebtn']))
    {     
      $_POST['photo']= $filedata-> uploadphoto($_FILES['photo']);
      $data-> update($_POST,'admin',$admin_id);
    redirect('manageadmin.php');
    }

?>

<?php 
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

								<h4 class="page-title">Admin Form</h4>
								<ol class="breadcrumb">
									<li>
										<a href="#">Online Book Shop</a>
									</li>
									<li>
										<a href="#">Admin</a>
									</li>
									<li class="active">
										Update Admin
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
                        			<h4 class="m-t-0 header-title"><b>update Admin</b></h4>
                        			<hr>
                        			<div class="row">
                        				<div class="col-md-8">
                                            <?php 
                                                $stmt=$data -> select("admin",$admin_id);

                                                if($stmt)
                                                {
                                                    foreach($stmt->fetchAll() as $key => $info)
                                                    {?>
                        					<form class="form-horizontal"  method="POST" enctype="multipart/form-data">    
                                                
                                                <div class="form-group">
                                                    <div class="col-md-10">
                                                        <img <?php if($info['photo']!= NULL) echo "../src= uploadImage/".$info['photo']; else echo "src= assets/images/products/big/book.jpg";
                                             ?> alt="user-img" id="photo" width="128" height="128">
                                                        <input required  required type="file" name="photo" class="inputfile" onchange="displayPhoto(this)" value="<?php echo $info['photo'];?>">
                                                    </div>
                                                </div>                  
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">First Name </label>
	                                                <div class="col-md-10">
	                                                    <input required  required type="text" class="form-control" name="fname" value="<?php echo $info['fname']?>" >
	                                                </div>
	                                            </div>                              
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Last Name</label>
	                                                <div class="col-md-10">
	                                                    <input required  required type="text" class="form-control" name="lname" value="<?php echo $info['lname']?>">
	                                                </div>
	                                            </div>
	                                            <div class="form-group">
                                                    <label class="col-md-2 control-label">Address</label>
                                                    <div class="col-md-10">
                                                        <input required  required type="text" class="form-control" name="address" value="<?php echo $info['address']?>">
                                                    </div>
                                                </div>
	                                                                
	                                            <div class="form-group">
                                                    <label class="col-md-2 control-label">Contact</label>
                                                    <div class="col-md-10">
                                                        <input required  required type="text" class="form-control" name="contact" value="<?php echo $info['contact']?>">
                                                    </div>
                                                </div>                     
	                                                      
	                                             <div class="form-group">
                                                    <div class="col-md-10">
                                                        <input required  required type="hidden" class="form-control" name="user" value="<?php echo $_SESSION['id'] ?>">
                                                    </div>
                                                </div>
	                                                                 
                                                                                                             
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label"></label>
	                                                <div class="col-md-10">
                                                        <span class="input-group-btn">
                                                                <button type="submit" class="btn waves-effect waves-light btn-primary" name="updatebtn">Update</button>
                                                        </span>

	                                                </div>

	                                            </div>
	                                   
	                                        </form>
                                            <?php 
                                                }
                                            }?>    
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
                            $('#photo')
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