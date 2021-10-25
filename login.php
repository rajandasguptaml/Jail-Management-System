<!DOCTYPE HTML>
<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

      #login_outer{
        position: absolute;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%)
      }
      #login{
        border-style: solid;
        border-color: #DCDCDC;
        padding: 30px;

      }
      input[type=text], input[type=password] {
        width: 300px;
        padding: 4px 5px;
        margin: 6px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
      input[type=submit]{
        background-color: #255;
        color: white;
        padding: 5px 6px;
        margin: 6px 0;
        border: none;
        cursor: pointer;
        width: 300px;
      }
      a{
        color: #4db8ff;
      }

      
      .error {color: #FF00FF;}
	  
 
    </style>
		  <style>
body {
  background-image: url('RED.jpg');
}
</style>
  </head>

  <body>

    <?php

      $nameErr = $pwdErr = "";
      $name = $pwd = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
          $nameErr = "Name is required";
        } else {
          $name = test_input($_POST["name"]);
        }

        if (empty($_POST["Password"])) {
          $pwdErr = "Password is required";
        } else {
          $pwd = test_input($_POST["Password"]);
        }

      }
      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }


    ?>
    <div id = "login_outer" >
	<center>
      <h2>Visitors</h2>
	  </center>
      <div id="login" >
        <h4>LOGIN</h4>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          Name
          <br>
          <input type="text" name="name" value="<?php echo $name;?>">
          <span class="error"> <?php echo $nameErr;?></span>
          <br><br>
          Password
          <br>
          <input type="password" name="Password">
          <span class="error"> <?php echo $pwdErr;?></span>
          <br>
          <a href = "#">Forgot Password?</a>
          <br><br><br>

          <input type="submit" name="submit" value = "login" action="Hindex.php">
          <p><center>If you don't have account then register</center></p>

           
        </form>
      </div>
      <br>
      <center>Don't have an account ? <a href= "/register" >Register</a></center>
    </div>

    <?php

    if(isset($_GET['submit'])) {
        $file = json_decode("data.json");

        $arr = array(
            'name'     => $_GET['name'],
            'Password'    => $_GET['Password']
        );

        //$json_string = 
        
        file_get_contents($file, $json_string);
        
      }


     ?>
	 
 

  </body>

</html>
