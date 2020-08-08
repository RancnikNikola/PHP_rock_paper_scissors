<?php 

session_start();
$userAnswer = $_GET['name'];
// $_SESSION['user'] = 0;
// $_SESSION['comp'] = 0;

$rock = "rock";
$paper = "paper";
$scissors = "scissors";
$answers = array($rock, $paper, $scissors);
$random = array_rand($answers, 1);
if ($_GET['name'] == "") {

} else {
  $compAnswer = $answers[$random];
}


if ($_GET['reset'] == 'Reset') {
  $_SESSION['user'] = 0;
  $_SESSION['comp'] = 0;
  $_SESSION['userRound'] = 0;
  $_SESSION['compRound'] = 0;
}



if ($userAnswer == $compAnswer) {
  $tie = "Tie";
} elseif ($userAnswer == "rock" && $compAnswer == "paper") {
  $_SESSION['comp'] = $_SESSION['comp'] + 1;
  // $playerLost = "Player lost in rock vs paper";
} elseif ($userAnswer == "paper" && $compAnswer == "scissors") {
  $_SESSION['comp'] = $_SESSION['comp'] + 1;
  // $playerLost = "Player lost in paper vs scissors";
} elseif ($userAnswer == "scissors" && $compAnswer == "rock") {
  $_SESSION['comp'] = $_SESSION['comp'] + 1;
  // $playerLost = "Player lost in scissors vs rock";
} elseif ($userAnswer == "rock" && $compAnswer == "scissors") {
  $_SESSION['user'] = $_SESSION['user'] + 1;
  // $compLost = "Comp lost in rock vs scissors";
} elseif ($userAnswer == "paper" && $compAnswer == "rock") {
  $_SESSION['user'] = $_SESSION['user'] + 1;
  // $compLost = "Comp lost in paper vs rock";
} elseif ($userAnswer == "scissors" && $compAnswer == "paper") {
  $_SESSION['user'] = $_SESSION['user'] + 1;
  // $compLost = "Comp lost in scissors vs paper";
}

if ($_SESSION['comp'] == 3) {
  $compWin = "Computer Wins";
  $_SESSION['user'] = 0;
  $_SESSION['comp'] = 0;
  $_SESSION['compRound'] = $_SESSION['compRound'] + 1;

} elseif ($_SESSION['user'] == 3) {
  $userWin = "User Wins";
  $_SESSION['user'] = 0;
  $_SESSION['comp'] = 0;
  $_SESSION['userRound'] = $_SESSION['userRound'] + 1;

}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Hello, world!</title>
    <style>

      .Hover:hover {
        box-shadow: 10px 10px 8px 10px #888888;
      }

      .btn {
        color: black;
        border: 4px solid black;
        font-weight: bold;
        width: 50%;
     
      }

      .btn:hover {
        box-shadow: 5px 10px 8px black;
      }

      .scoreTracker li{
        list-style: none;
      }
    </style>
  </head>
  <body style="background-color:tomato;">

  <div class="container" style="width: 80%;">
    <div class="row">
        <div class="col-sm-4 rounded-circle">
            <a href="index.php?name=rock" id="rock">
                <img src="images/rock.png" alt="rock" style="height: 100%; width:100%;" class="rounded-circle Hover"/>
            </a>
        </div>
        <div class="col-sm-4" style="background-color: transparent; height: 100%; width:100%;">
        <h1><?php echo $userWin; ?></h1>
        <h1><?php echo $compWin; ?></h1>
        <p><?php echo "User chose: " . $userAnswer . "<br>"; ?></p>
        <p><?php echo "Comp chose: " .$compAnswer; ?></p>
        </div>
        <div class="col-sm-4 rounded-circle scissorsHover">
            <a href="index.php?name=scissors" id="scissors">
                <img src="images/scissors.png" alt="scissors" style="height: 100%; width:100%;" class="rounded-circle Hover"/>
            </a>
        </div>
    </div>

    <div class="row">
      <div class="col-sm-4" style="background-color: transparent; height: 100%; width:100%;">
        
      </div>
      <div class="col-sm-4">
        <a href="index.php?name=paper" id="paper" class="paperHover">
            <img src="images/paper.png" alt="paper" style="height: 100%; width:100%;" class="rounded-circle Hover"/>
        </a>
      </div>
      <div class="col-sm-4" style="background-color: transparent; height: 100%; width:100%;">
          <ul class="scoreTracker">
            <li><?php echo $tie . "<br>"; ?></li>
            <li><?php echo 'User Score: ' . $_SESSION['user'] . "<br>"; ?></li>
            <li><?php echo 'Comp Score: ' . $_SESSION['comp'] . "<br>"; ?></li>
            <li><?php echo 'User round win: ' . $_SESSION['userRound'];?></li>
            <li><?php echo 'Comp round win: ' . $_SESSION['compRound'];?></li>
          </ul>
          <form method="GET">
            <input type="hidden" name="reset" value="Reset" />
            <input type="submit" value="Reset" class="btn btn-outline"/>
          </form>
      </div>
  </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>

  </body>
</html>