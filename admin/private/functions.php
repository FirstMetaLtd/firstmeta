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

/**
 * Builds a displayable URL for a stored image/file path. Supabase Storage
 * uploads are already full URLs; legacy local paths still get $baseurl
 * prepended for backwards compatibility with existing DB rows.
 */
function image_url($path){
    if(empty($path)){
        return '';
    }
    if(preg_match('#^https?://#i', $path)){
        return $path;
    }
    global $baseurl;
    return $baseurl.$path;
}

/**
 * Uploads a file to Supabase Storage (required on Vercel, where the
 * serverless PHP filesystem is read-only and can't persist local uploads).
 * Returns the public URL on success, or false on failure.
 */
function upload_to_supabase_storage($tmpFilePath, $destPath, $mimeType){
    $supabaseUrl = getenv('SUPABASE_URL') ?: ($_ENV['SUPABASE_URL'] ?? '');
    $serviceKey = getenv('SUPABASE_SERVICE_KEY') ?: ($_ENV['SUPABASE_SERVICE_KEY'] ?? '');
    $bucket = 'uploads';

    if(!$supabaseUrl || !$serviceKey){
        error_log('upload_to_supabase_storage: missing SUPABASE_URL or SUPABASE_SERVICE_KEY');
        return false;
    }

    $fileData = file_get_contents($tmpFilePath);
    if($fileData === false){
        return false;
    }

    $url = rtrim($supabaseUrl, '/')."/storage/v1/object/{$bucket}/{$destPath}";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fileData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer '.$serviceKey,
        'Content-Type: '.$mimeType,
        'x-upsert: true',
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);

    if($httpCode >= 200 && $httpCode < 300){
        return rtrim($supabaseUrl, '/')."/storage/v1/object/public/{$bucket}/{$destPath}";
    }

    error_log("upload_to_supabase_storage failed: HTTP $httpCode, curl_error=$curlError, response=$response");
    return false;
}
?>