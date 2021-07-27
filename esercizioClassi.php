<?php

class Materia
{
    private $nome;
    private $crediti;
    private $dateEsame;

    public function __construct($n, $c)
    {
        $this->nome = $n;
        $this->crediti = $c;
        $this->dateEsame = array();
    }

    public function __toString()
    {
        return "Nome Materia: $this->nome <br>Crediti: $this->crediti <br> Data Esami: <br>" . implode("<br>", $this->dateEsame);
    }

    public function getNomeMateria()
    {
        return $this->nome;
    }
    public function setData($data)
    {
        $this->dateEsame[] = $data;
    }
    public function getDate()
    {
        return $this->dateEsame;
    }
    public function getCrediti()
    {
        return $this->crediti;
    }
}
class Docente
{
    private $nome;
    private $cognome;
    private $telefonino;
    private $materie;

    public function __construct($n, $c, $t)
    {
        $this->nome = $n;
        $this->cognome = $c;
        $this->telefonino = $t;
        $this->materie = array();
    }
    public function __toString()
    {
        return "Docente:<br> Nome: $this->nome <br>Cognome: $this->cognome <br>Telefonino: $this->telefonino <br> Materie: <br>" . implode("<br>", $this->materie);
    }

    public function getMateria()
    {
        return $this->materie;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getCognome()
    {
        return $this->cognome;
    }
    public function cercaMateria($text)
    {
        foreach ($this->materie as $key => $materia) {
            if ($materia->getNomeMateria() == $text) {
                return $key;
            }
        }
        return -1;
    }

    public function aggiungiMateria($materia)
    {
        $this->materie[] = $materia;
        echo "Materia Aggiunta <br>";
    }
    public function rimuoviMateria($materia)
    {
        $key = $this->cercaMateria($materia);
        if ($key >= 0) {
            unset($this->materie[$key]);
            return true;
        } else {
            return false;
        }
    }
    public function aggiungiEsameMateria($materia, $data)
    {
        $key = $this->cercaMateria($materia);
        if ($key >= 0) {
            $this->materie[$key]->setData($data);
            echo "data aggiunta <br>";
        } else {
            echo "data non aggiunta <br>";
        }
    }
    public function esamiFuturi($materia)
    {
        $result = [];
        $key = $this->cercaMateria($materia);
        if ($key >= 0) {
            $date = $this->materie[$key]->getDate();
            for ($c = 0; $c < count($date); $c++) {
                if ($date[$c] > date("Y-m-d")) {
                    $result[] = $date[$c];
                }
            }
        }
        return $result;
    }
    public function esamiPassati($materia)
    {
        $result = [];
        $key = $this->cercaMateria($materia);
        if ($key >= 0) {
            $date = $this->materie[$key]->getDate();
            for ($c = 0; $c < count($date); $c++) {
                if ($date[$c] < date("Y-m-d")) {
                    $result[] = $date[$c];
                }
            }
        }
        return $result;
    }
}
class Scuola
{
    private $nome;
    private $indirizzo;
    private $via;
    private $telefono;
    private $docenti;
    private $materie;

    public function __construct($n, $i, $v, $t)
    {
        $this->nome = $n;
        $this->indirizzo = $i;
        $this->via = $v;
        $this->telefono = $t;
        $this->docenti = array();
        $this->materie = array();
    }

    public function __toString()
    {
        return "Scuola: $this->nome <br>indirizzo: $this->indirizzo <br>via: $this->via <br>Telefono: $this->telefono <br> Docenti della scuola: <br>" . implode("<br>", $this->docenti) . "<br> Materie della scuola: <br>" . implode("<br>", $this->materie);
    }

    public function aggiungiMateriaScuola($materia)
    {
        $this->materie[] = $materia;
        echo "Materia Aggiunta <br>";
    }

    public function aggiungiDocenteScuola($docente)
    {
        $this->docenti[] = $docente;
        echo "Docente Aggiunto <br>";
    }
    private function cercaDocente($n,$c)
    {
        foreach ($this->docenti as $key => $docente) {
            if ($docente->getNome() == $n && $docente->getCognome()==$c ) {
                return $key;
            }
        }
        return -1;
    }
    private function counter($choise)
    {
        switch ($choise) {
            case 0: {
                    $counter = count($this->docenti[0]->getMateria());
                    for ($c = 1; $c < count($this->docenti); $c++) {
                        if ($counter < count($this->docenti[$c]->getMateria())) {
                            $counter = count($this->docenti[$c]->getMateria());
                        }
                    }
                }
                break;
            case 1: {
                    $counter = count($this->materie[0]->getDate());
                    for ($c = 1; $c < count($this->materie); $c++) {
                        if ($counter < count($this->materie[$c]->getDate())) {
                            $counter = count($this->materie[$c]->getDate());
                        }
                    }
                }
                break;
            case 2: {
                    $counter = $this->materie[0]->getCrediti();
                    for ($c = 1; $c < count($this->materie); $c++) {
                        if ($counter > $this->materie[$c]->getCrediti()) {
                            $counter = $this->materie[$c]->getCrediti();
                        }
                    }
                }
                break;
        }
        return $counter;
    }

