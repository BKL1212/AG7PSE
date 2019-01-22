<?php
//ist die funktion zum löschen der Events/Termine
if (isset($_POST['delete'])) {
    $string = file_get_contents("events.json");
    $jsonArray = json_decode($string, true);

    $title = $_POST['title'];
    $defId = $_POST['defId'];

    for ($i = 0; $i < count($jsonArray); $i++) {
        if ($jsonArray[$i]["defId"] == $defId) {
            echo "found id at: " . $i . " with title: " . $jsonArray[$i]["title"] . "\n ";
            unset($jsonArray[$i]);
            $jsonArray = array_values($jsonArray);

            echo "deleted event \n";

            if (file_put_contents('events.json', json_encode($jsonArray))) {
                echo "SAVED JSON";
                die();
            }
        }
    }

    echo "Event zum Löschen nicht gefunden oder bereits gelöscht!";

}
