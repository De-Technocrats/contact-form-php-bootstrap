<?php

if (!isset($_SESSION['errors']) || count($_SESSION['errors']) == 0) {
    $_SESSION['errors'] = array();
}

if (isset($_POST['sendMessageBtn'])) {

    if (empty($_POST['name'])) {
        array_push($_SESSION['errors'], 'Name is Required');
    } else {
        $name = $_POST['name'];
    }

    if (empty($_POST['email'])) {
        array_push($_SESSION['errors'], 'Email is Required');
    } else {
        $email = $_POST['email'];
    }

    if (empty($_POST['subject'])) {
        array_push($_SESSION['errors'], 'Subject is Required');
    } else {
        $subject = $_POST['subject'];
    }

    if (empty($_POST['message'])) {
        array_push($_SESSION['errors'], 'Message is Required');
    } else {
        $message = $_POST['message'];
    }

    if(empty($_POST['myEmail'])){
        array_push($_SESSION['errors'], 'Receiving Message Email is Required');
    }else{
        $myEmail = $_POST['myEmail'];
    }

    if(!isset($_SESSION['errors']) || count($_SESSION['errors']) == 0){
        $to = $myEmail;

           if(mail($to,$subject,$message,$email))
           {
            $_SESSION['successMessage'] = "Message Sent Successfully";
           }else{
            array_push($_SESSION['errors'], 'Mail Error. Contact to your hosting provider.');
           }
        // $data = "Name: $name <br> Email: $email <br> Subject: $subject <br> Message: $message <br>";
        // echo $data;
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>

    <main>
        <div class="container">
        <form action="form.php" method="post">
            <div class="row mt-4 mb-2">
                <h2>Contact Form</h2>
                <p>Admin will receive this message via Email</p>
                <div class="mb-3">
                  <label for="myEmail" class="form-label">Enter Your Receiving Message Email</label>
                  <input type="text"
                    class="form-control" name="myEmail" id="myEmail" aria-describedby="helpId" placeholder="Receiving Message Email">
                </div>
            </div>
            <div class="container mt-4 mb-4" id="contactform">
                <?php
                if (isset($_SESSION['errors'])) {
                    $errors = $_SESSION['errors'];
                    foreach ($errors as  $error) {
                ?>
                        <div class="alert alert-danger">
                            <?php echo $error; ?>
                        </div>
                <?php
                    }
                    unset($_SESSION['errors']);
                }
                if(isset($_SESSION['successMessage'])){
                    ?>
                    <div class="alert alert-success">
                            <?php echo $_SESSION['successMessage']; ?>
                        </div>
                    <?php
                }
                ?>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-12 m-auto">

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" aria-describedby="helpId" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email" aria-describedby="helpId" required>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Write Subject" aria-describedby="helpId" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Message</label>
                                <textarea class="form-control" name="message" id="message" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="sendMessageBtn" id="sendMessageBtn" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
