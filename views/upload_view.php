<?php require('./views/blocks/header.php')?>

<body>
<div class="container">
<div class="upload-form">
    <h1>Uploader une photo</h1>
    <form action="./index.php?route=upload" method="post" enctype="multipart/form-data">
        <label for="photo">Sélectionner votre photo :</label>
        <input type="file" id="photo" name="photo" accept="image/*" required>
        <br><br>
        <label for="titre">Légende* :</label>
        <input type="text" id="legende" name="legende" required>
        <br><br>
        <input type="submit" value="Participer!">
    </form>
    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($error_message)) { ?>
        <p style="color: red; padding: 12px;"><?php echo $error_message; ?></p>
    <?php } elseif(isset($success_message)) {?>
    <p style="color: green; padding: 12px;"><?php echo $success_message; ?></p>
    <?php }
}?>
</div></div>
</body>

<?php

require('./views/blocks/footer.php');
