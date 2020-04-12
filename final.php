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
