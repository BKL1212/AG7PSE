<?php
require 'db.php'; //Kunde löschen
if (isset($_GET['aktion']) and $_GET['aktion'] == 'loeschen') {
    if (isset($_GET['id'])) {
        $id = (INT) $_GET['id'];
        if ($id > 0) {
            $loeschen = $db->prepare("DELETE FROM kunden WHERE id=(?) LIMIT 1");
            $loeschen->bind_param('i', $id);
            if ($loeschen->execute()) {
                echo "<p>Datensatz wurde gelöscht</p>";
            }
        }
    }
} // Kunde bearbeiten
if (isset($_POST['aktion']) and $_POST['aktion'] == 'korrigieren') {
    echo "<h1>korrigieren der Daten";
    $upd_id = "";
    if (isset($_POST['id'])) {
        $upd_id = (INT) trim($_POST['id']);
    }
    $upd_vorname = "";
    if (isset($_POST['vorname'])) {
        $upd_vorname = trim($_POST['vorname']);
    }
    $upd_nachname = "";
    if (isset($_POST['nachname'])) {
        $upd_nachname = trim($_POST['nachname']);
    }
    $upd_identifikationsnummer = "";
    if (isset($_POST['identifikationsnummer'])) {
        $upd_identifikationsnummer = trim($_POST['identifikationsnummer']);
    }
    if ($upd_id != '' and ($upd_vorname != '' or $upd_nachname != '' or $upd_identifikationsnummer != '')) {
        // speichern
        $update = $db->prepare("UPDATE kunden SET vorname =?, nachname=?, identifikationsnummer=? WHERE id=? LIMIT 1");
        $update->bind_param('sssi', $upd_vorname, $upd_nachname, $upd_identifikationsnummer, $upd_id);
        if ($update->execute()) {
            echo '<p class="feedbackerfolg">Datensatz wurde geändert</p>';
            $modus_aendern = false;
        }
    } //Kunde speichern
}
if (isset($_POST['aktion']) and $_POST['aktion'] == 'speichern') {
    $vorname = "";
    if (isset($_POST['vorname'])) {
        $vorname = trim($_POST['vorname']);
    }
    $nachname = "";
    if (isset($_POST['nachname'])) {
        $nachname = trim($_POST['nachname']);
    }
    $identifikationsnummer = "";
    if (isset($_POST['identifikationsnummer'])) {
        $identifikationsnummer = trim($_POST['identifikationsnummer']);
    }
    $erstellt = date("Y-m-d H:i:s");
    if ($vorname != '' or $nachname != '' or $identifikationsnummer != '') {
        // speichern
        $einfuegen = $db->prepare("INSERT INTO kunden (vorname, nachname, identifikationsnummer) VALUES (?, ?, ?)");

        if ($einfuegen->bind_param('ssi', $vorname, $nachname, $identifikationsnummer)) {
            if ($einfuegen->execute()) {
                header('Location: index.php?aktion=feedbackgespeichert');
                //die();
                echo "<h1>gespeichert</h1>";
            } else {
                echo "<h1>amk</h1>";
            }
        } else {
            echo "failed binding paramters";
        }

    } else {
        echo "fail";
    }

}
if (isset($_GET['aktion']) and $_GET['aktion'] == 'feedbackgespeichert') {
    echo '<p class="feedbackerfolg">Datensatz wurde gespeichert</p>';
}
$modus_aendern = false;
if (isset($_GET['aktion']) and $_GET['aktion'] == 'bearbeiten') {
    $modus_aendern = true;
}
if ($modus_aendern != true) {
    $daten = array();
    if ($erg = $db->query("SELECT * FROM kunden")) {
        if ($erg->num_rows) {
            while ($datensatz = $erg->fetch_object()) {
                $daten[] = $datensatz;
            }
            $erg->free();
        }
    }
    if (!count($daten)) {
        echo "<p>Es liegen keine Daten vor :(</p>";
    } else {
        ?>
    <table>
        <thead>
            <tr>
                <th>Nutzeraktion</th>
                <th>ID</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Identifikationsnummer</th>
        </thead>
        <tbody>
            <?php
foreach ($daten as $inhalt) {
            ?>
                <tr>
                    <td>
                        <a href="?aktion=bearbeiten&id=<?php echo $inhalt->id; ?>">
                            bearbeiten</a>
                        <a href="?aktion=loeschen&id=<?php echo $inhalt->id; ?>">
                            Löschen</a>
                    </td>
                    <td><?php echo $inhalt->id; ?></td>
                    <td><?php echo bereinigen($inhalt->vorname); ?></td>
                    <td><?php echo bereinigen($inhalt->nachname); ?></td>
                    <td><?php echo bereinigen($inhalt->identifikationsnummer); ?></td>
                </tr>
            <?php
}
        ?>
        </tbody>
    </table>
<?php
}
}
if ($modus_aendern == true and isset($_GET['id'])) {
    $id_einlesen = (INT) $_GET['id'];
    if ($id_einlesen > 0) {
        $dseinlesen = $db->prepare("SELECT id, vorname, nachname, identifikationsnummer FROM kunden WHERE id=? ");
        $dseinlesen->bind_param('i', $id_einlesen);
        $dseinlesen->bind_result($id, $vorname, $nachname, $identifikationsnummer);
        $dseinlesen->execute();
        while ($dseinlesen->fetch()) {
            // echo "<li>";
            // echo $id . ' / '. $vorname .' '. $nachname.' '. $identifikationsnummer;
        }
    }
}
function bereinigen($inhalt = '')
{
    $inhalt = trim($inhalt);
    $inhalt = htmlentities($inhalt, ENT_QUOTES, "UTF-8");
    return ($inhalt);
}
?>
<form action="index.php" method="post">

    <label>Vorname:
        <input type="text" name="vorname" id="vorname" value="<?php echo $vorname; ?>">
    </label>
    <label>Nachname:
        <input type="text" name="nachname" id="nachname" value="<?php echo $nachname; ?>">
    </label>
    <label>Identifikationsnummer:
        <input name="identifikationsnummer" id="identifikationsnummer"><?php echo $identifikationsnummer; ?>
    </label>
    <input type="hidden" name="aktion" value="speichern">
