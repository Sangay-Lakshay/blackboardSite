<?php
    session_start();
    
    if( isset($_SESSION['user'])){
        header("Location: profile.php");
    }
    include('connect.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title> BlackBoard </title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/material.css">
        <link type="text/css" rel="stylesheet" href="fonts/font.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/styles.min.css">
        
    </head>
    <body id="_6">
        <!-- navigation bar -->
        <a href="index.php">
            <div id="log">
                <div id="ntro">BlackBoard</div>
            </div>
        </a>
        <ul id="nav-bar">
            <a href="index.php"><li>Home</li></a>
            
            <?php 
                if(! isset($_SESSION['user'])){
            ?>
            <?php
                }
                else{
            ?>
            <a href="profile.php"><li>Hi, <?php echo $_SESSION["user"]; ?></li></a>
            <a href="logout.php"><li>Log Out</li></a>
            <?php
                }
            ?>
        </ul>
        
       <div class="row register-form">
    <div class="col-md-8 offset-md-2">
        <form class="custom-form" action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post">
            <h1>Register Form</h1>
            <div class="row form-group">
                <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Enrollment Number</label></div>
                <div class="col-sm-6 input-column"><input type="number" name="enrollNo" /></div>
            </div>
            <div class="row form-group">
                <div class="col-sm-4 label-column"><label class="col-form-label" for="email-input-field">Name</label></div>
                <div class="col-sm-6 input-column"><input type="text"  name="name" required /></div>
            </div>
            <div class="row form-group">
                <div class="col-sm-4 label-column"><label class="col-form-label" for="pawssword-input-field">Department</label></div>
                <div class="col-sm-6 input-column"><select name="department" required>
                        <optgroup>
                            <option value="12">Select course</option>
                            <option value="13">Bachelor of Science in Computer Science</option>
                            <option value="14">Bachelor of Science in Information Technology</option>
                        </optgroup>
                    </select></div>
            </div>
            <div class="row form-group">
                <div class="col-sm-4 label-column"><label class="col-form-label" for="repeat-pawssword-input-field">Year</label></div>
                <div class="col-sm-6 input-column"><input type="text"  name="year" required /></div>
            </div>
            <div class="row form-group">
                <div class="col-sm-4 label-column"><label class="col-form-label" for="dropdown-input-field">Email</label></div>
                <div class="col-sm-4 input-column"><input type="email"  name="email" required="" /></div>
            </div>
            <div class="row form-group">
                <div class="col-sm-4 label-column"><label class="col-form-label" for="dropdown-input-field">Password</label></div>
                <div class="col-sm-4 input-column"><input type="password" name="password" required class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>"/>
                <span class="invalid-feedback"><?php echo $password_err; ?></span></div>
            </div>
            <div class="row form-group">
                <div class="col-sm-4 label-column"><label class="col-form-label" for="dropdown-input-field">Confirm Password</label></div>
                <div class="col-sm-4 input-column"><input type="password" name="Cpassword" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>"/>
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span></div>
            </div><input class="btn btn-light submit-button" type="submit" name="submit"></input>
        </form>
    </div>
</div>
        
        <?php
        
            if( isset( $_POST["submit"] ) )
            {

                function valid($data){
                    $data=trim(stripslashes(htmlspecialchars($data)));
                    return $data;
                }

                $username = valid( $_POST["username"] );
                $password = valid( $_POST["password"] );
                $password = password_hash($password, PASSWORD_DEFAULT);
                $name = valid( $_POST["name"] );
                $email = valid( $_POST["email"] );

                $query = "INSERT INTO users values( NULL, '$username', '$password', '$name', '$email', CURRENT_TIMESTAMP )";
                if(mysqli_error($conn)){
                    echo "<script>window.alert('Something Goes Wrong. Try Again');</script>";
                }
//                echo $query;
                else if( mysqli_query( $conn, $query) ){
                    echo "<style>#sf{display: none;} #ta{display:block;}</style>";
                }
                else{
//                    echo mysqli_error($conn);
                    echo "<script>window.alert('Username Already Exist !! Try Again');</script>";
                }
                mysqli_close($conn);
            }
        
        ?>
        
        <!-- Footer -->
        <div id="footer" style="padding:20px;">
            &copy; 2017 &bull; Interrogate Inc.
        </div>
        
        <!-- Sripts -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script type="text/javascript" src="js/jquery-3.2.1.min.js"><\/script>')</script>
        <script type="text/javascript" src="js/script.js"></script>
        
    </body>
    
</html>