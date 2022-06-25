<?php

$container = '';

try {
    # startet den Manager zum Aufbau einer Verbindung
    $manager = new MongoDB\Driver\Manager($connection_cluster);

    $bulk = new MongoDB\Driver\BulkWrite();
    $bulk->insert(['x' => 2]);

    #$manager->executeBulkWrite($collection . $data, $bulk);

    $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 100);
    $result = $manager->executeBulkWrite('' . $collection . '.' . $data . '', $bulk, $writeConcern);

    printf("Inserted %d document(s)\n", $result->getInsertedCount());
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
