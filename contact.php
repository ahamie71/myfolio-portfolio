<?php
if (isset($_POST['register'])) {

    if (isset($_POST['name']) && $_POST['email'] && $_POST['message']) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $db = new PDO('mysql:host=localhost;dbname=portfeuille;charset=utf8', 'root', 'root');
        $req = $db->prepare("INSERT INTO user (name,email,message) VALUES (:name,:email,:message)");
        $req->execute(
            array(
                ':name' => $name,
                ':email' => $email,
                ':message' => $message,
            )

        );

        if ($req) {
            header('location:contact.php?success=1');
        } else {
            header('location:contact.php?success=2');
        }
    }
}

if (isset($_GET['success'])) {
    switch ($_GET['success']) {
        case 1:
            $message = "Votre message a été bien reçu";
            break;
        case 2:
            $message = "Votre message n'a pas été reçu";
            break;
    }
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong></strong>' . $message . '
        
        </div>';
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container py-4">

        <!-- Bootstrap 5 starter form -->
        <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="contact.php" method="post">

            <!-- Name input -->
            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" id="name" type="text" placeholder="Name" data-sb-validations="required"
                    name="name" />
                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
            </div>

            <!-- Email address input -->
            <div class="mb-3">
                <label class="form-label" for="emailAddress">Email Address</label>
                <input class="form-control" id="emailAddress" type="email" placeholder="Email Address"
                    data-sb-validations="required, email" name="email" />
                <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.</div>
                <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is not valid.
                </div>
            </div>

            <!-- Message input -->
            <div class="mb-3">
                <label class="form-label" for="message">Message</label>
                <textarea class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;"
                    data-sb-validations="required" name="message"></textarea>
                <div class="invalid-feedback" data-sb-feedback="message:required">Message is required.</div>
            </div>

            <!-- Form submissions success message -->
           
           

            <!-- Form submit button -->
            <div class="d-grid">
                <button class="btn btn-primary " id="submitButton" type="submit"
                    name="register">Submit</button>
            </div>

        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <!-- SB Forms JS -->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>