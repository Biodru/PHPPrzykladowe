<?php
   include 'classes.php';   //Umozliwia korzystanie z metod zdefiniowanych w pliku classes.php
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset='utf-8'>
    </head>
    <body>
        <table border="1">
            <tr> <!-- Sekcja nagłówków -->
                <th>Symbol</th>
                <th>Data początkowa</th>
                <th>Kurs</th>
                <th>Data końcowa</th>
                <th>Kurs</th>
                <th>Zmiana</th>
            </tr>
            <?php 
                $tabela=new kursy; //nowy obiekt
                $tabela->tabela(); //wywołanie metody, która pobiera niezbędne dane i tworzy tabelę
            ?>
        </table>
    </body>
</html>