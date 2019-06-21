
<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);


if(isset($_SESSION['username'])){

  include "includes/db.php";
  include "includes/class.user.php";
  include "includes/class.matches.php";

  $userob = new user();


  $username="";
  if(isset($_GET['username']))
    $username = trim($_GET['username']);
  else
    $username = $_SESSION['username'];

  $row = $userob->getUserDetails($username, $con);



  $title = $row['first_name']."'s Profile";
  include "includes/home-header.php";

  ?>

<link href="https://fonts.googleapis.com/css?family=Lobster|Raleway|Montserrat|Open+Sans" rel="stylesheet">
</head>
<style>

  body {
    background-color: #70b4e0;
  }
  .row.profile-header {
    background-color: gray;
    height: 300px;
    width: auto;
    display: block;
    background: url(images/untitled-4.jpg) no-repeat center;
    background-repeat: no-repeat;
		background-attachment: fixed;
		background-position: center;
  }
  .profile-settings {
    height: auto;
    width: 100%;
  }
  .bubbleface {
    background-color: #f6f6f6;
    padding: 4px;
    border: 1px solid #ddd;
    width: 250px;
    height: 250px;
    margin: -93px auto 0 55px;
  }
  .bubbleface img {
    width: 250px;
    height:250px;
  }
  .details {
    font-size: 16px;
    max-width: 100%;
    height: auto;
    display: block;
    font-family: 'Montserrat', sans-serif;
  }
  .details h1 {
    font-size:3em;
    line-height: 1.5em;
    font-family: 'Lobster', cursive;
  }
  .details h2 {
    font-size: 2.3em;
    line-height: 0em;
  }
  .profile-description {
    height: auto;
    font-size: 16px;
    margin-top: 3em;
    text-align: justify;
    background-color: #f6f6f6;
    font-family: 'Raleway', sans-serif;
    padding: 3em;
  }
  .dash {
    margin-left: 1em;
    margin-top: 1em;
  }
  .edit {
    margin-right: 1em;
    margin-top: 1em;
  }
  footer {
    height: 110px;
    font-family: 'Raleway', sans-serif;
    position: relative;
    bottom: 0;
    left: 0;
    background-color: #eeefed;
		color: black;
		padding-bottom: 4em;
  }
  .bottom {
    margin:2.2em 0 1.3em 3.3em;
  }
  html, body {
    height: 100%;
    /* The html and body elements cannot have any padding or margin. */
  }
  @media (min-width: 769px){
    .details{
      margin:-15em auto 0 20em;
    }
    .details h1{
      color: white;
      text-shadow: 2px 2px rgb(51, 140, 198);
    }
  }
  @media screen and (max-width:768px)
  {
    .bubbleface {
      width: 170px;
      height: 170px;
      margin: -6em auto -2em;
    }
    .details {
      font-size: 12px;
      text-align: center;
    }
    .profile-description {
      margin-top: 0em;
      font-size: 14px;
    }
  }

  /* Dating Cards CSS*/
	.buttons a {
    font-size: 2em;
	}
  .bulletin {
    margin-bottom: 3em;
    background-color: #eeefed;
		/* Add shadows to create the "card" effect */
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    border-radius: 5px;
    padding-bottom: 0.1em;
  }
  .bulletin-top-nav {
    border-top-left-radius: 5px;
		border-top-right-radius: 5px;
		background-color: #f8f8f8;
	}
	.bulletin-content {
		margin: 1em;
    background: grey;
    height: 600px;
    overflow-y: scroll;
    border-radius: 10px;
	}
  @media screen and (max-width:410px)
  {
    .bulletin-content {
      height: 350px;
    }
  }
	.bulletin-card {
		/* Add shadows to create the "card" effect */
		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
		transition: 0.3s;
		border-radius: 5px;
		background-color: white;
		padding: 1em 1em;
		margin: 1em 1em;
	}
	.userName-info {
		padding: 1em;
	}
	.user-img {
    height: 100px;
    width: 100px;
	}
	.navbar-header img {
		margin: 0.5em;
	}
	.button-filters {
		padding: 0.5em;
	}
	.profile-card-action-buttons img {
		width: 35px;
		padding: 5px;
		border: 0;
		box-shadow: 0;
		display: inline;
	}
	.profile-card-action-buttons a {
		font-size: 1em;
	}
	.clearfix {
		overflow:auto;
	}
  .profile-card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: auto;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    /*padding: 1em 1em;*/
		margin: 1em 1em;
  }
  .profile-card img {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
  }
  .profile-card:hover {
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  }
  .profile-card-container {
      padding: 2px 16px;
      background-color: white;
      border-bottom-left-radius: 10px;
      border-bottom-right-radius: 10px;
  }

  /* Container holding the image and the text */
  .containerTextMessage {
    position: relative;
    color: white;
    padding: 0.5em;
  }
  .containerTextMessage .chat-body p {
    margin: 0;
    color: #777777;
  }
  .glyphicon, .chat .glyphicon {
    margin-right: 5px;
  }

  /* CSS for chatbox and messages */
  .popup-box {
    background-color: #ffffff;
    border: 1px solid #b0b0b0;
    bottom: 0;
    display: none;
    height: 415px;
    position: fixed;
    right: 70px;
    width: 300px;
    font-family: 'Open Sans', sans-serif;
  }
  .popup-box-on {
    display: block !important;
  }
  .popup-box .popup-head {
    background-color: #ffffff;
    clear: both;
    color: #7b7b7b;
    display: inline-table;
    font-size: 21px;
    padding: 7px 10px;
    width: 100%;
    font-family: Arial;
  }
  .bg_none i {
    border: 1px solid #01adff;
    border-radius: 25px;
    color: #01b6ff;
    font-size: 17px;
    height: 33px;
    line-height: 30px;
    width: 33px;
  }
  .bg_none:hover i {
    border: 1px solid #000;
    border-radius: 25px;
    color: #000;
    font-size: 17px;
    height: 33px;
    line-height: 30px;
    width: 33px;
  }
  .closePopUp:hover {
    color: red;
  }
  .bg_none {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
  }
  .popup-box .popup-head .popup-head-right {
    margin: 11px 7px 0;
  }
  .popup-box .popup-messages {}
  .popup-head-left img {
    border: 1px solid #7b7b7b;
    border-radius: 50%;
    width: 44px;
  }
  .popup-messages-footer > textarea {
    border-bottom: 1px solid #b2b2b2 !important;
    height: 34px !important;
    margin: 7px;
    padding: 5px !important;
     border: medium none;
    width: 95% !important;
  }
  .popup-messages-footer {
    background: #fff none repeat scroll 0 0;
    bottom: 0;
    position: absolute;
    width: 100%;
  }
  .popup-messages-footer .btn-footer {
    overflow: hidden;
    padding: 2px 5px 10px 6px;
    width: 100%;
  }
  .popup-box .popup-messages {
    background: #ffffff none repeat scroll 0 0;
    height: 275px;
    overflow: auto;
  }
  .direct-chat-messages {
    overflow: auto;
    padding: 10px;
    transform: translate(0px, 0px);
  }
  .popup-head-right .btn-group {
    display: inline-flex;
    margin: 0 8px 0 0;
    vertical-align: top !important;
  }
  .chat-header-button {
    background: transparent none repeat scroll 0 0;
    border: 1px solid #636364;
    border-radius: 50%;
    font-size: 14px;
    height: 30px;
    width: 30px;
  }
  .popup-head-right .btn-group .dropdown-menu {
    border: medium none;
    min-width: 122px;
    padding: 0;
  }
  .popup-head-right .btn-group .dropdown-menu li a {
    font-size: 12px;
    padding: 3px 10px;
    color: #303030;
  }
  .popup-messages .direct-chat-messages {
    height: auto;
  }
  .popup-messages::after {
    background: transparent none repeat scroll 0 0 !important;
    bottom: 0;
    content: "";
    left: 17px;
    margin: 0;
    position: absolute;
    top: 0;
    width: 2px;
    display: inline;
	  z-index: -2;
  }

  /* Messaging bubbles v.2*/
  .incoming_msg_img {
    display: inline-block;
    width: 8%;
  }
  .outgoing_msg_img {
    display: inline-block;
    width: 8%;
  }
  .received_msg {
    display: inline-block;
    padding: 0 0 0 0;
    vertical-align: top;
    width: 100%;
  }
  .received_withd_msg p {
    background: #ebebeb none repeat scroll 0 0;
    border-radius: 3px;
    color: #646464;
    font-size: 14px;
    margin: 0;
    padding: 5px 10px 5px 12px;
    width: 100%;
  }
  .time_date {
    color: #747474;
    display: block;
    font-size: 12px;
    margin: 8px 0 0;
  }
  .received_withd_msg {
    width: 85%;
  }
  .mesgs {
    /*float: left;*/
    padding: 15px 10px 15px 10px;
    width: 100%;
  }
  .sent_msg p {
    background: #05728f none repeat scroll 0 0;
    border-radius: 3px;
    font-size: 14px;
    margin: 0; color:#fff;
    padding: 5px 10px 5px 12px;
    width:100%;
  }
  .outgoing_msg {
    overflow: hidden;
    margin: 26px 0 26px;
  }
  .sent_msg {
    float: right;
    width: 75%;
  }
  .input_msg_write input {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    color: #4c4c4c;
    font-size: 15px;
    min-height: 48px;
    width: 100%;
  }
  .type_msg {
    border-top: 1px solid #c4c4c4;
    position: relative;
  }
  .msg_send_btn {
    background: #05728f none repeat scroll 0 0;
    border: medium none;
    border-radius: 50%;
    color: #fff;
    cursor: pointer;
    font-size: 17px;
    height: 33px;
    position: absolute;
    right: 0;
    top: 11px;
    width: 33px;
  }
  .messaging {
    padding: 0 0 50px 0;
  }
  .msg_history {
    height: 516px;
    overflow-y: auto;
  }

  /* Transparent Scrollbar */
  ::-webkit-scrollbar {
    width:0px;
  }
  ::-webkit-scrollbar-track-piece {
    background-color:transparent;
  }


