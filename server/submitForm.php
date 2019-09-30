<?php
    // Database connection
    /*$DB_HOST = "localhost";
    $DB_USER = "modnesf0_sdagro5";
    $DB_PASS = "kafolattourleads011";
    $DB_NAME = "modnesf0_sdagro5";
    $DB_TABL = "user_requests";

    $db_conn;


   error_reporting(E_ALL); ini_set('display_errors', 1);
   */

    function setTJTimezone() {
        date_default_timezone_set("Asia/Dhaka");
    }

    // DB Functions
    function createDBConnection() {
        $db_conn = mysqli_connect("localhost", "modnesf0_sdagro5", "kafolattourleads011", "modnesf0_sdagro5");
        if (!$db_conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        return $db_conn;
    }


    function addRequestToDB($db_conn, $user_name, $user_phone, $user_email, $user_comment) {
        // escaped fields
        $name = mysqli_real_escape_string($db_conn, $user_name);
        $phone = mysqli_real_escape_string($db_conn, $user_phone);
        if($user_email) {
            $email = mysqli_real_escape_string($db_conn, $user_email);
        } else {
            $email = "n/a";
        }
        $comment = mysqli_real_escape_string($db_conn, $user_comment);
        $ts = time();

        $sql = "INSERT INTO `user_requests` (`user_name`, `user_phone`, `user_email`, `user_comment`, `created_at`) VALUES ('" .
           $name . "','"
         . $phone . "','"
         . $email . "','"
         . $comment . "',"
         . $ts . ")";

        $result = mysqli_query($db_conn, $sql);
        if(!$result) {
            echo "RECORD CANNOT BE ADDED!";
        }
    }


    function saveForm() {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $comment = $_POST['comment'];
        if(empty($name) || empty($phone) || empty($comment)) {
            echo "form can't be submited!";
            redirectToHome(false);
            return 0;
        }

        if(addRequestToDB(createDBConnection(), $name, $phone, $email, $comment)) {
            echo "Successfully submited!";
        }

    }

    function sendToEmail() {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = isset($_POST['email']) ? $_POST['email'] : "не указан";
        $comment = $_POST['comment'];

        $from = "www.kafolattour.com";
        $to = "";
        // $to = "info@kafolattour.com";
        $subject = "Заявка с сайта: kafolattour.com";
        $message = "Имя:" . $name .
        "\nТелефон:" . $phone .
        "\nПочта:" . $email .
        "\nКомментарий:" . $comment;
        $headers = "From:" . $from;
        mail($to,$subject,$message, $headers);
//        echo "The email message has been sent sent.";
    }

    function redirectToHome($passed) {
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . "/?submited=" . $passed);
        die();
    }


    // Handle user request
    setTJTimezone();
    saveForm();
    sendToEmail();
    redirectToHome(true);
?>
