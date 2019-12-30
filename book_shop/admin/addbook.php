<?php 
include 'layout/header.php';
include 'layout/side_bar.php';
require('../class/fileClass.php');
   
    $data = new database;
    $filedata = new file;
    if(isset($_POST['savebtn']))
    {     
      $_POST['photo']= $filedata-> uploadphoto($_FILES['photo']);
      $data-> insert($_POST,'book_tbl');
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
                                                        <img src= "assets/images/products/big/book.jpg" alt="user-img"  id="photo" width="128" height="128">
                                                        <input required  type="file" name="photo" class="inputfile" onchange="displayPhoto(this)">
                                                    </div>
                                                </div>                  
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Title </label>
	                                                <div class="col-md-10">
	                                                    <input required  type="text" class="form-control" name="title" placeholder="Enter Book Title" >
	                                                </div>
	                                            </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Description </label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control" name="description" >
                                                        </textarea>
                                                    </div>
                                                </div>                              
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Publication</label>
	                                                <div class="col-md-10">
	                                                    <input required  type="text" class="form-control" name="publication" placeholder="Enter Publication Name">
	                                                </div>
	                                            </div>
	                                            <div class="form-group">
                                                    <label class="col-md-2 control-label">Author</label>
                                                    <div class="col-md-10">
                                                        <input required  type="text" class="form-control" name="author" placeholder="Enter Author Name">
                                                    </div>
                                                </div>
	                                            <div class="form-group">
                                                    <label class="col-md-2 control-label">Edition</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control" name="edition">
                                                            <option value="1st Edition">1st Edition</option>
                                                            <option value="2nd Edition">2nd Edition</option>
                                                            <option value="3rd Edition">3rd Edition</option>
                                                        </select>
                                                    </div>
                                                </div>                         
	                                            <div class="form-group">
                                                    <label class="col-md-2 control-label">Price</label>
                                                    <div class="col-md-10">
                                                        <input required  type="text" class="form-control" name="price" placeholder="Enter Price">
                                                    </div>
                                                </div>                     
	                                            <div class="form-group">
                                                    <label class="col-md-2 control-label">Category</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control" name="category">
                                                            <option value="literature & fiction">literature & fiction</option>
                                                            <option value="Children">Children</option>
                                                            <option value="exam preparation">exam preparation</option>
                                                            <option value="business & economics">business & economics</option>
                                                            <option value="health,family & personality">health,family & personality</option>
                                                            <option value="history">history</option>
                                                            <option value="text books">text books</option>
                                                            <option value="romance">romance</option>
                                                        </select>
                                                    </div>
                                                </div>                                       
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Type </label>
	                                                <div class="col-md-10">
	                                                    <select class="form-control" name="type">
                                                            <option value="first hand">first hand</option>
                                                            <option value="second hand">second hand</option>
                                                        </select>
	                                                </div>
	                                            </div>          
	                                             <div class="form-group">
                                                    <div class="col-md-10">
                                                        <input required  type="hidden" class="form-control" name="adminid" value="<?php echo $_SESSION['id'] ?>">
                                                       
                                                    </div>
                                                </div>
	                                            <div class="form-group">
                                                    <div class="col-md-10">
                                                       
                                                        <input required  type="hidden" class="form-control" name="date" value="<?php echo date('Y/m/d'); ?>">
                                                    </div>
                                                </div>                     
                                                                                                                 
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