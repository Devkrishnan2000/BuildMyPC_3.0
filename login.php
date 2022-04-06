<?php 
session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/Styles/login.css">
    <title>Login</title>
</head>

<body>
    <form method='POST'>
        <h1>Sign-in</h1>
        <div></div>
        <label class='norm-msg'>Username</label>
        <input type="text" name='usrname' placeholder="Enter First Name">

        <label class='norm-msg'>Password</label>

        <input type="password" name='paswrd' placeholder="Enter password">
        <div></div>
        <input type="submit" name='login' value="Login">

<?php
if(isset($_POST['login']))
{
  $usrname = $_POST['usrname'];
  $paswrd = $_POST['paswrd'];
  $flag =0;
  $con = mysqli_connect("localhost","root","","buildmypc");
                if(!$con)
                die("Connection Failed".mysqli_connect_error());
                $result = mysqli_query($con,"select * from admin_table");
                if(mysqli_num_rows($result)>0)
                {
                  while($row=$result->fetch_assoc())
                  {
                      if($usrname==$row['Admin_name'])
                      {
                          $flag=1;
                          if($paswrd==$row['Admin_pass'])
                          {
                            header('location:control.html');  
                          }
                          else
                          {
                            echo "<label class='error-msg' >Incorrect Password</label>";
                          }
                      }
                  }
                  if($flag==0)
                  {
                    echo "<label class='error-msg' >User doesnt Exist</label>";
                  }
                }
 
  
}

?>

    </form>
</body>

</html>