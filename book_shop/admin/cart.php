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

								<h4 class="page-title">Cart Tables</h4>
								<ol class="breadcrumb">
									<li>
										<a href="dashboard.php">Home</a>
									</li>
									<li class="active">
										Cart
									</li>
								</ol>
							</div>
						</div>



                        <?php 
                            //displayMsg();
                        ?>


                        <div class="panel">
                            
                            <div class="panel-body">
                                
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
                                                <th>user Name</th>
                                                <th>User Contact</th>
                                                <th>User Address</th>
                                                <th>Action</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
                                            <?php
                                                $i=1;
                                                $data = new database;
                                                $stmt= $data -> SelectCartBooks($_SESSION['id']); 
                                                if($stmt):
                                                foreach($stmt->fetchAll() as $key => $info):
                                                if($info['adminid'] != $_SESSION['id'])
                                                {
                                            ?>

	                                        <tr class="gradeX">
	                                            <td>  <?php echo $i; $i++; ?></td>
	                                            <td>
                                                  <img <?php if($info['photo']!= NULL) echo "src=../uploadImage/".$info['photo']; else echo "src= assets/images/products/big/book.jpg";
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
                                                <td>
                                                   <?php 
                                                   if($info['acontact'] == null)
                                                    echo $info['ucontact']; 
                                                   else
                                                    echo $info['acontact'];
                                                         ?>
                                                </td>
                                                <td>
                                                   <?php 
                                                   if($info['aaddress'] == null)
                                                    echo $info['uaddress'];

                                                    else
                                                    echo $info['aaddress'];  ?>
                                                </td>
	                                            <td class="actions">
	                                                
	                                                <a href="delete.php?ref=<?php echo $info['id']; ?>" onclick="return confirm('Are you sure to Delete?');" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
	                                            </td>
                                            </tr>
                                            
                                            <?php
                                            }
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