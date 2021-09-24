

<?php

 
    echo "<table style='border: 1px solid black;width: 600; margin-left: 350;' >";
    echo "<thead style='border: 1px solid black;color: blue;' >";
        echo "<tr style='border: 1px solid black;'>";
            echo "<th colspan='2' style='border: 1px solid black;'>Test field1 values </th>" ;
        echo "</tr >";
    echo "</thead>";
    echo "<tbody style='border: 1px solid black;'>" ;
        

for( $i=1;$i<50;$i++){
    
    
$url = 'https://api.thingspeak.com/channels/1462978/feeds/'.strval($i).'.json?api_key=CWTHOKP3PAGQOT1F';

$request_url = $url ;

$curl = curl_init($request_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, [
  'X-RapidAPI-Host: api.thingspeak.com',
  'X-RapidAPI-Key: CWTHOKP3PAGQOT1F',
  'Content-Type: application/json'
]);
$response = curl_exec($curl);

// curl_close($curl);

$final_response = '['.$response.']' ;

$dec = json_decode($final_response);

 
        

foreach($dec as $ar){
     // array_push($datas, $ar->field1);
    
    if(!empty($ar->field1)  ){
                  
 //  echo  "  <br> <h4>" .$ar->field1 ." </h4> <h4> " .$ar->created_at  ." </h4> </br>  " ;
            echo "<tr style='border: 1px solid black;'>" ;
            echo "<td style='border: 1px solid black;'>" .$ar->field1  ."</td>";
            echo "<td style='border: 1px solid black;'>" .$ar->created_at ."</td>" ;
            echo "</tr>" ;
    }

    
}   
}
 
    echo "</tbody>" ;
     echo "</table> " ;

