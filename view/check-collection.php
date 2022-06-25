<?php
# Collection and Data
$collection = 'vissio';
$data = 'device';

function checkCollection($connection_cluster, $collection, $data, $error_msg)
{
    # Container
    $container = '';

    try {
        # startet den Manager zum Aufbau einer Verbindung
        $manager = new MongoDB\Driver\Manager($connection_cluster);

        # Abfrage
        $query = new MongoDB\Driver\Query([]);

        # Auswahl der Collection und Daten / Dokumente
        $cursor = $manager->executeQuery("" . $collection . '.' . $data . "", $query);
        #var_dump((array)$cursor);

        # Ergebnis, Daten zu Objekten
        foreach ($cursor as $object) {

            $array = (array)$object;

            $container .= '<span class="name">Spalten :</span> ' . count($array) . '<br>';

            foreach ($array as $key => $value) {
                if ($key != '_id' and $key != 'id') {
                    $container .= '<span class="name">' . $key . '</span>';
                    $container .= ' ' . $value . '<br>';
                }
            }

            $container .= '<br><br>';
        }
    } catch (MongoConnectionExeption $error) {
        var_dump($error);
    }

    # Ausgabe der Fehlermeldungen
    if (count($error_msg) >= 1) {

        echo '<h3>Fehlende Werte : ' . count($error_msg) . '</h3>';

        foreach ($error_msg as $value) {
            echo $value . '<br>';
        }
    }

    # Ausgabe der Ergebnisse
    echo '<h3>Ergebnisse :</h3>';
    echo '' . $container . '<br>';
}

checkCollection($connection_cluster, $collection, $data, $error_msg);
