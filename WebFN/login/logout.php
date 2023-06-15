<?php
if (isset($_COOKIE['username']) && ($_COOKIE['username'])) {
    header('Location: ../index.php');
}
