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

								<h4 class="page-title">Book Tables</h4>
								<ol class="breadcrumb">
									<li>
										<a href="dashboard.php">Home</a>
									</li>
									<li class="active">
										Books Store
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
                                                <th>Description</th>
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
                                                    $data = new user;
                                                    $stmt= $data -> selectallbook(); 
                                                 if($stmt){
                                                foreach($stmt->fetchAll() as $key => $info):
                                                 if($info['adminid'] != $_SESSION['id'])
                                                {
                                            ?>

	                                        <tr class="gradeX">
	                                            <td>  <?php echo $i; $i++; ?></td>
	                                            <td>
                                                 <img <?php if($info['photo']!= NULL) echo "src= ../uploadImage/".$info['photo']; else echo "src= assets/images/products/big/book.jpg";
                                             ?> alt="user-img" id="photo" width="128" height="128">
	                                            </td>
	                                            <td>
                                                   <?php echo $info['title'];  ?>
	                                            </td>
                                                <td>
                                                   <?php /*echo $info['description'];*/  ?>
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
                                                   <?php if($info['user']==0)
                                                            echo $info['afname']." ". $info['alname'];
                                                         else
                                                            echo $info['ufname']." ". $info['ulname'];
                                                        ?>
                                                </td>
                                                <td>
                                                   <?php 
                                                   if($info['user']==0)
                                                        echo $info['acontact'];
                                                    else
                                                        echo $info['ucontact']; ?>
                                                </td>
                                                <td>
                                                   <?php 
                                                   if($info['user']==0)
                                                        echo $info['aaddress'];
                                                    else
                                                        echo $info['uaddress'];  ?>
                                                </td>
	                                            <td class="actions">
	                                                
	                                                <a href="AddToCart.php?ref=<?php echo $info['id']; ?>" class="on-default edit-row"><i class="fa fa-cart-plus"></i></a>
	                                            </td>
                                            </tr>
                                            
                                            <?php
                                            }
                                            endforeach ;
                                            
                                         
                                        }    
                                            
                                            ?>
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