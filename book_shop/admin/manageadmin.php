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

								<h4 class="page-title">Admin Tables</h4>
								<ol class="breadcrumb">
									<li>
										<a href="dashboard.php">Home</a>
									</li>
									<li>
										<a href="#">Admin</a>
									</li>
									<li class="active">
										Manage Admin
									</li>
								</ol>
							</div>
						</div>



                        <?php 
                            //displayMsg();
                        ?>


                        <div class="panel">
                            
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="m-b-30">
                                            <a id="addToTable" class="btn btn-default waves-effect waves-light" href="addadmin.php">Add <i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
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
	                                        </tr>
	                                    </thead>
	                                    <tbody>
                                            <?php
                                                $data = new database;
                                                $stmt= $data -> select("admin"); 
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
	                                            
	                                                <a href="delateadmin.php?ref=<?php echo $info['id']; ?>" onclick="return confirm('Are you sure to Delete?');" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
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