</style>
<body>
<header>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <?php
          $image_show = $row['picture'];
          echo '<img class="pull-left img-circle" style="height: 35px; width: 35px;" src="data:image;base64,'.base64_encode($image_show).'" />';
        ?>
        <a class="navbar-brand" href="#">MingleMeet</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <form class="navbar-form navbar-left">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div><!-- /input-group -->
        </form>
        <ul class="nav navbar-nav navbar-right">
          <!--<li><a href="#">Link</a></li>-->
          <!--<li><a href="#" class="btn btn-default" style="margin: 0.5em 0.5em; padding: 0.5em 0.5em;" >Edit Profile</a></li>-->
          <!--<li><a href="#" class="btn btn-default pull-right edit" style="margin: 0.5em 0.5em" type="submit">Edit Profile</a></li>-->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello, <?php echo $userob->getLoggedin($_SESSION['username'], $con) ?><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Edit Profile</a></li>
              <li><a href="logout.php">Log Out</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</header>

<section class="row profile-header"></section>

<div class="container" style="background-color: white; padding-bottom: 0em">
  <section class="profile-settings">
  <!--<img class="bubbleface img-circle img-responsive" src="" />-->
  <?php
    $image_show = $row['picture'];
    echo '<img class="bubbleface img-circle img-responsive" src="data:image;base64,'.base64_encode($image_show).'" />';
  ?>
    <div class="clearfix"></div>
      <div class="details">
        <h1><?php echo "@".$row['username']; ?></h1>
        <h2><?php echo $row['first_name']." ".$row['last_name']; ?></h2>
        <h3><?php echo $row['usa_city'].", ".$row['usa_state']; ?></h3>
        <h4><?php echo $row['gender'].", ".$row['user_age']; ?></h4>
        <div class="clearfix"></div>
      </div>
  </section>

  <section class="description">
    <div class="profile-description row">
      <p><?php echo $row['about_me']; ?></p>
    </div>
  </section>

  <div class="row profile-header" style="height:35px"> </div>
  <section>
    <article class="col-sm-12">
      <div class="bulletin">

        <nav class="bulletin-top-nav">
          <ul class="nav nav-pills" role="tablist">
            <li role="presentation" class="active"><a href="#homeScreenPage" aria-control="homeScreenPage" data-toggle="pill" id="viewHomeScreenPage">Home<span class="badge">2</span></a></li>
            <li role="presentation"><a href="#messagesPage" aria-control="messagesPage" data-toggle="pill" id="viewMessagesPage">Messages<span class="badge">3</span></a></li>
            <li role="presentation"><a href="#matchesPage" aria-control="matchesPage" data-toggle="pill" id="viewMatchesPage">Matches<span class="badge">3</span></a></li>
          </ul>
        </nav>


        <div class="tab-content">
        <div role="tabpanel" class="tab-pane active container-fluid bulletin-content" style="" id="homeScreenPage">
        <div class="">

        <?php


            $result = $userob->getOtherUsers($username, $con);

            if ($result->num_rows > 0) {
              // output data of each row
              while($rowOther = $result->fetch_assoc()) {


                    $rowOtherId = $rowOther["username"] ;
                    $rowOtherAboutme = $rowOther["about_me"] ;
                    $rowOtherFirst = $rowOther["first_name"] ;
                    $rowOtherLast = $rowOther["last_name"] ;
                    $rowOtherGender = $rowOther["gender"] ;
                    $rowOtherPicture = $rowOther["picture"] ;
                    $rowOtherAge = $rowOther["user_age"] ;
                    $rowOtherCity = $rowOther["usa_city"] ;
                    $rowOtherState = $rowOther["usa_state"] ;



        echo '<div class="col-lg-4 col-md-6 col-sm-6">
                <div class="profile-card">
                  <a href="#" data-toggle="modal" data-target="#myInfo-'.$rowOtherId.'">
                    <img ' . 'src="data:image;base64,'.base64_encode($rowOtherPicture). '" alt="Avatar" style="width: 100%;">
                  </a>

                  <div class="profile-card-container">
                    <h4><b>' . $rowOtherFirst . ' ' . $rowOtherLast . '</b>, ' . $rowOtherAge . '</h4>
                    <p>'.$rowOtherCity.', '.$rowOtherState.'</p>
                    <div class="profile-card-action-buttons">
                      <a href=like.php?id=' . $rowOtherId. ' >
                        <img src="images/icon-heart(blackNwhite).png" alt="Like Icon" />
                        Like
                      </a>
                      <a  . ">
                      <a href="#" class="messagesBoxPopUp">
                        <img src="images/icon-message.png" alt="Message Icon" />
                        Message
                      </a>
                      <a href="#" data-toggle="modal" data-target="#reportUser-'.$rowOtherId.'">
                        <img src="images/icon-alert.png" alt="Report Icon" />
                        Report
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- My Info Modal -->
              <div class="modal fade" id="myInfo-'.$rowOtherId.'" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">
                          <img class="img-circle pull-left" style="height: 35px; width: 35px; margin-right: 0.5em;" src="data:image;base64,'.base64_encode($rowOtherPicture).'" />
                          My Stats (lol):
                        </h4>
                      </div>
                      <div class="modal-body">
                      <p>
                        <strong>Fullname: </strong>'.$rowOtherFirst.' '.$rowOtherLast.'
                      </p>
                      <p>
                        <strong>USA Location: </strong>'.$rowOtherCity.', '.$rowOtherState.'
                      </p>
                      <p>
                        <strong>Age: </strong>'.$rowOtherAge.'
                      </p>
                      <p>
                        <strong>Gender: </strong>'.$rowOtherGender.'
                      </p>
                      <p>
                        <strong>About Me: </strong>'.$rowOtherAboutme.'
                      </p>
                      </div>
                      <!--
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                      -->
                    </div>
                </div>
              </div>
              <!-- Report User Modal -->
              <div>
              <div class="modal fade" id="reportUser-'.$rowOtherId.'" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">
                          <img class="img-circle pull-left" style="height: 35px; width: 35px; margin-right: 0.5em;" src="data:image;base64,'.base64_encode($rowOtherPicture).'" />
                          <strong>Report the following User: </strong>'.$rowOtherFirst.' '.$rowOtherLast.'
                        </h4>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Type the reason why you want to report: </label>
                          <input type="text" placeholder="Enter report cause" name="userID" class="form-control">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
                      </div>
                    </div>
                </div>
              </div>
              </div>' ;

              }
            } else {
                echo "0 results";
            }
            ?>
     </div>
     </div>

      <!-- HTML code for messages tab -->
        <div role="tabpanel" class="tab-pane container-fluid bulletin-content" style="" id="messagesPage">
          <div class="row">

            <div class="bulletin-card">
              <div class="media">
                <div class="media-left">
                  <a href="#" class="messagesBoxPopUp">
                    <img class="media-object img-circle user-img" src="images/Jessica-Jones.jpg" alt="Message Recipient Img">
                  </a>
                </div>
                <div class="media-body">
                  <div class="containerTextMessage" style="width: auto; height:100px;">
                    <div class="chat-body clearfix">
                      <div class="header">
                        <small class="text-muted pull-right"><span class="glyphicon glyphicon-time"></span>11/29/18 9:28 AM</small>
                        <strong class="pull-left" style="color: black">Jessica Jones</strong>
                      </div>
                      <span class="clearfix"></span>
                      <p>
                        <strong>You sent: </strong>I know
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <span class="clearfix"></span>
            </div>

            <div class="bulletin-card">
              <div class="media">
                <div class="media-left">
                  <a href="#" class="messagesBoxPopUp">
                    <img class="media-object img-circle user-img" src="images/Amber-Heard.jpg" alt="Message Recipient Img">
                  </a>
                </div>
                <div class="media-body">
                  <div class="containerTextMessage" style="width: auto; height:100px;">
                    <div class="chat-body clearfix">
                      <div class="header">
                        <small class="text-muted pull-right"><span class="glyphicon glyphicon-time"></span>11/08/18 12:16 PM</small>
                        <strong class="pull-left" style="color: black">Amber Heard</strong>
                      </div>
                      <span class="clearfix"></span>
                      <p>
                        <strong>You sent: </strong>Are you in that new Aquamam movie?
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <span class="clearfix"></span>
            </div>

            <div class="bulletin-card">
              <div class="media">
                <div class="media-left">
                  <a href="#" class="messagesBoxPopUp">
                    <img class="media-object img-circle user-img" src="images/Bad-Luck-Brian.jpeg" alt="Message Recipient Img">
                  </a>
                </div>
                <div class="media-body">
                  <div class="containerTextMessage" style="width: auto; height:100px;">
                    <div class="chat-body clearfix">
                      <div class="header">
                        <small class="text-muted pull-right"><span class="glyphicon glyphicon-time"></span>11/07/18 06:14 PM</small>
                        <strong class="pull-left" style="color: black">Brian McLovin</strong>
                      </div>
                      <span class="clearfix"></span>
                      <p>
                        <strong>They sent: </strong>You are my type of preference!
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <span class="clearfix"></span>
            </div>

          </div>
        </div>

        <!-- HTML code for matches tab -->
        <div role="tabpanel" class="tab-pane container-fluid bulletin-content" style="" id="matchesPage">
          <div class="row">

            <?php

            $matchesOb = new matches();

            $result = $matchesOb->getMatchDetails($username, $con);

            if ($result->num_rows > 0) {
                // output data of each row
                while($rowMatch = $result->fetch_assoc()) {


                    $matchUserId = $rowMatch["user2_ID"] ;
                    $matchTime = $rowMatch["date_time"] ;
                    $matchStatus = $rowMatch["match_status"] ;
                    $matchStatusText = "" ;
                    $matchUserRow = $userob->getUserDetails($matchUserId, $con);



                   switch ($matchStatus) {
                        case 0:
                            $matchStatusText = "Not Matched" ;
                            break;
                        case 1:
                            $matchStatusText = "Pending" ;
                            break;
                        case 2:
                            $matchStatusText = "Matched" ;
                            break;
                    }
                 $match_image = $matchUserRow['picture'];



             echo '<div class="bulletin-card">
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object img-circle user-img responsive-img" '.'src="data:image;base64,'.base64_encode($match_image).'" alt="Message Recipient Img">
                  </a>
                </div>
                <div class="media-body">
                  <div class="containerTextMessage" style="width: auto; height:100px; overflow-y: auto;">
                    <div class="chat-body clearfix">
                      <div class="header">
                        <small class="text-muted pull-right"> Date liked: '.$matchTime.'</small>
                        <strong class="pull-left" style="color: black">' .$matchUserRow["first_name"]. ' ' . $matchUserRow["last_name"] . '</strong>
                      </div>
                      <span class="clearfix"></span>
                      <p>
                        <strong>Gender: </strong>'.$matchUserRow["gender"].'
                      </p>
                      <p>
                        <strong>Match Status: </strong>'.$matchStatusText.'
                      </p>
                      <div class="profile-card-action-buttons">
                        <a href="#">
                          <img src="images/icon-heart-red.png" alt="Unlike Icon" />
                          Unlike
                        </a>
                        <a href="#" class="messagesBoxPopUp">
                          <img src="images/icon-message.png" alt="Message Icon" />
                          Message
                        </a>
                        <a href="#">
                          <img src="images/icon-alert.png" alt="Report Icon" />
                          Report
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <span class="clearfix"></span>
            </div>' ;

               }

            } else {
                echo "3 results";
            }
            ?>


            <div class="bulletin-card">
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object img-circle user-img responsive-img" src="images/Jessica-Jones.jpg" alt="Message Recipient Img">
                  </a>
                </div>
                <div class="media-body">
                  <div class="containerTextMessage" style="width: auto; height:100px; overflow-y: auto;">
                    <div class="chat-body clearfix">
                      <div class="header">
                        <small class="text-muted pull-right">Date liked: 11/15/18 11:00 AM</small>
                        <strong class="pull-left" style="color: black">Jessica Jones</strong>
                      </div>
                      <span class="clearfix"></span>
                      <p>
                        <strong>Gender: </strong> Female
                      </p>
                      <p>
                        <strong>Match Status: </strong> Not Matched (Waiting on your response!)
                      </p>
                      <div class="profile-card-action-buttons">
                        <a href="#">
                          <img src="images/icon-heart(blackNwhite).png" alt="Unlike Icon" />
                          Like
                        </a>
                        <a href="#" class="messagesBoxPopUp">
                          <img src="images/icon-message.png" alt="Message Icon" />
                          Message
                        </a>
                        <a href="#">
                          <img src="images/icon-alert.png" alt="Report Icon" />
                          Report
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <span class="clearfix"></span>
            </div>

            <div class="bulletin-card">
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object img-circle user-img responsive-img" src="images/Amber-Heard.jpg" alt="Message Recipient Img">
                  </a>
                </div>
                <div class="media-body">
                  <div class="containerTextMessage" style="width: auto; height:100px; overflow-y: auto;">
                    <div class="chat-body clearfix">
                      <div class="header">
                        <small class="text-muted pull-right">Date liked: 11/08/18 12:07 PM</small>
                        <strong class="pull-left" style="color: black">Amber Heard</strong>
                      </div>
                      <span class="clearfix"></span>
                      <p>
                        <strong>Gender: </strong> Female
                      </p>
                      <p>
                        <strong>Match Status: </strong> Not Matched (Waiting on their response!)
                      </p>
                      <div class="profile-card-action-buttons">
                        <a href="#">
                          <img src="images/icon-heart-red.png" alt="Unlike Icon" />
                          Unlike
                        </a>
                        <a href="#" class="messagesBoxPopUp">
                          <img src="images/icon-message.png" alt="Message Icon" />
                          Message
                        </a>
                        <a href="#">
                          <img src="images/icon-alert.png" alt="Report Icon" />
                          Report
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <span class="clearfix"></span>
            </div>

            <div class="bulletin-card">
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object img-circle user-img responsive-img" src="images/Bad-Luck-Brian.jpeg" alt="Message Recipient Img">
                  </a>
                </div>
                <div class="media-body">
                  <div class="containerTextMessage" style="width: auto; height:100px; overflow-y: auto;">
                    <div class="chat-body clearfix">
                      <div class="header">
                        <small class="text-muted pull-right">Date liked: 11/07/18 06:15 PM</small>
                        <strong class="pull-left" style="color: black">Brian McLovin</strong>
                      </div>
                      <span class="clearfix"></span>
                      <p>
                        <strong>Gender: </strong> Male
                      </p>
                      <p>
                        <strong>Match Status: </strong> Matched
                      </p>
                      <div class="profile-card-action-buttons">
                        <a href="#">
                          <img src="images/icon-heart-red.png" alt="Unlike Icon" />
                          Unlike
                        </a>
                        <a href="#" class="messagesBoxPopUp">
                          <img src="images/icon-message.png" alt="Message Icon" />
                          Message
                        </a>
                        <a href="#">
                          <img src="images/icon-alert.png" alt="Report Icon" />
                          Report
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <span class="clearfix"></span>
            </div>

          </div>
        </div>

      </div>

      </div>
    </article>
  </section>
