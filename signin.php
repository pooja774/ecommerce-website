<!DOCTYPE html>
<html lang="en">
  <head> 
    <br>
    <b><h1 align="center" style="color:black" style=font-size:100px;><b>START YOUR NEW JOURNY<b></h1></b>
    <br>
    
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIGNIN Page</title>
    
    
    <style>

      body {
    
    background-image: url("sneakers1.jpg");
    background-size: cover;
    background-position: center;
    height: 100vh;
}
   
      .login-box {
        height: 300px;
        width: 270px;
       
        background: rgba(0, 0, 0, 0, 0);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 1);
        padding-top: 60px;
        border-radius: 10px;
        color:black;
        
        
      }

     .login hr {
     text-align: center;
     }
      .container{
      position: absolute;
      top: 50%;
      left: 50%;
      align-items: center;
        text-align: center;
      transform: translate(-50%,-50%);
      }

      .login-box input {
        width: 200px;
        
        align-items: center;
        text-align: center;
        padding: 10px;
        font-size:13px;   
        box-shadow: 0 0 4px ;
        border-radius: 30px; 
        color: #000;
        margin-top: 20px;
       
      }
      
      .login-box button[type="submit"] {
        width: 200px;
        background-color: #2ecc71;
        color: #000;
        background:transparent ;
        align-items: center;
        text-align: center;
        padding: 10px;
        font-size:13px;   
        box-shadow: 0 0 4px #fff;
        border-radius: 30px; 
        color: #000;
        margin-top: 20px;
       
        
      }
     
    </style>
  </head>
    
    <div class="container">
     <div class="login-box">
      <span class="glow"></span>
      <?php
      // Display error message if set
      if (isset($_GET['error'])) {
        echo "<p style='color: red;'>".$_GET['error']."</p>";
    }
    ?>
      <br>
      <form action="signin_process.php" method="POST">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password_hash" name="password" placeholder="Password" required><br>
        <button type="submit" value="login"><b>Login</b></button>
    </form>
          <div class="forget-btn">
          <a href="forgot.php">forgot password</a>
          <br>
          <br>
          <br>
           <br>
           <br>
           <br>
           New user? <a href="sign-up.php">SignUp Now</a>
        </form>
    </div>
     </div>  
    </div>
  </body>
</html>

