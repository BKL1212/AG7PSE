<?php
session_start();
require_once "inc/config.inc.php";
require_once "inc/functions.inc.php";
include "templates/header.inc.php"
?>
<script type="text/javascript">
var ajaxEvents = null;
</script>
<link href='fullcalendar.min.css' rel='stylesheet' />
<link href='css/style.css' rel='stylesheet' />

<script src='fullcalendarwithoutdelete.js'></script>
<script src='jquery.min.js'></script>
<script src='de.js'></script>

<script src='webworker.js'></script>


<script>

var jData;

//von datei ziehen
$.ajax({
  url: "events.json",
  success: function(data) {

    //parsen
    jData = data;
    var jsonString = JSON.stringify(jData);
    var jsonArray = JSON.parse(jsonString);

    console.log("JSON ARRAY AUS events.json: \n");

    console.log(jsonArray);
    // in javascript heutiges Datum

const heute = new Date();
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      defaultDate: heute,
      navLinks: true, 
      selectable: false,
      selectMirror: true,
      select: function(arg) {
        var title = prompt('Termin:');
        if (title) {
          calendar.addEvent({
            title: title,
            start: arg.start,
            end: arg.end,
            allDay: arg.allDay
          })
        }
        calendar.unselect()
      },
      editable: true,
      eventLimit: true, 
      events: jsonArray
    });

    calendar.render();
  });

  }
});

</script>

<style>

  body {
    margin: 80px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
</head>
<body>
   <!-- <form method="post" action="send_email.php">
<label for="Name"><b>Name:</b></label><br>
<input type="text" id="Name" name="Name"><br><br>

<label for="Email"><b>E-Mail:</b></label><br>
<input type="text" id="Email" name="Email"><br><br>

<label for="Betreff"><b>Betreff:</b></label><br>
<input type="text" id="Betreff" name="Betreff"><br><br>

<label for="Nachricht"><b>Nachricht:</b></label><br>
<textarea id="Nachricht" name="Nachricht" rows="10" cols="50"></textarea> <br><br>

<input type="submit" name="submit">

</form>

<a href="mailto:sam.096@hotmail.de, barkin_baksel@outlook.de">email abschicken</a>
-->

  <div   id='calendar'></div>
<br>
<button id="myBtn" style="width:100%; height:50px; background-color:green; color:white; font-size: 25px;">Termin vereinbaren</button>
<br><br><br>


  <style>
    body {font-family: Arial, Helvetica, sans-serif;}

    /* The Modal (background) */
    .modal {
        display: none; 
        position: fixed;
        z-index: 1; 
        left: 0;
        top: 0;
        width: 100%; 
        height: 100%; 
        overflow: auto; 
        background-color: rgb(0,0,0); 
        background-color: rgba(0,0,0,0.4);
        -webkit-animation-name: fadeIn;
        -webkit-animation-duration: 0.4s;
        animation-name: fadeIn;
        animation-duration: 0.4s
    }

    /* Modal Content */
    .modal-content {
        position: fixed;
        bottom: 0;
        background-color: #fefefe;
        width: 100%;
        height: 100%;
        -webkit-animation-name: slideIn;
        -webkit-animation-duration: 0.4s;
        animation-name: slideIn;
        animation-duration: 0.4s
    }

    /* The Close Button */
    .close {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-header {
        padding: 2px 16px;
        background-color: #5cb85c;
        color: white;
    }

    .modal-body {padding: 2px 16px;}

    .modal-footer {
        padding: 2px 16px;
        background-color: #5cb85c;
        color: white;
    }

    /* Add Animation */
    @-webkit-keyframes slideIn {
        from {bottom: -300px; opacity: 0}
        to {bottom: 0; opacity: 1}
    }

    @keyframes slideIn {
        from {bottom: -300px; opacity: 0}
        to {bottom: 0; opacity: 1}
    }

    @-webkit-keyframes fadeIn {
        from {opacity: 0}
        to {opacity: 1}
    }

    @keyframes fadeIn {
        from {opacity: 0}
        to {opacity: 1}
    }
    </style>
    </head>


    <!-- The Modal -->
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <span class="close">&times;</span>
          <h2>Gewünschten Termin als Nachricht eintragen bitte</h2>
        </div>
        <div class="modal-body">
          <div> <a id="4ea0672fd32e34b5d8ee34ed0995934a" href="http://www.gratis-kontaktformular.de">gratis-kontaktformular.de</a><script src="https://www.gratis-kontaktformular.de/formular.php?i=4ea0672fd32e34b5d8ee34ed0995934a" type="text/javascript"></script></div>

        </div>
        <div class="modal-footer">
          <h3>Coaching by Ines</h3>
        </div>
      </div>

    </div>


      

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">


        <h1>Keine Logindaten?</h1>
        <p>Einfach registrieren und einloggen bitte!




        </p>
        <p><a class="btn btn-primary btn-lg" href="register.php" role="button">Jetzt registrieren</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Features (November 2018)</h2>
          <ul>
          	<li>Front End Termin Kalender</li> 
          	<li>Termin Anfrage per Email (vorerst extern)</li>
          	<li>Neues Zusenden eines Passworts</li>
          	<li>Responsive Webdesign</li>
          </ul>
         
        </div>
        <div class="col-md-4">
          <h2>Features (Dezember 2018)</h2>
          <p> PHP Login</p>
          <p> Selectable Boolean (Kunden ohne bearbeiten, Admin mit bearbeiten)</p>
          <p> Sicheres PW</p>
          <p> JSON Format Parsen</p>
          <p> Terminanfrageperemail debuggen</p>

       </div>
        <div class="col-md-4">
          <h2>Januar</h2>
          <p>Speichern der Events in JSON Events Datei </p>
          <p>Löschen der Events in JSON Events Datei </p>
           <p> Email  </p>
           <p>testen </p>



          
          
        </div>
      </div>
	</div> <!-- /container -->


    

    <script>
    $('#save').click(function () {

      var jArray = createJsonArray(ajaxEvents);

     

                    /*FRAU SCHÖNBRUNN BEANTWORTET DIE MAILS IMMER MIT NUMMERN WELCHE SIE DANN EINTRÄGT*/ 

    });

   
    // kiregen modal
    var modal = document.getElementById('myModal');

    // knopf 
    var btn = document.getElementById("myBtn");

    
    var span = document.getElementsByClassName("close")[0];

    
    btn.onclick = function() {
        modal.style.display = "block";
    }

    
    span.onclick = function() {
        modal.style.display = "none";
    }

    
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>



