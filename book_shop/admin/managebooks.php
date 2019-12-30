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

								<h4 class="page-title">Book Tables</h4>
								<ol class="breadcrumb">
									<li>
										<a href="dashboard.php">Home</a>
									</li>
									<li>
										<a href="#">Book</a>
									</li>
									<li class="active">
										Manage Books
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
                                            <a id="addToTable" class="btn btn-default waves-effect waves-light" href="addbook.php">Add <i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="">
                                	<table class="table table-striped" id="datatable-editable">
	                                    <thead>
	                                        <tr>
	                                            <th>S.N.</th>
	                                            <th>Photo</th>
	                                            <th>Title</th>
	                                            <th>Publication</th>
	                                            <th>Author</th>
	                                            <th>Edition</th>
	                                            <th>Price</th>
	                                            <th>Category</th>
                                                <th>type</th>
                                                <th>User Name</th>
                                                <th>Action</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
                                            <?php
                                                $data = new user;
                                                $stmt= $data -> selectallbook(); 
                                                if($stmt):
                                                foreach($stmt->fetchAll() as $key => $info):
                                                
                                            ?>

	                                        <tr class="gradeX">
	                                            <td>  <?php echo ++$key; ?></td>
	                                            <td>
                                                  <img <?php if($info['photo']!= NULL) echo "src= ../uploadImage/".$info['photo']; else echo "src= assets/images/products/big/book.jpg";
                                             ?> alt="user-img" id="photo" width="128" height="128">
	                                            </td>
	                                            <td>
                                                   <?php echo $info['title'];  ?>
	                                            </td>
	                                            <td>
                                                   <?php echo $info['publication'];  ?>
	                                            </td>
	                                            <td>
                                                   <?php echo $info['author'];  ?>
	                                            </td>
	                                            <td>
                                                   <?php echo $info['edition'];  ?>
                                                </td>
                                                <td>
                                                   <?php echo $info['price'];  ?>
                                                </td>
                                                <td>
                                                   <?php echo $info['category'];  ?>
                                                </td>
                                                <td>
                                                   <?php echo $info['booktype'];  ?>
                                                </td>
                                                <td>
                                                   <?php 
                                                   if($info['afname'] == null && $info['alname'] == null)
                                                    echo $info['ufname']." ". $info['ulname'];
                                                    else
                                                        echo $info['afname']." ". $info['alname'];  
                                                    ?>
                                                </td>
	                                            <td class="actions">
	                                                <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
	                                                <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
	          
	                                                <a href="delatebook.php?ref=<?php echo $info['id']; ?>" onclick="return confirm('Are you sure to Delete?');" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
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