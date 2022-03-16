<?php
$insert = false;
if(isset($_POST['name'])){
    // set connectionv variable
    $server = "localhost";
    $username = "root";
    $password = "";
    // check for connection
    $con = mysqli_connect($server, $username, $password);

    if (!$con) {
        die("Connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connection to db";
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES ('$name', '$age',
    '$gender','$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;
    // execute the query
    if ($con->query($sql)== true) {
        // echo "Succsessfully Inserted";
        $insert=true;
    }else{
        echo "Error: $sql <br> $con->error";
    }
    // database close
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.webp" alt="Delhi University">
    <div class="container">
        <h1>
            Welcome to Delhi University U.S. Trip Form
        </h1>
        <p><i>Enter your details and submit this form to confirm your participation in the trip.</i> </p>
        <?php
        if($insert==true){
        echo "<p class='msg'><i>Thanks for submitting your form. We are happy to see you joining for the U.S. trip</i></p>";
    }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone Number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here..."></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>