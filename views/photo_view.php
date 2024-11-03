<?php require('./views/blocks/header.php'); ?>

<div class="photo-list">
    <h2>Etudiants et professeurs de l'IUT, votre voix compte! Rejoignez-nous pour voter et sélectionner la meilleure photo de ce concours exceptionnel.</h2>
    <h2> <?php echo $error_message ?> </h2>
    <form method="post" action="./index.php?route=voter" enctype="multipart/form-data">
        <fieldset>
            <caption>TEMPS RESTANT ...</caption>
            <table>
                <tr>
                    <td id="days"></td>
                    <td>:</td>
                    <td id="hours"></td>
                    <td>:</td>
                    <td id="minutes"></td>
                    <td>:</td>
                    <td id="seconds"></td>
                </tr>
            </table>
            <script>
                // la date limite
                const targetDate = new Date('2024-06-30T00:00:00');

                function updateCountdown() {
                    const currentDate = new Date();
                    const timeDifference = targetDate.getTime() - currentDate.getTime();

                    if (timeDifference <= 0) {
                        // Countdown has ended
                        document.getElementById('days').textContent = '0';
                        document.getElementById('hours').textContent = '0';
                        document.getElementById('minutes').textContent = '0';
                        document.getElementById('seconds').textContent = '0';
                        return;
                    }

                    const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

                    document.getElementById('days').textContent = days;
                    document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
                    document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
                    document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
                }

                // Update the countdown every second
                setInterval(updateCountdown, 1000);
            </script>
        </fieldset>
        <div class="gallery-container">
            <?php
            foreach ($photos as $photo) {
                echo '<div class="gallery">';
                echo '<input type="radio" name="photo_id" class="select-checkbox" value="' . $photo['id'] . '">';
                echo '<a target="_blank" href="' . $photo['file_path'] . '">';
                echo '<img alt="' . $photo['legende'] . '" src="' . $photo['file_path'] . '">';
                echo '</a>';
                echo '<div class="desc">' . $photo['legende'] . '</div>';
                echo '</div>';
            }
            ?>
        </div>
        <input type="submit" value="Voter" class="vote-btn">
    </form>

</div>

<?php
require('./views/blocks/footer.php');
?>
