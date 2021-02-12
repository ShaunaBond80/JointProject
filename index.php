
 <?php
 $host = 'localhost';
 $username = 'root';
 $password = '';
 $conn = new mysqli($host, $username, $password);
 $cipher = 'AES-128-CBC';
 $key = 'thebestsecretkey';
 if ($conn->connect_error) {
 die('Connection failed: ' . $conn->connect_error);
 }
 if (isset($_POST['delete-everything'])) {
 $sql = 'DROP DATABASE securenotepad;';
 if (!$conn->query($sql) === TRUE) {
 die('Error dropping database: ' . $conn->error);
 }
 }
 $sql = 'CREATE DATABASE IF NOT EXISTS securenotepad;';
 if (!$conn->query($sql) === TRUE) {
 die('Error creating database: ' . $conn->error);
 }
 $sql = 'USE securenotepad;';
 if (!$conn->query($sql) === TRUE) {
 die('Error using database: ' . $conn->error);
 }
 $sql = 'CREATE TABLE IF NOT EXISTS notes (
 id int NOT NULL AUTO_INCREMENT,
 iv varchar(32) NOT NULL,
 content varchar(256) NOT NULL,
 PRIMARY KEY (id));';
 if (!$conn->query($sql) === TRUE) {
 die('Error creating table: ' . $conn->error);
 }
 ?>
  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Bonds Medical Center</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">Bonds Medical Center</h3>  
                <br />  
                <?php 
				
				
?>
                <h3 align="center">Login</h3>  
                <br />  
                <form method="post">  
                     <label>Enter Username</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Enter Password</label>  
                     <input type="text" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" value="Login" class="btn btn-info" />  
                     <br />  
                     <p align="center"><a href="index.php">Register</a></p>  
                </form>  
                <?php       
               
                ?>  
                <h3 align="center">Register</h3>  
                <br />  
                <form method="post"> 
                     <label>Enter Username</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Enter Password</label>  
                     <input type="text" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="register" value="Register" class="btn btn-info" />  
                     <br />  
                     <p align="center"><a href="index.php?action=login">Login</a></p>  
                </form>  
                <?php 
			 
                ?>  
           </div>  
      </body>  
 </html>