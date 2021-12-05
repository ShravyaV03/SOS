<?php
require('connection.php');
require('functions.php');
$uid=$_SESSION['USER_ID'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SOS</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript">
    </script>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/reset.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <header role="banner">
        <div id="cd-logo">
            <a href="#0">Saviours Of Starvation</a>
        </div>

        <nav class="main-nav">
            <ul>
                <!-- inser more links here -->
                <li><a class="cd-signin" href="#0">logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- cd-user-modal -->
    <main>
        <div class="main-div">
            <div class="hea">
                <h1>Your Donations</h1>
            </div>
            <div class="cards">

                <?php
                $res=mysqli_query($con,"SELECT * FROM `donations` WHERE `donations`.`donor`='$uid'");
                while($row=mysqli_fetch_assoc($res)){
?>
                <div class="card">
                    <div class="card__image-holder">
                        <img class="card__image" src="https://source.unsplash.com/300x225/?desert" alt="desert" />
                    </div>
                    <div class="card-title">
                        <a href="#" class="toggle-info btn">
                            <span class="left"></span>
                            <span class="right"></span>
                        </a>
                        <h2>
                            <?php echo $row['title'] ?>
                            <small><?php echo $row['donor'] ?></small>
                        </h2>
                    </div>
                    <div class="card-flap flap1">
                        <div class="card-description">
                            <?php echo $row['des'] ?>
                        </div>
                        <div class="card-description">
                            Contact: <?php echo $row['contact'] ?>
                        </div>
                        <div class="card-description">
                            Location: <?php echo $row['location'] ?>
                        </div>
                        <div class="card-flap flap2">
                            <div class="card-actions">
                                <a href="#" class="btn">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- form  -->
        <div class="hea">
            <h1>Submit Your Donation</h1>
        </div>
        <form class="cf" method="POST" action="donor_submit.php">
            <div class="half left cf">
                <input type="text" id="input-name" name="title" placeholder="Title" />
                <input type="email" id="input-email" name="email" placeholder="Email address" />
                <input type="text" id="input-email" name="contact" placeholder="Contact" />
                <input type="text" id="input-subject" name="location" placeholder="Location" />
            </div>
            <div class="half right cf">
                <textarea type="text" id="input-message" name="description" placeholder="Description"></textarea>
            </div>
            <input type="submit" value="Submit" id="input-submit" />
        </form>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/card.js"></script>
</body>

</html>