
<?php
    function helper($message, $color = 'green') {
        $alert = "<p class=' text-$color '>$message</p>";
        return $alert;
    }