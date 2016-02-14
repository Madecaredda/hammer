
<?php
if (isset($_POST['submit']) === true) // Controllo che il form sia stato inviato
{
    $file = fopen('./titolo.txt', 'w+'); // apro il file usando l'opzione a o a+ dal momento che l'opzione w o w+  cancella il contenuto precedente
    fwrite($file , $_POST['Nuovo']); 
    fclose($file);
    header("Location: ./modifica.php"); 
}
?>