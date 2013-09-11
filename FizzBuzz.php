<?php
/**
 * FizzBuzz is a simple game where taking turns and counting up, players must substitute numbers
 * divisible by 3 with the word Fizz
 * divisible by 5 with the word Buzz
 * divisble by 3 and 5 with FizzBuzz
 *
 */

namespace FizzBuzz;


class FizzBuzz {

    public function constructor() {}


    /**
     * Part one asked you to write a function to test for Fizz responses only
     * @param $i
     * @return string
     */
    public function fizz($i) {
        if($i % 3 ==0) {
            return 'fizz';
        }
        return $i;
    }


    /**
     * Part two (A)  - asked you to write a function to test for Buzz responses
     * @param $i
     * @return string
     */
    public function buzz($i) {
        if($i % 5 ==0) {
            return 'buzz';
        }
        return $i;
    }

    /**
     * Part two (B) - you could build upon part one. Remeber TDD is about writing minimal code
     * @param $i integer
     * @return mixed
     */
    public function FizzOrBuzz($i)
    {
        if($i % 3 == 0) {
            return 'fizz';
        } else if($i % 5 == 0) {
            return 'buzz';
        }
        return $i;
    }


    /**
     * By now you can see we can simply build up and add another if else, or case statement, depending on
     * your preference for differentiating the possible outcomes
     *
     * Again writing the minimum to pass the test - we might get this
     * Which still works for Fizz OR Buzz BUT for FizzBuzz the first if statement would evaluate as true and return 'fizz'
     * Thus failing the test.
     *
     * So we need more code...
     */
    public function Fizz_Or_Buzz_Or_FizzBuzz($i) {

        if( $i % 3 == 0  ) {
            return 'fizz' ;
        } elseif ( $i % 5 == 0  )  {
            return 'buzz' ;
        } else if ($i % 5 == 0 && $i % 3 == 0 ) {
            return 'fizzbuzz' ;
        }
        return $i;
    }


    /**
     * This is the combined single function that satisfies all cases
     * Notice how in this version we test divisible by 3 but NOT by 5 for the fizz test, and similarly for the buzz test.
     * @param $i
     * @return string
     */
    public function fizzBuzzGame($i) {
          // Fizz Test
        if( $i % 3 == 0 && $i % 5 != 0 ) {
            return 'fizz' ;

          // Buzz Test
        } elseif ( $i % 5 == 0 && $i % 3 != 0 )  {
            return 'buzz' ;

          // FizzBuzz Test
        } else if ($i % 5 == 0 && $i % 3 == 0 ) {
            return 'fizzbuzz' ;

          // Pass Through unchanged
        } else {
            // N.B. this else is not necessarily required
            // You could simply have the return outside the if else block entirely.
            return  $i ;
        }
    }




    /**
     * The FizzBuzz Challenge is often a programmers interview test
     * Where the interviewee is asked to write code to generate the first 100
     * answers to FizzBuzz
     *
     * simple loop construct to show the first $n FizBuzzes
     */
    public function buildList($n=100) {

        $n = intval($n);
        $i = 1;
        $string = '';
        while($i <= $n) {
            $string.= $i . '. ' . $this->fizzBuzzGame($i).PHP_EOL;

            $i++;
        }

        echo nl2br($string);

    }

}
