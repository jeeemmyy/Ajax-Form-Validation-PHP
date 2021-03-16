<html>
    <head>
        <title>Advanced Validation AJAX</title>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="styles.css">
        <script>
            $(document).ready(function(){
                $("#mailForm").submit(function(event){
                    event.preventDefault();

                    var name = $("#nameInput").val();
                    var email = $("#emailInput").val();
                    var gender = $("#genderSelect").val();
                    var message = $("#message").val();
                    var submit = $("#submitButton").val();

                    $(".form-message").load("mail.php", {
                        name: name,
                        email: email,
                        gender: gender,
                        message: message,
                        submit: submit
                    });
                });
            });
        </script>
    </head>
    <body>
        <form id="mailForm" action="mail.php" method="POST">
            <input id="nameInput" class="allFormInputs" type="text" name="name" placeholder="Full Name">
            <br>
            <input id="emailInput" class="allFormInputs" type="text" name="email" placeholder="E-mail">
            <br>
            <select class="allFormInputs" name="Gender" id="genderSelect">
                <option value="Male">Male</option>
                <option value="Male">Female</option>
            </select>
            <br>
            <textarea class="allFormInputs" name="message" placeholder="Message" id="message" cols="30" rows="10"></textarea>
            <br>
            <button class="allFormInputs" id="submitButton" type="submit">Send E-mail</button>
            <p class="form-message"></p>
        </form>
    </body>
</html>