<!-- <?php
    // session_start();
    // include('connect.php');
    // if(!isset($_SESSION['user']))
    //     header("location: login.php");
?> -->

<!DOCTYPE html>
<html>
    <head>
        <title> BlackBoard </title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/material.css">
        <link type="text/css" rel="stylesheet" href="fonts/font.css">
        
    </head>
    <body id="ask">
        <!-- navigation bar -->
        <a href="index.php">
            <div id="log">
                <div id="ntro">BlackBoard</div>
            </div>
        </a>
        <ul id="nav-bar">
            <a href="index.php"><li>Home</li></a>
            <a href="ask.php"><li id="home">Ask Question</li></a>
            <a href="profile.php"><li>Hi, <?php echo $_SESSION["user"]; ?></li></a>
            <a href="logout.php"><li>Log Out</li></a>
        </ul>
        
        <!-- content -->
        <div id="content">
            <div id="sf">
                <center>
                    <div class="heading ask">
                        <h1 class="logo"><div id="ntro">BlackBoard</div></h1>
                        
                    </div>

                    <form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post" enctype="multipart/form-data">

                        <input name="question" type="text" title="Your Question..." placeholder="Ask Your question" id="question">

                        
                        <input name="submit" type="submit" class="up-in" id="ask_submit">
                    </form>
                </center>
            </div>
        </div>
        
        <div id="ask-ta">
            <h1>Thank You.<br>Stay tunned for updates.</h1>
        </div>
        
        <?php
        
            if( isset( $_POST["submit"] ) )
            {

                function valid($data){
                    $data=trim(stripslashes(htmlspecialchars($data)));
                    return $data;
                }
                $question = valid( $_POST["question"] );
                
                $no = valid( $_POST["cat"]);
                $question = addslashes($question);
                $q = "SELECT * FROM QUESTION WHERE content = '$question'";
                $result = mysqli_query($conn,$q);
                if(mysqli_error($conn))
                    echo "<script>window.alert('Some Error Occured. Try Again or Contact Us.');</script>";
                else if( mysqli_num_rows($result) == 0 ){
                    $query = "INSERT INTO QUESTION VALUES(NULL, '$question', NULL,'".$_SESSION['user']."',NULL)";
                    mysqli_query( $conn, $query);
                    if(mysqli_query( $conn, $query)){
                        echo "<style>#sf{display: none;} #ask-ta{display:block;}</style>";
                    }
                    else{
                        echo "<script>window.alert('Some Error Occured. Try Again or Contact Us.');</script>";
                    }
                }
                else{
                    echo "<script>window.alert('Question was already Asked. Search it on Home Page.');</script>";
                }
                
                mysqli_close($conn);
            }
        
        ?>
        
        <!-- Footer -->
        <div id="footer" style="padding:30px;">
            &copy; 2021 &bull; GCIT.
        </div>
        
        <!-- Sripts -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script type="text/javascript" src="js/jquery-3.2.1.min.js"><\/script>')</script>
        <script type="text/javascript" src="js/script.js"></script>
        
    </body>
    
</html>