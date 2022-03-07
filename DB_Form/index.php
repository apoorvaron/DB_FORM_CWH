<?php 
    include('./environment.php');
$insert=false;
if(isset($_POST['name'])){
        $server = $env_server;
        $username = $env_username;
        $password = $env_password;
        $database = $env_database;
        $port = $env_port;
        
        $conn = mysqli_connect($server,$username,$password);

        if(!$conn){
            die("Connection to DB failed!!".mysqli_connect_error());
        }
        // echo "Sucess Connecting to DB";

        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $desc = $_POST['desc'];


        $sql = "    INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name ', '$age', '$gender', '$email', '$phone', '$desc', CURRENT_TIMESTAMP());";
        // echo $sql;

        if($conn->query($sql)==true){
            // echo "Sucessfully Inserted!!";
            $insert=true;
        }else {
            echo "ERROR: $sql <br> $conn->error";
        }

        $conn->close();
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <img class="bg" src="./USICT.webp" alt="">
    <div class="container">
        <h1>Welcome to IIT kharagpur US Trip FOrm.</h1>
        <p>Enter your Details and Submit this Form to confirm your [articipation in the Trip.</p>
        <br>
        <?php
        if(insert==true){

            // echo "<p class='submitMSZ'>Thanks For submitting the form.</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="sex" id="sex" placeholder="Enter your Gender">
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone Number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter Any other information you want to provide"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    
    <script src="./index.js"></script>


</body>
</html>
