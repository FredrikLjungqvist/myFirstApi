<?php
try{
    session_start();

    if(isset($_SERVER["REQUEST_METHOD"])){

        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            /* echo json_encode("Test answer"); */
            
             if(isset($_SESSION["date"])){
                echo json_encode(unserialize($_SESSION["date"])); 
               /*  echo json_encode($_SESSION["name"]); */
                exit;
            }else{
                echo json_encode("");
                exit;
            } 
        }
    }
    

} catch (Exception $error) {
    echo json_encode(
        array(
            "Message" => $error -> getMessage(),
            "Status" => $error -> getCode(),
        )
    );
    exit;

    
}


?>