<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In Page</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Icons -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Bootstrap 5.2 -->

    <link rel="stylesheet" href="resource/css/style.css">
    <!-- Main Style Sheet -->
</head>
<body style="background-color: rgba(241, 119, 38, 0.3);">
    <!-- Register Area Start -->
    <main>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-5">
                    <form action="log-in-post.php" method="POST">
                        <div class="form-content">
                            <div class="heading text-center">
                                <h3>Log in your account</h3>
                            </div>
                            <div class="form-inner">
                                <div class="mt-1">
                                    <label class="label" for="lg_email">
                                        Email <span>*</span>
                                    </label>
                                    <input class="input" type="email" id="lg_email" placeholder="Enter your email!" style="border-color: <?= (isset($_SESSION['email_err']) ? 'red' : '' ); ?>" name="email" value="<?= (isset($_SESSION['email_value']) ? $_SESSION['email_value'] : '' ); ?>">
                                    <?php if(isset($_SESSION['email_err'])) { ?>
                                        <div class="error-text">
                                            <?= $_SESSION['email_err']; ?>
                                        </div>
                                    <?php } unset($_SESSION['email_err']); ?>
                                </div>
                                <div class="p-field mt-2">
                                    <label class="label" for="form_pass">
                                        Password <span>*</span>
                                    </label>
                                    <input class="input" type="password" id="form_pass" placeholder="Enter your password!" name="password" style="border-color: <?= (isset($_SESSION['password_err']) ? 'red' : '' ); ?>" name="email" value="<?= (isset($_SESSION['password_value']) ? $_SESSION['password_value'] : '' ) ?>">
                                    <?php if(isset($_SESSION['password_err'])) { ?>
                                        <div class="error-text">
                                            <?= $_SESSION['password_err']; ?>
                                        </div>
                                    <?php } unset($_SESSION['password_err']); ?>
                                    <i class="fa-regular fa-eye" id="psh"></i>
                                </div>
                                <div class="submit-btn">
                                    <button type="submit">Log In</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- Register Area End -->

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <!-- Jquery Version -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Bootstrap 5.2 -->

    <script src="resource/js/script.js"></script>
    <!-- Main Script Sheet -->
</body>
</html>

<?php
    unset($_SESSION['email_value']);
    unset($_SESSION['password_value']);
?>