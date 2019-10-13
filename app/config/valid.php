<?php

    if(!empty($_SESSION['name'])) {
        header('Location: ../profile.php');
    }