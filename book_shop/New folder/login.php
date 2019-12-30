<?php 
  require ('class/databaseClass.php');
  require('class/fileClass.php');

  $data = new database;
  $loged= new logedin;
  $filedata = new file;
  $result = $loged-> loginCheck();

  if($result)
  {
     header('location: dashboard.php');
  }

  if(isset($_POST['savebtn']))
  {

    $_POST['photo']= $filedata-> uploadphoto($_FILES['photo']);

    $data-> insert($_POST,'users');
  }

  if(isset($_POST['login']))
  {
   
    if( $loged->getLoginDetail('users',$_POST))
    {
      header('location: dashboard.php');
    }
  }
 ?>
 
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
     <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

      <link rel="stylesheet" href="login_assets/css/style.css">

  
</head>

<body>

  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
        
          <h1 class="signuph1">Sign Up for Free</h1>
          
          
          
          
          <div class="top-row">

            <div class="left">
              <form method="POST" enctype="multipart/form-data">
              <img src="assets/images/users/avatar-1.jpg" alt="user-img"  id="userphoto" class="img-circle">
              <input type="file" name="photo" class="inputfile" onchange="displayPhoto(this)">
            </div>

            <div class="right">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" name="fname" required autocomplete="off" />
            </div>
            <br>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text" name="lname" required autocomplete="off"/>
            </div>
          </div>
          </div>
          <div class="field-wrap">
              <label>
                Address<span class="req">*</span>
              </label>
              <input type="text"name="address" required autocomplete="off" />
            </div>

          <div class="field-wrap">
              <label>
                Contact<span class="req">*</span>
              </label>
              <input type="text" name="contact" required autocomplete="off" />
           </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password" required autocomplete="off"/>
          </div>
          
          <input type="hidden" name="date" value="<?php echo date("Y/m/d");?>" />

          <button type="submit" name="savebtn" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password" required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button type="submit" name="login" class="button button-block"/>Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="login_assets/js/index.js"></script>
    <script type="text/javascript">
    function displayPhoto(ele){
      console.log(ele.value);
      if (ele.files && ele.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#userphoto')
                    .attr('src', e.target.result)   
                     .width(128)
                    .height(128);             
            };

            reader.readAsDataURL(ele.files[0]);
        }
    }
  </script>



</body>

</html>
