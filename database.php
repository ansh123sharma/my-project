<?php 
    // Create connection credentials
    $db_host = 'localhost';
    $db_name = 'webq';
    $db_user = 'root';
    $db_pass = '';

    // Create the mysqli object
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Error handler
    if($mysqli->connect_error) {

        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

?>
<?php include 'database.php'; ?>
<?php
/*
* Get total number of questions
*/

  $query = "SELECT * FROM `questions`";

  // get results
  $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
  $total = $results->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>WebQuiz </title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<nav class="red lighten-1" role="navigation">
        <div class="nav-wrapper container"> <a href="questions.php?n=1" class="btn-floating red btn-large"><i class="large material-icons">book</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#">Home</a></li>
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <li><a href="#"></a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center red-text">Try Our WebQuiz</h1>
      <div class="row center">
        <h5 class="header col s12 light">Expected Time <?php echo $total * .5 ?> Minutes</h5>
      </div>
      <div class="row center">
        <form action="questions.php" method="GET">
          <input type="hidden" name="n" value="1">
          <input type="text" name="name" placeholder="Please Enter your Name">
          <button class="btn-large  waves-effect light red ">Start Quiz</button>

        </form>
      </div>
      <!-- <div class="row center">
        <a href="questions.php?n=1" id="download-button" class="btn-large waves-effect waves-light red">Start Quiz</a>
      </div> -->
      <br><br>

    </div>
  </div>

  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">Speeds up development</h5>

            <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
            <h5 class="center">User Experience Focused</h5>

            <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Easy to work with</h5>

            <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
          </div>
        </div>
      </div>

    </div>
    <br><br>
  </div>

  <footer class="page-footer modal-fixed-footer red lighten-1">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">WebQuiz</h5>
          <p class="grey-text text-lighten-4">Quizzes help you accelerate your learning and allow to gain the most through your learning experience. They are essential part of learning and allows enhancing the academics as well as creates an intuitive learning experience</p>

        </div>
        
      
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">RollNoA24</a>
      </div>
    </div>
  </footer>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>


<?php include 'database.php'; ?>

<?php session_start(); ?>
<?php
$name = $_SESSION['name'];
$score = $_SESSION['score'];
                $query = "INSERT INTO `scores`(name, score) VALUES('$name','$score')";
        $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
        if($insert_row){
            $msg = "added successfully";
        }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>WebQuiz</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body>
<nav class="red lighten-1" role="navigation">
        <div class="nav-wrapper container">  <a href="index.php" class="btn-floating red btn-large"><i class="large material-icons">book</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#">Home</a></li>
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <li><a href="#">Navbar Link</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <div class ="card-panel">
       

            </div>

            <div class="container ">
            <div class ="card-panel">
          
            <button class="btn btn-large teal darken-3 white-text">Congrats!  You have completed the test!!!</button>

            </div>
            <div class ="card-panel">
            <button class="btn btn-large red darken-3 white-text">Final Score:  <?php echo $_SESSION['score']; ?></button>
            <?php $_SESSION['score'] = 0; ?>

            </div>
            <div class ="card-panel">
            <button class="btn btn-large red darken-3 white-text">Candidate's Name:  <?php echo $_SESSION['name']; ?></button>
            <?php $_SESSION['name'] = ''; ?>

            </div>
            <div class="card-panel">            <a href="index.php" class="btn-floating red btn-large"><i class="large material-icons">mode_edit</i></a>
</div>

            </div>
    
    </body>
</html>
