<?php 
include 'layout/header.php';
include 'layout/side_bar.php';
require('config/helper.php');
include '../Class/securitysettingClass.php';
    
    $data = new database;
    $sett = new setting;
    if(isset($_POST['updatebtn']))
    {     
        $stmt = $data-> select('users',$_SESSION['id']);
        if($stmt)
        {
            foreach($stmt->fetchAll() as $key => $info)
            {
                if($info['password'] === md5($_POST['c_password']))
                {
                    if($_POST['password'] === $_POST['re_password'])
                    {
                        $sett -> updatepassword($_POST['password'],'users',$info['id']);
                    }

                    else
                    {
                        alerts_message('error','message');
                    }
                }
            }
        }
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

								<h4 class="page-title">Setting Form</h4>
								<ol class="breadcrumb">
									<li>
										<a href="#">Online Book Shop</a>
									</li>
									<li>
										<a href="#">Setting</a>
									</li>
									<li class="active">
										Security Setting
									</li>
								</ol>
							</div>
						</div>
                        
                        
                        <div class="row">
                        	<div class="col-sm-12">
                        		<div class="card-box">
                        			<h4 class="m-t-0 header-title"><b>change password</b></h4>
                        			<hr>
                        			<div class="row">
                        				<div class="col-md-8">
                        					<form class="form-horizontal"  method="POST" enctype="multipart/form-data">  

                                        <div class="form-group">
                                            <label for="pass1">Current Password*</label>
                                            <input id="pass1" type="password" placeholder="Current Password" required class="form-control" name="c_password">
                                        </div>

                                        <div class="form-group">
                                            <label for="pass1">New Password*</label>
                                            <input id="pass1" type="password" placeholder="New Password" required class="form-control" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="passWord2">Confirm Password *</label>
                                            <input data-parsley-equalto="#pass1" type="password" required placeholder="Password" class="form-control" id="passWord2" name="re_password">
                                        </div>

                                        <div class="form-group text-right m-b-0">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit" name="updatebtn">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                                                Cancel
                                            </button>
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
        </div>
	</body>
    
</html>