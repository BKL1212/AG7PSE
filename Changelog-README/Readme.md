       #Changelog
10.11. - Front End Termin Kalender 
       - Termin Anfrage per Email (vorerst extern)


10.12. - PHP Login
       - Selectable Boolean (Kunden ohne bearbeiten, Admin mit bearbeiten)
       - Sicheres PW
       - JSON Format Parsen
       - Terminanfrageperemail debuggen

15.1.2019
       - Speichern der Events in JSON Events Datei
       - Löschen der Events 
       - Ablauf noch schreiben! Kundennummer per Mail
       

15.01.2019
      - Sicherheitslücke entdeckt und beseitigt --> Sessions eingebaut mit lokal gespeicherten Cookies
      - Securitytoken + Identifier
      - New Date() in JS. Terminkalender ab jetzt immer mit heutiges Datum
      
17.01.2019
      - - Identifikationsnummer bearbeiten könnnen --> lange Liste Datenbank, Bearbeiten, Löschen 
        (Vorteil für Kundin: bessere Übersicht)


      #kurze Erklärung
      
      Hier eine kurze Erklärung wie der hauptsächliche Code funktioniert.
Das Lesen der events ist via ajax 
Der code schickt ne Anfrage zu php mit dem Dateinamen events.json 
Php kann dann die Datei nehmen und ajax übergeben
Dann hat man quasi die events die mit dem format json bei Events.json stehen durch die json.parse Funktion als javascript Array.
Aus den Daten des Arrays wird der Terminkalender gebaut.

Wenn man auf Speichern drückt
Javascript nimmt das Array und schickt es zu php
Php macht daraus json und überschreibt das Events.json file mit den neuen Events und somit ist es gespeichert


Löschen
Onclick delete event 
Wenn man drauf klickt startet man die funktion delete event 
Mit confirm Abfrage ja oder nein
Id vom array bzw. Vom Event und der Titel werden der Funktion als Parameter übergeben
Die Funktion schickt via ajax diese zu deleteEvents.php
Mit php wird das element mit Hilfe der id und des titels gesucht und aus dem Array gelöscht. 
Zuletzt wird dieses Array wieder als json datei encoded und überschreibt die alte events.json datei, somit ist dieses Event gelöscht.



Die wichtigsten Dateien sind:
deleteeventevent.php --> ist die funktion zum löschen der Events/Termine
savejsonevents.php --> ist die funktion zum speichern der events somit wird events.json überschrieben
Events.json --> hier sind im json format alle Events
fullcalendar.css --> die style datei für das front end/aussehen des Terminkalenders
fullcalendar.js --> hier sind die js funktionen für den Termin Kalender(internal.php greift auf diese funktionen zu)
fullcalenderwithoutdelete.js --> hier rauf greift index.php also die erste seite zu (hier ist kein ändern/ bearbeiten des Terminkalenders möglich)
index.php --> die erste seite die man sieht (termin kalender ohne bearbeiten und login)
internal.php --> hierauf kommt man wenn man sich erfolgreich eingeloggt hat (hier kann man terminkalender bearbeiten)
login.php --> hier sind die funktionen des login (WICHTIG GUCK GANZ OBEN DA STEHT DASS AUF ZUGRIFF AUF CONFIG.INC.php und functions.php)
logout.php --> diese funktionen werden ausgeführt wenn man sich ausloggt
passwortvergessen.php --> funktionen bei klicken von passwort vergessen
passwortzurücksetzen.php --> funktionen bei klicken passwort zurucksetzen
register.php --> zum registrieren die datei
settings.php --> ist nicht so wichtig (wenn man eingeloggt ist kann man hier die user daten ändern)
webworker.js --> nicht wichtig wird eigebtlich online abgerufen habe es aber lokal gespeichert damit es schneller aufgerufen werden kann. ist vorgegeben im template

