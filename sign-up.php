<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <style>

body {
    
    background-image: url("s2.jpg");
    background-position: center;
    height: 300px;
}

      .registration-box {
        height: 350px;
        width: 270px;
       
        background: rgba(0, 0, 0, 0.1);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 1);
        padding-top: 60px;
        border-radius: 10px;
        
        
      }
      .container{
      position: absolute;
      top: 50%;
      left: 50%;
      align-items: center;
        text-align: center;
      transform: translate(-50%,-50%);
      }

      

      .registration-box input {
        width: 200px;
        background:transparent ;
        align-items: center;
        text-align: center;
        padding: 10px;
        font-size:13px;   
        box-shadow: 0 0 4px #fff;
        border-radius: 30px; 
        color: #fff;
        margin-top: 20px;
        
        
      }

      .registration-box button[type="submit"] {
        width: 200px;
       
        color: #04000E;
        background:transparent ;
        align-items: center;
        text-align: center;
        padding: 10px;
        font-size:13px;   
        box-shadow: 0 0 4px #fff;
        border-radius: 30px; 
        color: #fff;
        margin-top: 20px;
       
      }
    </style>
</head>
<body>

<div class="container">
<div class="registration-box">
        <span class="glow"></span>
        <div style="color:#00 ;"><u><b>REGISTER</b></u></div>
        <br>
        
    <form action="sign-upp.php" method="POST">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="username" name="username" placeholder="username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit"><b>Register</b></button>
    </form>
</div>
</div>
</body>
</html>