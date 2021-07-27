 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Richeste get</title>
 </head>
 <body>
  <form action="scelta.php" method ="post">
  <select name="operazioni">
  <option value="max">max</option>
  <option value="min">min</option>
  <option value="media">media</option>
  <option value="somma">somma</option>
  <option value="ordinamento">ordinamento</option>
  <option value="ricerca">ricerca</option>


  <option value="dispari">dispari</option>
  <option value="pari">pari</option>
  <option value="inverti">inverti</option>
</select><br>
  <input type="radio"  name="ordinamento" value="crescente">
<label for="crescente">crescente</label><br>
<input type="radio"  name="ordinamento" value="decrescente">
<label for="decrescente">decrescente</label><br>
<br>
    

     <input type="text" name="array" placeholder="inserisci i numeri">
     <input type="text" name="n" placeholder="quale numero vuoi ricercare">
     <input type="submit" value="invia">
     </form>
     
    
 </body>
 </html>
 <!--  <form action="search.php" method ="post">
     <input type="text" name="username" placeholder="inserisci il nome">
     <input type="password" name="password" placeholder="inserisci il cognome ">
     <input type="hidden" name="actionType" value="registrazione">

     <input type="submit" value="Registrati">
     </form> -->