<?php require('./views/blocks/header.php'); ?>
    <h4 style="text-align: center;">Nombre total des votes : <?php echo $votes_total; ?></h4>
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
    <div class="vote-results">
        <?php foreach ($votes_by_photo as $vote): ?>
            <div class="photo-container">
                <img src="<?php echo $vote['file_path']; ?>" alt="<?php echo $vote['file_path']; ?>">
                <div>
                    <p>La photo (<?php echo $vote['id']; ?>) uploadée par , a <?php echo $vote['total_votes']; ?> <?php echo ($vote['total_votes'] == 1) ? 'vote' : 'votes'; ?></p>                </div>
            </div>
        <?php endforeach; ?>

    </div>

<?php require('./views/blocks/footer.php'); ?>