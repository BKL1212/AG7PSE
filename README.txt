Es gibt mehrere .txt um alles �bersichtlicher zu gestalten.

Hier eine kurze Erkl�rung wie der haupts�chliche Code funktioniert.
Das Lesen der events ist via ajax 
Der code schickt ne Anfrage zu php mit dem Dateinamen events.json 
Php kann dann die Datei nehmen und ajax �bergeben
Dann hat man quasi die events die mit dem format json bei Events.json stehen durch die json.parse Funktion als javascript Array.
Aus den Daten des Arrays wird der Terminkalender gebaut.

Wenn man auf Speichern dr�ckt
Javascript nimmt das Array und schickt es zu php
Php macht daraus json und �berschreibt das Events.json file mit den neuen Events und somit ist es gespeichert


L�schen
Onclick delete event 
Wenn man drauf klickt startet man die funktion delete event 
Mit confirm Abfrage ja oder nein
Id vom array bzw. Vom Event und der Titel werden der Funktion als Parameter �bergeben
Die Funktion schickt via ajax diese zu deleteEvents.php
Mit php wird das element mit Hilfe der id und des titels gesucht und aus dem Array gel�scht. 
Zuletzt wird dieses Array wieder als json datei encoded und �berschreibt die alte events.json datei, somit ist dieses Event gel�scht.



Die wichtigsten Dateien sind:
deleteeventevent.php --> ist die funktion zum l�schen der Events/Termine
savejsonevents.php --> ist die funktion zum speichern der events somit wird events.json �berschrieben
Events.json --> hier sind im json format alle Events
fullcalendar.css --> die style datei f�r das front end/aussehen des Terminkalenders
fullcalendar.js --> hier sind die js funktionen f�r den Termin Kalender(internal.php greift auf diese funktionen zu)
fullcalenderwithoutdelete.js --> hier rauf greift index.php also die erste seite zu (hier ist kein �ndern/ bearbeiten des Terminkalenders m�glich)
index.php --> die erste seite die man sieht (termin kalender ohne bearbeiten und login)
internal.php --> hierauf kommt man wenn man sich erfolgreich eingeloggt hat (hier kann man terminkalender bearbeiten)
login.php --> hier sind die funktionen des login (WICHTIG GUCK GANZ OBEN DA STEHT DASS AUF ZUGRIFF AUF CONFIG.INC.php und functions.php)
logout.php --> diese funktionen werden ausgef�hrt wenn man sich ausloggt
passwortvergessen.php --> funktionen bei klicken von passwort vergessen
passwortzur�cksetzen.php --> funktionen bei klicken passwort zurucksetzen
register.php --> zum registrieren die datei
settings.php --> ist nicht so wichtig (wenn man eingeloggt ist kann man hier die user daten �ndern)
webworker.js --> nicht wichtig wird eigebtlich online abgerufen habe es aber lokal gespeichert damit es schneller aufgerufen werden kann. ist vorgegeben im template

