<?php 

$operazioni = $_POST['operazioni'];
$arr = $_POST['array'];
$array = explode(',',$arr);


echo "Stringa: ".$arr;
echo "<br>";
print_r($array);


echo "<br>";
echo "Quale operazione stiamo svolgendo?";
echo "<br>";
echo "Operazione: ".$operazioni;
echo "<br>";
 
switch ($operazioni) {
    case 'max':
        maxf($array);
        break;
    case 'min':
        minf($array);
        break;
    case 'media':
        media($array);
        break;
    case 'ricerca':
        ricerca($array);
        break;
    case 'somma':
        somma($array);
        break;
    case 'dispari':
        dispari($array);
        break;
    case 'pari':
        pari($array);
        break;
    case 'inverti':
        inverti($array);
        break;
        case 'ordinamento':
            ordinamento($array);
            break;

    default:
        echo"<br>";
        echo "Non trovato";
        break;
}

function ordinamento($array){
print_r($array); echo "<br>";
$ordine = $_POST['ordinamento'];
if($ordine=='crescente'){
for($i=0; $i<count($array); $i++ ){
     for($y=$i; $y<count($array);  $y++ ){
         
         if($array[$i] > $array[$y]){
             $temporanea= $array[$i];
             $array[$i]= $array[$y];
             $array[$y]= $temporanea;
         }
        } 
       }
       print_r($array);
}

elseif($ordine =='decrescente'){
    for($i=0; $i<count($array); $i++){
        for($y=$i; $y<count($array);  $y++){
            
            if($array[$i] <$array[$y]){
                $temporanea= $array[$i];
                $array[$i]= $array[$y];
                $array[$y]= $temporanea;
            }
           } 
          }
          print_r($array);
}
}



function maxf($array){
    $max = $array[0];
    for ($i=0; $i < count($array); $i++) { 
        if ($max < $array[$i]){
            $max = $array[$i];  
    }

}
    echo"<br>";
    echo "Il numero più grande è : $max";

}

function minf($array){
    $min = $array[0];
    for ($i=0; $i < count($array); $i++) { 
        if ($min > $array[$i]){ 
            $min = $array[$i]; 
    }
}

    echo"<br>";
    echo "Il numero più piccolo è : $min";

}


function media($array){
    $somma = 0;

    for ($i=0; $i < count($array) ; $i++) { 
        $somma = $array[$i] + $somma;
    }
    $media= $somma/count($array);
    echo "<br>";
    echo "La media è: " .$media;
}

function ricerca($array){
    $n = $_POST['n'];
    echo "Il Numero da cercare è: " .$n;
    
    for ($i=0; $i < count($array) ; $i++) { 
        if ($n==$array[$i]) {
            echo "<br><br>";
            echo "Il Numero si trova nella posizione: ".$i;
            break;
        }
    }
}

function somma($array){
    $somma = 0;

    for ($i=0; $i < count($array) ; $i++) { 
        $somma = $array[$i] + $somma;
    }
    echo "<br>";
    echo "La somma è: " .$somma;
}

function dispari($array){

    for ($i=0; $i < count($array); $i++) { 
        if ($array[$i]%2==1) {
            $dispari[]=$array[$i];  
        }            
    }
    echo "<br>";
    echo "I numeri dispari sono: ";
    print_r ($dispari);
}

function pari($array){
    for ($i=0; $i < count($array); $i++) { 
        if ($array[$i]%2==0) {
            $pari[]=$array[$i];    
        }            
    }
    echo "<br>";
    echo "<br>";
    echo "I numeri pari sono: ";
    print_r ($pari);
}

function inverti($array){
    $i=count($array)-1;
    echo "Lunghezza : ".$i;
    
    do {
        $inverso[]=$array[$i];
        $i--;

    } while ($i >= 0);
    
    echo "<br>";
    echo "L'array invertito è: ";
    print_r ($inverso);
}


?>