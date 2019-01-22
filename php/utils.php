<?php

// f´Funktionen für Zeitzonen und Einstellungen
date_default_timezone_set('UTC');


class Event {

  const ALL_DAY_REGEX = '/^\d{4}-\d\d-\d\d$/'; 

  public $title;
  public $allDay; // Boolean
  public $start; // Date
  public $end; // Date
  public $properties = array(); // Array


  
  public function __construct($array, $timeZone=null) {

    $this->title = $array['title'];

    if (isset($array['allDay'])) {
      
      $this->allDay = (bool)$array['allDay'];
    }
    else {
      $this->allDay = preg_match(self::ALL_DAY_REGEX, $array['start']) &&
        (!isset($array['end']) || preg_match(self::ALL_DAY_REGEX, $array['end']));
    }

    if ($this->allDay) {
      $timeZone = null;
    }

    // Daten parsen
    $this->start = parseDateTime($array['start'], $timeZone);
    $this->end = isset($array['end']) ? parseDateTime($array['end'], $timeZone) : null;

    foreach ($array as $name => $value) {
      if (!in_array($name, array('title', 'allDay', 'start', 'end'))) {
        $this->properties[$name] = $value;
      }
    }
  }



  public function isWithinDayRange($rangeStart, $rangeEnd) {

    $eventStart = stripTime($this->start);

    if (isset($this->end)) {
      $eventEnd = stripTime($this->end); 
    }
    else {
      $eventEnd = $eventStart; 
    }

    return $eventStart < $rangeEnd && $eventEnd >= $rangeStart;
  }


  public function toArray() {

    $array = $this->properties;

    $array['title'] = $this->title;

    if ($this->allDay) {
      $format = 'Y-m-d'; 
    }
    else {
      $format = 'c'; 
    }

    
    $array['start'] = $this->start->format($format);
    if (isset($this->end)) {
      $array['end'] = $this->end->format($format);
    }

    return $array;
  }

}

//parst einen string in datenzeit und gibt in zeitzonen weiter

function parseDateTime($string, $timeZone=null) {
  $date = new DateTime(
    $string,
    $timeZone ? $timeZone : new DateTimeZone('UTC')
    
  );
  if ($timeZone) {
    $date->setTimezone($timeZone);
  }
  return $date;
}



function stripTime($datetime) {
  return new DateTime($datetime->format('Y-m-d'));
}
