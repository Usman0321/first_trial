<!DOCTYPE html>
<html lang="en">
<?php
  include('connection.php');
  if(isset($_POST['submit'])){
    $img = $_FILES['img'];
    if(isset($_FILES['img'])){
      $img_name = $img['name'];
      $img_tmp_name = $img['tmp_name'];
      $img_size = $img['size'];
      $img_type = $img['type'];

      $img_name_time = ($img_name . time());
      move_uploaded_file($img_tmp_name , "uploaded_imgs/user_images/$img_name");
    }
    $user_password =  password_hash($_POST['user_password'] , PASSWORD_BCRYPT);
    // date_default_timezone_set("Asia/Karachi");
    // $time =  date("h:i:sa " . "M-d-Y");
    $user_name = mysqli_real_escape_string($connection, $_POST['user_name']);
    $img_name = mysqli_real_escape_string($connection, $img_name);
    $user_email = mysqli_real_escape_string($connection, $_POST['user_email']);
    $user_password = mysqli_real_escape_string($connection, $user_password);
    // $time = mysqli_real_escape_string($connection, $time);
    
    $duplicate = mysqli_query($connection , "SELECT * FROM users WHERE user_name='$user_name' && user_email='$user_email'");
    $duplicate_row = mysqli_fetch_assoc($duplicate);
    if($duplicate_row = mysqli_fetch_assoc($duplicate)){;
      ?><script> alert("user already existed")</script><?php
    }
    else{
      $query = mysqli_query($connection , "INSERT INTO users( user_name , user_img , user_email , user_password ) VALUES ('$user_name' , '$img_name'  ,  '$user_email' , '$user_password')"); 
      ?><script> alert("user added")</script><?php
    }

    
  }
?>
<!-- auth-register.html  21 Nov 2019 04:05:01 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Add User</h4>
              </div>
              <div class="card-body">
                <form action="" id="myForm"  enctype="multipart/form-data"  method="POST">
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="user_name">User Name</label>
                      <input id="user_name" type="text" class="form-control" name="user_name" autofocus>
                    </div>
                    <div class="form-group col-12">
                      <label for="user_img" class="d-block">User Image </label>
                      <input id="user_img" type="file" onchange="readURL(this);"  class="form-control" name="img">
                      <!-- <img src="" id="preview" width="200px" height="200px" alt=""> -->
                    </div>
                    <div class="form-group col-12">
                      <label for="user_email" class="d-block">User Email </label>
                      <input type="email" name="user_email" class="form-control" id="">
                    </div>
                    <div class="form-group col-12">
                      <label for="user_password" class="d-block">User Password </label>
                      <input type="password" name="user_password" class="form-control" id="">
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <label for="description">Description</label>
                    <input id="description" type="text" class="form-control" name="description">
                    <div class="invalid-feedback">
                    </div>
                  </div> -->
                  <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary btn-lg btn-block">
                      Submit 
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script type="text/javascript">
    // function readURL(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();

    //         reader.onload = function (e) {
    //             $('#preview').attr('src', e.target.result);
    //         }

    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
  </script>
   <script src="assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/auth-register.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/custom.js"></script>
</body>


<!-- auth-register.html  21 Nov 2019 04:05:02 GMT -->
</html>


