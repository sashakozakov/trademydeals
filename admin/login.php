<?php 
session_start();
include("db.php");
if(isset($_SESSION['admin_id'])) {
       header("location:index.php");
}
 $msg = "";
if(isset($_POST['submit'])){
			$sql = "SELECT id,email FROM  `admin_user` WHERE  `email` =  '".$_POST['email']."'  AND  `password` = '".$_POST['password']."'";
			$query = mysql_query($sql);
			
			//die(var_dump($data));
			if(mysql_num_rows($query))
			{		
				$result	 = mysql_fetch_row($query);
				$_SESSION['admin_id']=$result[0];
				$_SESSION['admin_email']=$result[1];	
				header("location:index.php");
			}
			else
			{
			   $msg="Wrong Username or Password!";    
			}
 } ?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Trademydeal - Login</title>

    <link rel="stylesheet" href="login_css/style.css" media="screen" type="text/css" />

</head>

<body>

  <div class="container">

  <div id="login-form">

    <h3>Login</h3>

    <fieldset>

      <form action="" method="post">
		<div style="color: red;text-align: center;padding-bottom: 8px;"><?php echo $msg;?></div>
        <input type="email" name="email" id="email"  value="Email" onBlur="if(this.value=='')this.value='Email'" onFocus="if(this.value=='Email')this.value='' "> <!-- JS because of IE support; better: placeholder="Email" -->

        <input type="password" name="password" id="password" value="Password" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' "> <!-- JS because of IE support; better: placeholder="Password" -->

        <input type="submit" name="submit" value="Login">

        <footer class="clearfix">

         
        </footer>

      </form>

    </fieldset>

  </div> <!-- end login-form -->

</div>

</body>

</html>