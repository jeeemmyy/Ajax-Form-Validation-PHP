<?php

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $message = $_POST['message'];

        $errorEmpty = false;
        $errorEmail = false;
        $errorEmailExists = false;

        if(empty($name) || empty($email) || empty($gender) || empty($message)){
            echo "<span class='formError'>Fill in all fields!</span>";
            $errorEmpty = true;
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<span class='formError'>Not a valid email!</span>";
            $errorEmail = true;
        }
        else{
            $serverName = "localhost";
            $username = "root";
            $password = "";
            $dbName = "ajax";

            $conn = mysqli_connect($serverName, $username, $password, $dbName);
            $query = "SELECT * FROM validatedUsers WHERE email='$email'";

            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result) > 0){
                echo "<span class='formError'>E-MAIL already exists</span>";
                $errorEmailExists = true;
            }
            else{
                $query = "INSERT INTO validatedUsers (full_name, email, gender, sent_message) VALUES ('$name','$email','$gender','$message')";
                $result = mysqli_query($conn, $query);

                echo "<span class='formSuccess'>E-mail has been sent!</span>";
            }
        }
    }
    else{
        echo "<span class='formError'>There was an error</span>";
    }
?>

<script>
    $("#nameInput, #emailInput, #gender, #message").removeClass("inputError");
    var errorEmpty = "<?php echo $errorEmpty?>";
    var errorEmail = "<?php echo $errorEmail?>";
    var errorEmailExists = "<?php echo $errorEmailExists?>";

    if(errorEmpty == true){
        $("#nameInput, #emailInput, #message").addClass("inputError");
    }
    if(errorEmail == true){
        $("#emailInput").addClass("inputError");
    }
    if(errorEmailExists == true){
        $("#emailInput").addClass("inputError");
    }
    if(errorEmail == false && errorEmpty == false && errorEmailExists == false){
        $("#nameInput, #emailInput, #message").val("");
    }
</script>