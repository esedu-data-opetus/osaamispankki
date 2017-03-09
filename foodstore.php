<?php
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

echo '<response>';
  $food = $_GET['food'];
  $foodArray = array('Pizza','Makkara','Pihvi');
  if (in_array($food,$foodArray))
    echo 'We do have '.$food.'!';
  else if ($food=='')
    echo '-_-';
  else
    echo 'Sorry we do not have '.$food.'!';
echo '</response>';