</div>


<div class="container text-center">
	<div class="row profile-header" style="height: 10px;">
	</div>
</div>

<footer class="row">
  <div class="bottom">
    <p>© MingleMeet, 2018</p>
    <p><a href="#">Contact Us</a></p>
  </div>
</footer>

<!-- Message PopUp -->
<div class="popup-box chat-popup" id="nimate">
  <div class="popup-head">
		<div class="popup-head-left pull-left"><img src="images/Jessica-Jones.jpg" alt="iamjessica"> Jessica Jones</div>
			<div class="popup-head-right pull-right">
			  <div class="btn-group">
    			<button class="chat-header-button" data-toggle="dropdown" type="button" aria-expanded="false">
						<i class="glyphicon glyphicon-cog"></i>
          </button>
					<ul role="menu" class="dropdown-menu pull-right">
						<li><a href="#">Media</a></li>
						<li><a href="#">Report User</a></li>
						<li><a href="#">Clear Chat</a></li>
					</ul>
				</div>

				<button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button">
          <i class="glyphicon glyphicon-remove closePopUp"></i>
        </button>
      </div>
	</div>
	<div class="popup-messages">
    <div class="direct-chat-messages">
      <div class="mesgs" style="overflow-y: auto;">
          <div class="msg_history" style="height: auto;">
            <div class="incoming_msg">
              <div class="incoming_msg_img">
                <img src="images/Jessica-Jones.jpg" alt="sunil" class="img-responsive img-circle" style="float: left;" />
              </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Hey, how are you?</p>
                  <span class="time_date"> 11:01 AM    |    Nov 15</span>
                </div>
              </div>
            </div>
            <div class="outgoing_msg">
              <div class="outgoing_msg_img" style="float: right; padding-bottom: 4px;">
                <?php
                  $image_show = $row['picture'];
                  echo '<img class="img-circle img-responsive" src="data:image;base64,'.base64_encode($image_show).'" />';
                ?>
              </div>
              <div class="sent_msg" style="clear: both">
                <p>Nice to meet you, did you check my profile out?</p>
                <span class="time_date"> 11:01 AM    |    Nov 15</span> </div>
            </div>
            <div class="incoming_msg">
              <div class="incoming_msg_img">
                <img src="images/Jessica-Jones.jpg" alt="sunil" class="img-responsive img-circle" style="float: left;" />
              </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Yes, I did. I liked what I saw</p>
                  <span class="time_date"> 10:02 PM    |    Nov 15</span></div>
              </div>
            </div>
            <div class="outgoing_msg">
              <div class="outgoing_msg_img" style="float: right; padding-bottom: 4px;">
                <?php
                  $image_show = $row['picture'];
                  echo '<img class="img-circle img-responsive" src="data:image;base64,'.base64_encode($image_show).'" />';
                ?>
              </div>
              <div class="sent_msg" style="clear: both">
                <p>Thank you very much. I like turtles.</p>
                <span class="time_date"> 09:06 AM    |    Nov 16</span> </div>
            </div>
            <div class="incoming_msg">
              <div class="incoming_msg_img">
                <img src="images/Jessica-Jones.jpg" alt="sunil" class="img-responsive img-circle" style="float: left;">
              </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>You are really funny. Did you know that?</p>
                  <span class="time_date"> 11:01 AM    |    Nov 16</span></div>
              </div>
            </div>
            <div class="outgoing_msg">
              <div class="outgoing_msg_img" style="float: right; padding-bottom: 4px;">
                <?php
                  $image_show = $row['picture'];
                  echo '<img class="img-circle img-responsive" src="data:image;base64,'.base64_encode($image_show).'" />';
                ?>
              </div>
              <div class="sent_msg" style="clear: both">
                <p>I know</p>
                <span class="time_date"> 09:28 AM    |    Today</span> </div>
            </div>
          </div>
        </div>
      <!-- /.direct-chat-messages -->
    </div>
  </div>
	<div class="popup-messages-footer">
    <textarea id="messageTextContent" class="form-control" placeholder="Type a message..." rows="10" cols="40" name="message"></textarea>
    <div class="btn-footer">
			<button class="bg_none"><i class="glyphicon glyphicon-film"></i> </button>
			<button class="bg_none"><i class="glyphicon glyphicon-camera"></i> </button>
      <button class="bg_none"><i class="glyphicon glyphicon-paperclip"></i> </button>
			<button class="bg_none pull-right" id="sendMessageButton"><i class="glyphicon glyphicon-send"></i> </button>
    </div>
    <!--
    <div class="type_msg">
      <div class="input_msg_write">
        <input type="text" class="write_msg" placeholder="Type a message..." />
        <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
      </div>
    </div>
  -->
  </div>

</div>


<!--JavaScript Link-->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script>
  $('#myTabs a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
  });

  /*
  // Dynamic Messages
  $('#sendMessageButton').click(function(e){
    var messageContent = $('#messageTextContent').val();

    if($.trim(messageContent)==""){
      $('.error').html("please enter something to send");
    }
    else{
      $.ajax({
        method: "POST",
        url: "includes/functions.php",
        data: {messageContent: messageContent, option: "messageforuser"}
      }).done(function(msg){
        var message = msg.split("-");

      })
    }
  });
  */


  $(function(){
    $(".messagesBoxPopUp").click(function () {
      $('#nimate').addClass('popup-box-on');
    });

    $("#removeClass").click(function () {
      $('#nimate').removeClass('popup-box-on');
    });
  });

</script>
</body>
</html>
<?php
}
else{
  header("Location:login.php");
}

?>
