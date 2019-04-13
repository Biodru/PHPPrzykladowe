<?php 

//Klasa łączenia z bazą danych
class DB {

    protected $connection;
  
    public function __construct() {
  
      $this->connection = new mysqli('192.168.64.2','root','','waluty');
  
    }
  
  }
//Klasa do metod związacnych z kursami(pobiera dane i tworzy tabelę)
class kursy extends DB {

    public function __construct() {

        parent::__construct();

    }

    function kurs($symbol,$data) {

        $json_file=file_get_contents("https://api.exchangeratesapi.io/$data");

        $json_array = json_decode($json_file,true);

        $kurs = $json_array['rates'][$symbol];

        return $kurs;

    }

    public function tabela() {

        $data=date('Y-m-d');

        $sql = 'SELECT * FROM waluty';

        $result = $this->connection->query("SELECT * FROM waluty");

        while($row = $result->fetch_assoc()) {

            echo "<tr>"."<td>".$row['symbol']."</td>"."<td>".$row['data_baza']."</td>"."<td>".$row['kurs']."</td>"."<td>".$data."</td>"."<td>".$this->kurs($row['symbol'],$data)."</td>"."<td>".round(($this->kurs($row['symbol'],$data)/$row['kurs'] - 1) * 100, 2)."%"."</td>"."</tr>";

        }

    }

}  
?>