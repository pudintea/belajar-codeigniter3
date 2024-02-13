<?php

// Check if $myList is indeed an array or an object.
if (is_array($myList) || is_object($myList)) {
  // If yes, then foreach() will iterate over it.
  foreach ($myList as $arrayItem) {
    //Do something.
  }
}

