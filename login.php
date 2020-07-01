<?php
require('connection.inc.php');
require('functions.inc.php');
$msg='';
if(isset($_POST['submit'])){
    $username=get_safe_value($conn,$_POST['username']);
    $password=get_safe_value($conn,$_POST['password']);
    $sql="select * from admin_users where username='$username' and password='$password'";
    $row= mysqli_query($conn,$sql);
    $count = mysqli_num_rows($row);
    if($count>0){
        $_SESSION['ADMIN_LOGIN']='yes';
        $_SESSION['USERNAME']='$username';
        header("location:categories.php");
        die();
    }else{
         $msg="Please enter correct details";
    }
}
?>



<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="html/assets/css/normalize.css">
      <link rel="stylesheet" href="html/assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="html/assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="html/assets/css/themify-icons.css">
      <link rel="stylesheet" href="html/assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="html/assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="html/assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="html/assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body class="bg-dark">
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">
                  <form method="post">
                     <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                     </div>
                     <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="submit" value="submit">Sign in</button>
					</form>
                    <div class="field_error"><?php echo $msg; ?></div>
               </div>
            </div>
         </div>
      </div>
      <script src="html/assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="html/assets/js/popper.min.js" type="text/javascript"></script>
      <script src="html/assets/js/plugins.js" type="text/javascript"></script>
      <script src="html/assets/js/main.js" type="text/javascript"></script>
   </body>
</html>