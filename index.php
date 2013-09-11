<?php
require "FizzBuzz.php";
/**
 * simple tester of the FizzBuzz class
 */
use \FizzBuzz\FizzBuzz  ;

$oFB = new \FizzBuzz\FizzBuzz();
$oFB->buildList(100);