<?php
if ($modus_aendern != true) {
    echo '<input type="hidden" name="aktion" value="speichern">';
    echo '<input type="submit" value="speichern">';
    echo '</form>';
} else {
    echo '<input type="hidden" name="id" value="' . $id . '">';
    echo '<input type="hidden" name="aktion" value="korrigieren">';
    echo '<input type="submit" value="ändern">';
    echo '</form>';
}
?>
</form>


<script>
//script zur generierung von zufalls zahl zwischen 1111-9999
	var min = 1111,
		max = 9999;

	function zufallszahl() {
		var elem = document.getElementById('ausgabe');
		elem.innerHTML = rand(min, max);
	}

	function rand(min, max) {
		return Math.floor(Math.random() * (max - min + 1)) + min;
	}

</script>
<br><br>
<p style="font-size:50px; text-align:center;" id="ausgabe"></p>

<button style="width:100%; height:50px; background-color:blue; color:white; font-size: 25px;"  onclick="zufallszahl()"> Zufallszahl generieren</button>
<br><br>
<a href="../internal.php"><button style="width:100%; height:50px; background-color:blue; color:white; font-size: 25px;" >Zurück</button></a>

<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);

body {
  background-color: #3e94ec;
  font-family: "Roboto", helvetica, arial, sans-serif;
  font-size: 16px;
  font-weight: 400;
  text-rendering: optimizeLegibility;
}

div.table-title {
   display: block;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
}

.table-title h3 {
   color: #fafafa;
   font-size: 30px;
   font-weight: 400;
   font-style:normal;
   font-family: "Roboto", helvetica, arial, sans-serif;
   text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
   text-transform:uppercase;
}


/*** Table Styles **/

.table-fill {
  background: white;
  border-radius:3px;
  border-collapse: collapse;
  height: 320px;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;
}

th {
  color:#D5DDE5;;
  background:#1b1e24;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:23px;
  font-weight: 100;
  padding:24px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
}

th:first-child {
  border-top-left-radius:3px;
}

th:last-child {
  border-top-right-radius:3px;
  border-right:none;
}

tr {
  border-top: 1px solid #C1C3D1;
  border-bottom-: 1px solid #C1C3D1;
  color:#666B85;
  font-size:16px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}

tr:hover td {
  background:#4E5066;
  color:#FFFFFF;
  border-top: 1px solid #22262e;
}

tr:first-child {
  border-top:none;
}

tr:last-child {
  border-bottom:none;
}

tr:nth-child(odd) td {
  background:#EBEBEB;
}

tr:nth-child(odd):hover td {
  background:#4E5066;
}

tr:last-child td:first-child {
  border-bottom-left-radius:3px;
}

tr:last-child td:last-child {
  border-bottom-right-radius:3px;
}

td {
  background:#FFFFFF;
  padding:20px;
  text-align:left;
  vertical-align:middle;
  font-weight:300;
  font-size:18px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}

td:last-child {
  border-right: 0px;
}

th.text-left {
  text-align: left;
}

th.text-center {
  text-align: center;
}

th.text-right {
  text-align: right;
}

td.text-left {
  text-align: left;
}

td.text-center {
  text-align: center;
}

td.text-right {
  text-align: right;
}

</style>