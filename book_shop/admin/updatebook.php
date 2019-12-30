<?php 
include 'layout/header.php';
include 'layout/side_bar.php';
include 'config/helper.php';
require('../class/fileClass.php');
    $book_id= $_GET['ref']; 
    $data = new database;
    $filedata = new file;
    if(isset($_POST['updatebtn']))
    { 
        if($_POST['photo'] != " ")    
        $_POST['photo']= $filedata-> uploadphoto($_FILES['photo']);
      $data-> update($_POST,'book_tbl',$book_id);
    redirect('mybook.php');
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
                        			<h4 class="m-t-0 header-title"><b>update Book</b></h4>
                        			<hr>
                        			<div class="row">
                        				<div class="col-md-8">
                                            <?php 
                                                $stmt=$data -> select("book_tbl",$book_id);

                                                if($stmt)
                                                {
                                                    foreach($stmt->fetchAll() as $key => $info)
                                                    {?>
                        					<form class="form-horizontal"  method="POST" enctype="multipart/form-data">    
                                                
                                                <div class="form-group">
                                                    <div class="col-md-10">
                                                        <img <?php if($info['photo']!= NULL) echo "src= ../uploadImage/".$info['photo']; else echo "src= assets/images/products/big/book.jpg";
                                             ?> alt="user-img" id="photo" width="128" height="128">
                                                        <input type="file" name="photo" class="inputfile" onchange="displayPhoto(this)">
                                                    </div>
                                                </div>                  
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Title </label>
	                                                <div class="col-md-10">
	                                                    <input required type="text" class="form-control" name="title" value="<?php echo $info['title']?>" >
	                                                </div>
	                                            </div>                              
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Publication</label>
	                                                <div class="col-md-10">
	                                                    <input required type="text" class="form-control" name="publication" value="<?php echo $info['publication']?>">
	                                                </div>
	                                            </div>
	                                            <div class="form-group">
                                                    <label class="col-md-2 control-label">Author</label>
                                                    <div class="col-md-10">
                                                        <input required type="text" class="form-control" name="author" value="<?php echo $info['author']?>">
                                                    </div>
                                                </div>
	                                            <div class="form-group">
                                                    <label class="col-md-2 control-label">Edition</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control" name="edition">
                                                            <option value="1st Edition" <?php if($info['edition']=="1st Edition") echo 'selected="selected"'; ?>>1st Edition</option>
                                                            <option value="2nd Edition" <?php if($info['edition']=="2nd Edition") echo 'selected="selected"'; ?>>2nd Edition</option>
                                                            <option value="3rd Edition" <?php if($info['edition']=="3rd Edition") echo 'selected="selected"'; ?>>3rd Edition</option>
                                                        </select>
                                                    </div>
                                                </div>                         
	                                            <div class="form-group">
                                                    <label class="col-md-2 control-label">Price</label>
                                                    <div class="col-md-10">
                                                        <input required type="text" class="form-control" name="price" value="<?php echo $info['price']?>">
                                                    </div>
                                                </div>                     
	                                            <div class="form-group">
                                                    <label class="col-md-2 control-label">Category</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control" name="category">
                                                            <option value="literature & fiction" <?php if($info['category']=="literature & fiction") echo 'selected="selected"'; ?>>literature & fiction</option>
                                                            <option value="Children" <?php if($info['category']=="literature & fiction") echo 'selected="selected"'; ?>>Children</option>
                                                            <option value="exam preparation" <?php if($info['category']=="exam preparation") echo 'selected="selected"'; ?>>exam preparation</option>
                                                            <option value="business & economics" <?php if($info['category']=="business & economics") echo 'selected="selected"'; ?>>business & economics</option>
                                                            <option value="health,family & personality" <?php if($info['category']=="health,family & personality") echo 'selected="selected"'; ?>>health,family & personality</option>
                                                            <option value="history" <?php if($info['category']=="history") echo 'selected="selected"'; ?>>history</option>
                                                            <option value="text books" <?php if($info['category']=="text books") echo 'selected="selected"'; ?>>text books</option>
                                                            <option value="romance" <?php if($info['category']=="romance") echo 'selected="selected"'; ?>>romance</option>
                                                        </select>
                                                    </div>
                                                </div>                                       
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Type </label>
	                                                <div class="col-md-10">
	                                                    <select class="form-control" name="type">
                                                            <option value="first hand" <?php if($info['type']=="first hand") echo 'selected="selected"'; ?>>first hand</option>
                                                            <option value="second hand" <?php if($info['type']=="second hand") echo 'selected="selected"'; ?>>second hand</option>
                                                        </select>
	                                                </div>
	                                            </div>          
	                                             <div class="form-group">
                                                    <div class="col-md-10">
                                                        <input required type="hidden" class="form-control" name="adminid" value="<?php echo $_SESSION['id'] ?>">
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