<?php 
$op = $_GET['op'];
$arr = $_GET['str'];
$operazioni = $_POST['operazioni'];
$arr = $_POST['array'];
$array = explode(',',$arr);


echo "Stringa: ".$arr;
echo "<br>";
print_r($array);



function max($array){
    $max = $array[0];
    for ($i=0; $i < count($array); $i++) { 
        if ($max < $array[$i]){
            $max = $array[$i];  
    }
} 

    echo"<br>";
    echo "Il numero più grande è : $max";

}

function min($array){
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
    $n = $_GET['n'];
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

echo "<br>";
echo "Quale operazione stiamo svolgendo?";
echo "<br>";
echo "Operazione: ".$op;
echo "<br>";
 
switch ($op) {
    case 'max':
        max($array);
        break;
    case 'min':
        min($array);
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

    default:
        echo"<br>";
        echo "Non trovato";
        break;
}
?>
