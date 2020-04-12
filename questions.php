<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php
// Set question number
$number = (int) $_GET['n'];
$name = $_GET['name'];

/*
  * Get total number of questions
  */

$query = "SELECT * FROM `questions`";

// Get result
$results = $mysqli->query($query) or die($mysqli->error . __LINE__);
$total = $results->num_rows;

/*
  * Get question
  */
$query = "SELECT * FROM `questions`
        WHERE question_number = $number";

// get result
$result = $mysqli->query($query) or die($mysqli->error . __LINE__);

$question = $result->fetch_assoc();

/*
  * Get choices
  */

$query = "SELECT * FROM `choices` 
        WHERE question_number = $number";

// get results
$choices = $mysqli->query($query) or die($mysqli->error . __LINE__);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Web Quiz</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body>

<nav class="red lighten-1" role="navigation">
        <div class="nav-wrapper container"> <a href="questions.php?n=1" class="btn-floating red btn-large"><i class="large material-icons">book</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#">Home</a></li>
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <li><a href="#">Navbar Link</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>

    <div class="section no-pad-bot" id="index-banner">
      <div class = "container">
      <div class="card-panel medium">
      <div class="card-panel red lighten-1">
      <h5 class="white-text">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?></h5>
      <h6 class="white-text">
          <?php echo $question['text']; ?>
</h6>
      </div>
      <form method="post" action="process.php">
      <?php while($row = $choices->fetch_assoc()): ?>
      <div class="card-panel "> 
    <p>
      
      <label>
        <input name="choice" type="radio" value="<?php echo $row['id']; ?>"  />
       <span><?php echo $row['text']; ?></span>
      </label>
    </p>
      </div>
    <?php endwhile; ?>  
    <input class="btn btn-large red darken-3 white-text" type="submit" value="submit" />
          <input type="hidden" name="number" value="<?php echo $number; ?>" />
          <input type="hidden" name="name" value="<?php echo $name; ?>" />

  
  </form>

 
      </div>

    </div>





        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>

</body>

</html>
