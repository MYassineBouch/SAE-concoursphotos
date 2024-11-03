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
</head>

<body>
<header>
    <nav>
        <a href="./index.php?route=welcome" class="title-icon"><i class="fa fa-lightbulb"></i></a>
        <ul>

            <li><a href="./index.php?route=upload">Participer</a></li>
            <li><a href="index.php?route=voter">Voter</a></li>
          <?php
          //require_once('models/connection.php');
          //$connex = connection();
          //require_once('models/login_model.php');
          //$login = login_ldap($connex);
             if ($_SESSION['user_login'] == 'admin') {
                 echo'<li><a href="index.php?route=resultats">Résultats</a></li>';
            }
                echo "<div class='navbar-item dropdown'>
                        <a href='#' class='dropbtn'> " . $_SESSION['user_login'] . " <i class='fa-solid fa-user' aria-hidden='true' style='padding-left: 5px;'></i></a>
                        <div class='dropdown-content'>
                            <a href='index.php?route=logout'>Se déconnecter <i class='fa-solid fa-right-from-bracket'></i></a>
                        </div>
                      </div>";
            ?>
          <!--  <div class="search-bar">
                <input type="text" class="search-text" placeholder="Rechercher des photos...">
               <button type="submit"><i class="fa fa-search"></i> </button>
            </div> -->
        </ul>
    </nav>
</header>

<article>
