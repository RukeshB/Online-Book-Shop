<?php 
require ('../class/databaseClass.php');
include "header.php";
?>

			<!-- ============================================================== -->
			<!-- Start right Content here -->
			<!-- ============================================================== -->
            <div class="breadcrumb">
            <div class="container">
                <a class="breadcrumb-item" href="home.php">Home</a>
                <span class="breadcrumb-item active">My Book</span>
            </div>
            </div>
			<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">

                    <h4 class="m-t-0 header-title"><b>Cart Tables</b></h4><br>

                        <?php 
                            //displayMsg();
                        ?>


                        <div class="panel">
                            
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="m-b-30">
                                            
                                        </div>
                                    </div>
                                </div>
                                <br>
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
                                             ?> alt="user-img" id="photo" width="128">
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
                                                   <?php echo $info['ufname']." ". $info['ulname'];  ?>
                                                </td>
                                                <td>
                                                   <?php echo $info['ucontact'];  ?>
                                                </td>
                                                <td>
                                                   <?php echo $info['uaddress'];  ?>
                                                </td>
                                                <td class="actions">
                                                    
                                                    <a href="delate.php?ref=<?php echo $info['id']; ?>" onclick="return confirm('Are you sure to Delete?');" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
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

<?php include "footer.php"; ?>