    public function getDocenteMaxMateria()
    {
        $docMax = array();
        if (count($this->docenti) >= 0) {
            $len = $this->counter(0);
            for ($c = 0; $c < count($this->docenti); $c++) {
                if ($len == count($this->docenti[$c]->getMateria())) {
                    $docMax[] = $this->docenti[$c];
                }
            }
        }
        return $docMax;
    }

    public function getMateriaMaxEsami()
    {
        $matMax = array();
        if (count($this->materie) >= 0) {
            $len = $this->counter(1);
            for ($c = 0; $c < count($this->materie); $c++) {
                if ($len == count($this->materie[$c]->getDate())) {
                    $matMax[] = $this->materie[$c];
                }
            }
        }
        return $matMax;
    }

    public function getMateriaMinCrediti()
    {
        $credMin = array();
        if (count($this->materie) >= 0) {
            $len = $this->counter(2);
            for ($c = 0; $c < count($this->materie); $c++) {
                if ($len == $this->materie[$c]->getCrediti()) {
                
                    $credMin[] = $this->materie[$c];
                }
            }
        }
        return $credMin;
    }
    public function ricercaDocenteByMateria($nomeMateria)
    {
        $ris = array();
        for($c=0;$c<count($this->docenti);$c++)
        {
            if($this->docenti[$c]->cercaMateria($nomeMateria)>=0)
            {
                $ris[]=$this->docenti[$c];
            }
        }
        return $ris;
    }
    public function rimuoviDocente($nome,$cognome)
    {
        $key = $this->cercaDocente($nome,$cognome);
        if ($key >= 0) {
            unset($this->docenti[$key]);
            echo "docente rimosso";
            return true;
        } else {
            echo "docente non rimosso";
            return false;
        }
    }
}

//TEST

// Creazione oggetto Materia
$mat1 = new Materia("PHP", "5");
$mat2 = new Materia("PHP Server", "10");
// Creazione oggetto Docente
$doc1 = new Docente("Giuseppe", "Grasso", "3225298755");
$doc2 = new Docente("Peppe", "Pazzo", "3225298755");
// Creazione oggetto Scuola
$sc = new Scuola("ITS", "Asdrubale", "Pippo", "03252212");
//Aggiungi oggetto materia ad oggetto scuola
$sc->aggiungiMateriaScuola($mat1);
$sc->aggiungiMateriaScuola($mat2);
//Aggiungi oggetto docente ad oggetto scuola
$sc->aggiungiDocenteScuola($doc1);
$sc->aggiungiDocenteScuola($doc2);
//Aggiungi oggetto materia ad oggetto docente
$doc1->aggiungiMateria($mat1);
$doc2->aggiungiMateria($mat2);
$doc2->aggiungiMateria($mat1);
//Rimuovi materia ad oggetto docente
$doc2->rimuoviMateria("PHP");
//Aggiungi all'array Esami Materia appartenete al docente una data
$doc2->aggiungiEsameMateria("PHP Server", "2021/07/09");
$doc2->aggiungiEsameMateria("PHP Server", "2021/09/15");
$doc2->aggiungiEsameMateria("PHP Server", "2020/01/05");
$doc1->aggiungiEsameMateria("PHP", "2021/07/09");
$doc1->aggiungiEsameMateria("PHP", "2021/09/15");
$doc1->aggiungiEsameMateria("PHP", "2020/09/15");
echo"<br><br>";
//Visualizza esami futuri della materia
$d= $doc1->esamiFuturi("PHP");
echo "Esami Futuri: <br>";
for($a=0;$a<count($d);$a++)
{
    echo $d[$a]."<br>";
}
echo"<br><br>";
//Visualizza esami passati della materia
$d= $doc1->esamiPassati("PHP");
echo "Esami Passati: <br>";
for($a=0;$a<count($d);$a++)
{
    echo $d[$a]."<br>";
}
echo"<br><br>";
//Visualizza docenti con più materie
$d = ($sc->getDocenteMaxMateria());
for ($a = 0; $a < count($d); $a++) {
    echo $d[$a] . "<br>";
}
echo"<br><br>";
//Visualizza Materia con più esami
$d = ($sc->getMateriaMaxEsami());
for ($a = 0; $a < count($d); $a++) {
    echo $d[$a] . "<br>";
}
echo"<br><br>";
//Visualizza Materia con crediti minori
$d = ($sc->getMateriaMinCrediti());
for ($a = 0; $a < count($d); $a++) {
    echo $d[$a] . "<br>";
}
echo"<br><br>";
//Ricerca Docenti tramite nome Materia
$d = ($sc->ricercaDocenteByMateria("PHP"));
for ($a = 0; $a < count($d); $a++) {
    echo $d[$a] . "<br>";
}
echo"<br><br>";
//Rimozione docente dall'oggetto scuola tramite nome e cognome
$sc->rimuoviDocente("Peppe","Pazzo");
echo"<br><br>";
//Visualizzo l'oggetto scuola dopo le operazioni
echo $sc;
