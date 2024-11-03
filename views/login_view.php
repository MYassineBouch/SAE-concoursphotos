
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concours Photo</title>
    <link rel="stylesheet" type="text/css" href="./layout/global.css" />
    <link rel="stylesheet" type="text/css" href="./layout/results.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login - Concours Photos IUT</title>
</head>

<body>
    <div class="container">
        <img src="./layout/images/up.png" style="max-height : 100px;">
        <h2>Authentification LDAP</h2>
        <form method="post" action="./index.php?route=login" enctype="multipart/form-data" class="login-form">
            <label for="login">Login :</label><input type="text" id="login" name="login" />
            <label for="pass">Mot de passe :</label><input type="password" id="pass" name="pass" />
            <input type="submit" value="Valider">
        </form>
        <p><?php echo $error_login; ?></p>
    </div>

</body>
</html>

<?php require('./views/blocks/footer.php') ?>
