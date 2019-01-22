<?php
echo "saveJsonEvents.php started... \n";

if (isset($_POST['jsonArray'])) {
    echo "got jsonArray\n";

    $jsonArray = $_POST['jsonArray'];

    //var_dump($jsonArray);

    //echo $jsonArray[0]["title"];

    for ($i = 0; $i < count($jsonArray) * 2; $i++) {
        if ($i % 2 == 1) {
            continue;
        }
        //echo $jsonArray[$i]["title"];
    }

    if (file_put_contents('events.json', json_encode($jsonArray))) {
        echo "JSON wurde überschrieben..";
    }

} else {
    echo "ERROR: kein jsonArray";
}
 ?>