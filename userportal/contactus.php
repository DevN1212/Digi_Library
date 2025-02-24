<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "lms");
$name = "";
$email = "";
$mobile = "";
$query = "select * from users where email = '$_SESSION[email]'";
$query_run = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
    $rollno = $row['rollno'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $profile_image = $row['image'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | LMS</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="../bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Google Fonts Import Link */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: url("../user images/library5.jpg");
            backdrop-filter: blur(7px);
            background-size: cover;
            overflow: hidden;
        }

        .home-section {
            position: relative;
            height: 100vh;
            left: 260px;
            width: calc(100% - 260px);
            transition: all 0.5s ease;
            padding: 12px;
            overflow-x: hidden;
        }

        .heading {
            border: 2px solid white;
            backdrop-filter: blur(5px);
            margin: 0px;
            border-radius: 10px;
        }

        .heading h2 {
            text-align: center;
            font-weight: 600;
            color: white;
        }

        .container {
            margin-top: 50px;
            max-width: 1100px;
            width: 100%;
            background: #fff;
            opacity: 0.9;
            border-radius: 6px;
            padding: 20px 60px 30px 40px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }

        .container .content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .container .content .left-side {
            width: 40%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 0px;
            position: relative;
        }

        .content .left-side::before {
            content: "";
            position: absolute;
            height: 70%;
            width: 2px;
            right: -15px;
            top: 50%;
            transform: translateY(-50%);
            background: #afafb6;
        }

        .content .left-side .details {
            margin: 14px;
            text-align: center;
        }

        .content .left-side .details i {
            font-size: 30px;
            color: #3e2093;
            margin-bottom: 10px;
        }

        .content .left-side .details .topic {
            font-size: 18px;
            font-weight: 500;
            color: black;
        }

        .content .left-side .details .text-one,
        .content .left-side .details {
            font-size: 14px;
            color: gray;
        }

        .container .content .right-side {
            width: 75%;
            margin-left: 75px;
        }

        .content .right-side .topic-text {
            font-size: 23px;
            font-weight: 600;
            color: #3e2093;
        }

        .right-side .input-box {
            height: 55px;
            width: 100%;
            margin: 12px 0;
        }

        .right-side .input-box input,
        .right-side .input-box textarea {
            height: 100%;
            width: 100%;
            border: none;
            outline: none;
            font-size: 16px;
            background: #f0f1f8;
            border-radius: 6px;
            padding: 0 15px;
            resize: none;
        }

        .right-side .message-box {
            min-height: 110px;
        }

        .right-side .input-box textarea {
            padding-top: 6px;
        }

        .right-side .button {
            display: inline-block;
            margin-top: 12px;
        }

        .right-side .button input[type="submit"] {
            color: #fff;
            font-size: 18px;
            outline: none;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            background: #3e2093;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .button input[type="submit"]:hover {
            background: #5029bc;
        }

        .left-side {

            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
            position: relative;
        }

        .left-side iframe {
            width: 100%;
            height: 300px;
            margin-bottom: 20px;
        }

        @media (max-width: 950px) {
            .container {
                width: 90%;
                padding: 30px 40px 40px 35px;
            }

            .container .content .right-side {
                width: 75%;
                margin-left: 55px;
            }
        }

        @media (max-width: 820px) {
            .container {
                margin: 40px 0;
                height: 100%;
            }

            .container .content {
                flex-direction: column-reverse;
            }

            .container .content .left-side {
                width: 100%;
                flex-direction: row;
                margin-top: 40px;
                justify-content: center;
                flex-wrap: wrap;
            }

            .container .content .left-side::before {
                display: none;
            }

            .container .content .right-side {
                width: 100%;
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <?php include "./sidebar.php" ?>
    <section class="home-section">
        <div class="heading">
            <h2>Contact Us</h2>
        </div>
        <div class="container">
            <div class="content">
                <div class="left-side">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3668.4362652372547!2d72.66315307536152!3d23.15427227908168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e81700d0e6fef%3A0x27b450b5271012d0!2sPDEU%20F-Block%20(Translational%20Research%20Centre)!5e0!3m2!1sen!2sin!4v1713767044943!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen=""  referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="address details">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="topic">Address</div>
                        <div class="text-one">PDEU F-Block (Translational Research Centre), PDPU Rd, Raysan, Gujarat 382421</div>
                    </div>
                    <div class="phone details">
                        <i class="fas fa-phone-alt"></i>
                        <div class="topic">Phone</div>
                        <div class="text-one">+91 9727347935</div>
                        <div class="text-one">+91 7016161226</div>
                        <div class="text-one">+91 9106355730</div>
                        <div class="text-one">+91 7016327339</div>
                    </div>
                    <div class="email details">
                        <i class="fas fa-envelope"></i>
                        <div class="topic">Email</div>
                        <div class="text-one">harsh.rce22@sot.pdpu.ac.in</div>
                        <div class="text-one">haard.pce22@sot.pdpu.ac.in</div>
                        <div class="text-one">arjun.pce22@sot.pdpu.ac.in</div>
                        <div class="text-one">nikunj.vce22@sot.pdpu.ac.in</div>
                    </div>
                </div>
                <div class="right-side">
                    <div class="topic-text">Send us a message</div>
                    <p>If you have any queries, suggestions, or feedback regarding our library management system, please feel free to reach out to us.</p>
                    <form action="https://api.web3forms.com/submit" method="post">
                        <input type="hidden" name="access_key" value="791e0969-dc0a-4ccb-afd0-9a625d4d6ab1">
                        <div class="input-box">
                            <input type="text" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="input-box">
                            <input type="text" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="input-box message-box">
                            <textarea name="message" placeholder="Enter your message" required></textarea>
                        </div>
                        <div class="button">
                            <input type="submit" value="Send Message">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>


</html>