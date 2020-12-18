<?php

function calculate($date){
  
    $array=
    [
        "Vattuman"=>["start"=> "01-20", "end" => "02-18"],
        "Fisk"=>["start"=>"02-19","end" => "03-20"],  
        "Vädur"=>["start"=>"03-21","end" => "04-19"],
        "Oxe"=>["start"=>"04-20","end" => "05-20"],
        "Tvilling"=>["start"=>"05-21","end" => "06-21"],
        "Kräfta"=>["start"=>"06-22","end" => "07-22"],
        "Lejon"=>["start"=>"07-23","end" => "08-22"],
        "Jungfru"=>["start"=>"08-23","end" => "09-22"],
        "Våg"=>["start"=>"09-23","end" => "10-23"],
        "Skorpion"=>["start"=>"10-24","end" => "11-22"],
        "Skytt"=>["start"=>"11-23","end" => "12-21"],
        "Stenbock"=>["start"=>"12-22","end" => "01-19"]
    ];
    $date = explode('-', $date);
    $year = $date[0];
    $month = $date[1];
    $day = $date[2];
    $date = $month."-".$day;

 //Alternative for $date but didnt work with dates lower than 1902 or higher than 2037. Did not find answer to this.
    /*    $date = strtotime($date);
    $date = date("m-d", $date); */
    
foreach($array as $key => $value){
        
    if($value["start"]<=$date && $value["end"]>=$date){
        return $key;
        
    }elseif ($value["start"]>$value["end"]) {
        return $key;
    }
    
}
}

?>
