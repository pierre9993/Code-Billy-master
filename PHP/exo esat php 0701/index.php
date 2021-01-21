<?php
function boucle(){
    for($i=1;$i<=20;$i++){
        if($i === 10){
            echo "Je suis à 10 !";
            echo "<br/>";
        }
        else if($i === 15){
            echo "Vous êtes arrivé au 15 !";
            echo "<br/>";
        }
        else{
        echo $i;
        echo "<br/>";
     };
    }
}
boucle();



?>