<?php 
    include "../Class/databaseClass.php";
    require('../class/fileClass.php');
    include '../admin/config/helper.php';
    include "header.php";
    
    $data = new database;
    $filedata = new file;
    $loged= new logedin;
    $result = $loged-> loginCheck();
             if($result == false  )
              {
                 //header('location: login.php');
                 redirection('login.php');
              }
    if(isset($_POST['savebtn']))
    {     
      $_POST['photo']= $filedata-> uploadphoto($_FILES['photo']);
      $data-> insert($_POST,'book_tbl');
    }
 ?>
    <div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="home.php">Home</a>
            <span class="breadcrumb-item active">Add Books</span>
        </div>
    </div>
    <section class="static about-sec">
        <div class="content-page">
                <!-- Start content -->
                <div class="form">
                <div class="content">
                    <div class="container">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Add New Book</b></h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <form class="form-horizontal"  method="POST" enctype="multipart/form-data">    <div class="form-group">
                                                    <div class="col-md-10">
                                                        <img src= "image/book.jpg" alt="user-img"  id="photo" width="128" height="150">
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
                                                        <input required  type="hidden" class="form-control" name="user" value="<?php echo $_SESSION['id'] ?>">
                                                       
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
                                                                <button type="submit" class="btn black" name="savebtn">Submit</button>
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
                   </div>            
               </div>
        </div>

    </section>
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
                                .height(150);             
                        };

                        reader.readAsDataURL(ele.files[0]);
                    }
                }
              </script>
    <?php include "footer.php"; ?>