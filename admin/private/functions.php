<?php
function get_random_string($length) {
    $characters = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    
    $length = rand(4,$length);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $random = rand(0,61);
        $randomString .=$characters[$random];
    }
    return $randomString;
}

/**
 * Escape output to prevent XSS attacks.
 * Use this on all user-supplied data before echoing to HTML.
 */
function esc($word){
    return htmlspecialchars((string)$word, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

/**
 * Generate a CSRF token and store it in the session.
 */
function generate_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Validate CSRF token from a form submission.
 */
function validate_csrf_token($token) {
    if (empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $token)) {
        http_response_code(403);
        die('Invalid CSRF token. Please go back and try again.');
    }
}

function check_login($con){
    if(isset($_SESSION['admin_url'])){
        $arr['admin_url']=$_SESSION['admin_url'];
        $query = "select * from admin where admin_url = :admin_url limit 1";
        $stm = $con->prepare($query);
        $check = $stm->execute($arr);
        if(($check)){
                $data = $stm->fetchAll(PDO::FETCH_OBJ);
                if(is_array($data) && count($data)>0){
                    return $data[0];
                }
        }
    }else{
        echo "<script> window.location = 'login';</script>";
    }
}

function check_user_login($con){
    if(isset($_SESSION['user_token'])){
        $arr['user_token']=$_SESSION['user_token'];
        $query = "select * from users where token = :user_token limit 1";
        $stm = $con->prepare($query);
        $check = $stm->execute($arr);
        if(($check)){
                $data = $stm->fetchAll(PDO::FETCH_OBJ);
                if(is_array($data) && count($data)>0){
                    return $data[0];
                }
        }
    }else{
        echo "<script> window.location = 'login';</script>";
    }
}


function get_settings($con){

    $sql = 'SELECT * from general_settings where id=1 limit 1';
    $statement = $con->prepare($sql);
    $statement->execute();
    $set = $statement->fetchAll(PDO::FETCH_OBJ);
    if(count($set)==1){
        $set=$set[0];
    }
    return $set;
}
?>