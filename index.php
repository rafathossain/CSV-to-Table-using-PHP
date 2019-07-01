<?php

function json_from_csv($url){
	$csv_file = file_get_contents($url);
	$csv_array = array_map("str_getcsv", explode("\n", $csv_file));
	return $csv_array;
}

$csv_file = "csv/products.csv";

$csv_data = json_from_csv($csv_file);

echo "<table border='1'><tr><th>SN</th><th>OEM</th><th>BRAND</th><th>MODEL</th><th>TITLE</th><th>PRICE</th></tr>";

$index = 1;

for($i = 1 ; $i < count($csv_data) ; $i++){
    if($csv_data[$i][0] != ""){
        echo "<tr>";
        $dexplo = $csv_data[$i];
        echo "<td>" . $index . "</td>";
        $OEM = $dexplo[0];
        echo "<td>" . $OEM . "</td>";
        $BRAND = $dexplo[1];
        echo "<td>" . $BRAND . "</td>";
        $MODEL = $dexplo[2];
        echo "<td>" . $MODEL . "</td>";
        $TITLE = $dexplo[4];
        echo "<td>" . $TITLE . "</td>";
        $PRICE = $dexplo[3];
        echo "<td>€ " . $PRICE . "</td>";
        echo "</tr>";
        $index++;
    }
}

echo "</table>";

?>