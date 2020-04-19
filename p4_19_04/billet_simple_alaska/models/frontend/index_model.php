<?php
function finishOnWord($string, $limit, $stop=" ")
{
  // return with no change if string is shorter than $limit
  if(strlen($string) <= $limit) return $string;

  // is $stop present between $limit and the end of the string?
  if(false !== ($stoppoint = strpos($string, $stop, $limit))) {
    if($stoppoint < strlen($string) - 1) {
      $string = substr($string, 0, $stoppoint);
    }
  }

  return $string;
}