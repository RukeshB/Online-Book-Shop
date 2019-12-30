<?php 

include 'layout/header.php';
include 'layout/side_bar.php'; 
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

								<h4 class="page-title">User Tables</h4>
								<ol class="breadcrumb">
									<li>
										<a href="dashboard.php">Home</a>
									</li>
									<li>
										<a href="#">User</a>
									</li>
									<li class="active">
										Manage User
									</li>
								</ol>
							</div>
						</div>



                        <?php 
                            //displayMsg();
                        ?>


                        <div class="panel">
                            
                            <div class="panel-body">
                             
                                </div>
                                
                                <div class="">
                                	<table class="table table-striped" id="datatable-editable">
	                                    <thead>
	                                        <tr>
	                                            <th>S.N.</th>
	                                            <th>Photo</th>
	                                            <th>Full Name</th>
	                                            <th>Contact</th>
	                                            <th>Address</th>
	                                            <th>Email</th>
                                                <th>Remove</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
                                            <?php
                                                $data = new database;
                                                $stmt= $data -> select("users"); 
                                                if($stmt):
                                                foreach($stmt->fetchAll() as $key => $info):
                                                
                                            ?>

	                                        <tr class="gradeX">
	                                            <td>  <?php echo ++$key; ?></td>
	                                            <td>
                                                  <img <?php if($info['photo']!= NULL) echo "src= ../uploadImage/".$info['photo']; else echo "src= assets/images/users/avatar-1.jpg";
                                             ?> alt="user-img" id="photo" width="128" height="128">
	                                            </td>
	                                            <td>
                                                   <?php echo $info['fname']." ".$info['lname'];  ?>
	                                            </td>
	                                            <td>
                                                   <?php echo $info['contact'];  ?>
	                                            </td>
	                                            <td>
                                                   <?php echo $info['address'];  ?>
	                                            </td>
	                                            <td>
                                                   <?php echo $info['email'];  ?>
                                                </td>
	                                            <td class="actions">
	                                                <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
	                                                <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
	                                            
	                                                <a href="delateuser.php?ref=<?php echo $info['id']; ?>" onclick="return confirm('Are you sure to Delete?');" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
	                                            </td>
                                            </tr>
                                            
                                            <?php
                                            endforeach ;
                                                else:
                                            ?>
                                                <tr>
                                                    <td class="actions" colspan="8"> No data found in database! </td>
                                                </tr>
                                            <?php   endif; ?>
	                                    </tbody>
	                                </table>
                                </div>
                            </div>
                            <!-- end: page -->

                        </div> <!-- end Panel -->
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