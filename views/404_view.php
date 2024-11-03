<?php
header('Status: 404 Not Found', true, 404);

require('./views/blocks/header.php');

echo '<h2>Page introuvable</h2>';
echo "<h3>le lien a été mal saisi ou la page n'existe pas</h3>";
require('./views/blocks/footer.php');
