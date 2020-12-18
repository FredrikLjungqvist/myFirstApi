<?php
require("./calculate.php");

try {
    session_start();
    if($_SERVER["REQUEST_METHOD"]==="POST"){
    
    
        if(isset($_POST["date"])){
            if(isset($_SESSION["date"]))  {
            //The json_encode made the $date not readabel by strtotime on api.php. Keeping it like this for the time beeing.
            /* $_SESSION["name"] = serialize($_POST["name"]); */
            $date = ($_POST["date"]);
            $text = calculate($date);
            $_SESSION["date"] = serialize($text);
            echo json_encode(true);
            exit;
            }else{
                echo json_encode(false);
                
            }
            
            
            
        }else{
            echo json_encode("inget sparades");
            exit;
        } 
    }

} catch (Exception $error) {
    echo json_encode(
        array(
            "Message" => $error -> getMessage(),
            "Status" => $error -> getCode(),
        )
    );

    
}

?>