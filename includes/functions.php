<?php 

    function escape($string) {
        global $dbh;
        return mysqli_real_escape_string($dbh, $string);

    }
    function getToken($len) {
        $rand_str = md5(uniqid(mt_rand(), true));
        $base64_encode = base64_encode($rand_str);
        $modified_base64_encode = str_replace(array('+', '='), array('', ''), $base64_encode);
        $token = substr($modified_base64_encode, 0, $len);
        return $token;
    }
