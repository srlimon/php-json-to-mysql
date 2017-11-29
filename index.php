<?php
require_once('pdo_connect.php');

header("Content-Type: application/json; charset=UTF-8");
//$json = '{"name":"lari","surname":"rodri"}';
$json = file_get_contents('php://input');

if (empty($json)) {
     echo "woops, no JSON";
} else {
$data = json_decode($json, true);
// var_dump($data);

switch (json_last_error()) {
        case JSON_ERROR_NONE:
            echo 'No errors '. $data['foo']['Code']." ".$data['foo']['Len'];
        break;
        case JSON_ERROR_DEPTH:
            echo ' - Maximum stack depth exceeded';
        break;
        case JSON_ERROR_STATE_MISMATCH:
            echo ' - Underflow or the modes mismatch';
        break;
        case JSON_ERROR_CTRL_CHAR:
            echo ' - Unexpected control character found';
        break;
        case JSON_ERROR_SYNTAX:
            echo $json . ' - Syntax error, malformed JSON';
        break;
        case JSON_ERROR_UTF8:
            echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
        break;
        default:
            echo ' - Unknown error';
        break;
    }

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO cat_rec (Code, Guid, Len, Hei, Dep, Ea, Area, Vol, Unit, Des) 
    VALUES (:Code, :Guid, :Len, :Hei, :Dep, :Ea, :Area, :Vol, :Unit, :Des)");
    //VALUES ( IFNULL(:productId, NULL), IFNULL(:productName, NULL) )";
    // VALUES (:firstname, :lastname)");

    $stmt->bindValue(':Code', $data['foo']['Code']);
    $stmt->bindValue(':Guid', $data['foo']['Guid']);
    $stmt->bindValue(':Len', $data['foo']['Len']);
    $stmt->bindValue(':Hei', $data['foo']['Hei']);
    $stmt->bindValue(':Dep', $data['foo']['Dep']);
    $stmt->bindValue(':Ea', $data['foo']['Each']);
    // $stmt->bindValue(':Area', $data['foo']['Area']);
    $stmt->bindValue(':Area', !empty($data['foo']['Area']) ? $data['foo']['Area'] : NULL, PDO::PARAM_INT);
    $stmt->bindValue(':Vol', $data['foo']['Vol']);
    $stmt->bindValue(':Unit', $data['foo']['Unit']);
    $stmt->bindValue(':Des', $data['foo']['Des']);
    // bindValue(':param', null, PDO::PARAM_INT);
    $stmt->execute();

    // insert another row
    // $firstname = "Mary";
    // $lastname = "Moe";
    // $email = "mary@example.com";
    // $stmt->execute();    
}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
$conn = null;

//json_decode error handler
// if (!function_exists('json_last_error_msg')) {
//         function json_last_error_msg() {
//             static $ERRORS = array(
//                 JSON_ERROR_NONE => 'No error',
//                 JSON_ERROR_DEPTH => 'Maximum stack depth exceeded',
//                 JSON_ERROR_STATE_MISMATCH => 'State mismatch (invalid or malformed JSON)',
//                 JSON_ERROR_CTRL_CHAR => 'Control character error, possibly incorrectly encoded',
//                 JSON_ERROR_SYNTAX => $json . 'Syntax error',
//                 JSON_ERROR_UTF8 => 'Malformed UTF-8 characters, possibly incorrectly encoded'
//             );

//             $error = json_last_error();
//             return isset($ERRORS[$error]) ? $ERRORS[$error] : 'Unknown error';
//         }
//     }
?>