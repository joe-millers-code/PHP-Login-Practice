<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>PHP Practice Login</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php 

            $connection = mysqli_connect("localhost","root","","loginPractice");
            // Check connection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }

            if(isset($_POST['log'])){
                $email = mysqli_real_escape_string($connection, $_POST['email']);
                $passwd = mysqli_real_escape_string($connection, $_POST['password']);
                
                if($email!= "" && $passwd!= "") {
                    $sql = "SELECT id FROM login_prac WHERE username='$email' and passwd='$passwd' ";
                    $result = mysqli_query($connection, $sql);
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    $count = mysqli_num_rows($result);
                    if($count==1){
                        header("Location:index.html");
                    }
                }

                
            }
        ?>
    </head>
    <body>
        <form class="form" action="login.php" method="post">
            <div class="container">
                <label for="">Sign Up</label>
                <input type="text" name="email" placeholder="Email" value="">
                <input type="password" name="password" placeholder="Password" value="" >
                <a href="#" >Forgot Password?</a>
                <button type="submit" class="btn" name="log" >Login</button>
            </div>
        </form>
    </body>
</html>