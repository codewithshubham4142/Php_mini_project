<?php
// bydefault insert is false
$insert = false;
if(isset($_POST['name'])){
$server = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'travel';

$port = 3306;
$con = mysqli_connect($server, $username, $password, $database, $port);

// if not connect database 
if(!$con){
    die("Connection to this database failed due to ".mysqli_connect_error());
}

// connection variable
$name = $_POST['name'] ;
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];
// to insert value in DB
$sql = "INSERT INTO `travel`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `date and time`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";


// if query insert successfully then insert variable are true and display message "Thanks for submitting form"
if ($con->query($sql) == true) {
    // echo "Successfully inserted";
    $insert =true;
} else {
    echo "Error: $sql <br> $con->error";
}
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Travel form</title>
   
    
</head>
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.container{
    max-width: 80%;
    background-color: purple;
    padding: 34px;
    margin: auto;
}

.container h1, p {
    text-align: center;
}
p{
    font-size: 15px;
   
}
.submit-form{

    font-size: 15px;
    color: rgb(39, 189, 9);
}
form{
   display: flex;
   flex-direction: column;
   justify-content: center;
   align-items: center;
}
input,textarea{
  display: block;
    width: 80%;
    margin: 11px auto;
    padding: 7px;
    font-size: 20px;
    border: 2px solid black;
    border-radius: 5px;
    outline: none;
}
.btn{
    color: white;
    background-color: purple;
    padding: 8px 12px;
    border:  2px solid white;
    border-radius: 15px;
    cursor: pointer;
}
</style>

<body>
    <div class="container">
        <h1>Welcome to Delhi Trip</h1>
        <p>Enter your details and submit your form to confirm your participation in the trip</p>
        <?php
        if ($insert == true ) {
            echo  "<p class='submit-form'>Thanks for submitting to form </p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder='Enter Any Suggestion'>

            </textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->

        </form>
    </div>

</body>

</html>


<!-- INSERT INTO `trip` (`sr_no`, `name`, `age`, `gender`, `email`, `phone`, `other`, `date and time`) VALUES ('1', 'text name', '22', 'male', 'examole@gmail.com', '1234567891', 'this is testing ', current_timestamp()); -->


