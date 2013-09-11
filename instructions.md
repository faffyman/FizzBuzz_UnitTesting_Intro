An Introduction to unit Testing and test driven development
============================================================

You already know roughly what code you are going to write to solve the issue at hand.
So write a test for that issue first, then write the code.

The goal of TDD is to write the test first and then only the minimal code necessary to pass the test.


The FizzBuzz Game
-------------------

FizzBuzz, for those unfamiliar with it is a child's game where players play in a round.
Starting at 1 an incrementing with each player.

- If the number is divisible by 3 - the player says "Fizz"
- If the number is divisible by 5 - the player says "Buzz"
- If the number is divisible by both 3 and 5 - the player says "FizzBuzz"
- Otherwise the player simply says the number

###  Example

1, 2, `fizz`, 4, `buzz`, `fizz`, 7, 8, `fizz`, `buzz`, 11, `fizz`, 13, 14, `fizzbuzz`


Your Tasks
------------

* Write a test to see if a number returns Fizz
* *  Run the test with a valid option, i.e. 3 - it should fail
* *  Now write the code/function to to pass the test
* *  Now re-run the test with an invalid option to ensure in correctly fails

create public function called testFizz();
it should call a function in your own class which tests if a number is divisible by three.
If it is divisible by three, that function should return 'fizz'

* Write a test to see if a number returns Buzz
* *  Run the test with a valid option, i.e. 5 - it should fail
* *  Now write the code/function to to pass the test
* *  Now re-run the test with an invalid option to ensure in correctly fails

create public function called testBuzz();
it should call a function in your own class which tests if a number is divisible by five.
If it is divisible by five, that function should return 'buzz'

* Write a test to see if a number returns FizzBuzz
* *  Run the test with a valid option, i.e. 15 - it should fail
* *  Now write the code/function to to pass the test
* *  Now re-run the test with an invalid option to ensure in correctly fails

create public function called testFizzAndBuzz();
it should call a function in your own class which tests if a number is divisible by three and five.
If it is divisible by three AND five, that function should return 'fizzbuzz'

* Write a test to see if a number returns the same number rather than Fizz or Buzz
* *  Run the test with a valid option, i.e. 1 - it should fail
* *  Now write the code/function to to pass the test
* *  Now re-run the test with an invalid option to ensure in correctly fails

create public function called testNoFizzOrBuzz();
it should call a function in your own class which tests if a number is not divisible by three or five.
If it is not divisible by three OR five, that function should return the same numeric input


Getting more complex
----------------------

### DataProviders


A DataProvider is simply a function which returns an array of arrays,
where each row in the array represents the parameters required by your test function.
using data providers you can run a single testfunction multiple times passing in different values each time.


Whereas so far we created multiple test functions which themselves called multiple functions, we could use this
approach to have a single test function which in turn calls a single function.

A data provider is specified in the docBlock comments

####  example

```
/**
 * @dataProvider fizzBuzzProvider
 */
public function testFizzBuzz($input, $expectedvalue) {

  $returned = fizzbuzzFunctionBeingTested($input);
  $this->assertEquals($input,$expectedvalue);

}


/**
 * This is the dataprovider. you can see hw each row in the array is a pair of parameters for our test function
 */
public function fizzBuzzProvider() {
   return array(
     array(1,1),
     array(3,'fizz')
   );
}```



This time, using a data provider, write a singe function called FizzBuzz() which will satisfy all tests.


There is no right answer to this, your code can be procedural, or OOP classes.
It really doesn't matter so long as you satisfy the tests.











Suggested Solution - Tests
----------------------------
```<?php

require_once '../FizzBuzz.php';

class FizzBuzzTest extends PHPUnit_Framework_TestCase {



    /**
     * test for Fizz response
     */
    public function testFizz()
    {
       $val = 3;
        $oFB = new FizzBuzz();
        $this->assertEquals(  $oFB->fizz_or_buzz($val) ,'fizz');

    }



    /**
     * test for Buzz Response
     */
    public function testBuzz()
    {
        $val = 5;
        $oFB = new FizzBuzz();
        $this->assertEquals(  $oFB->fizz_or_buzz($val) ,'buzz');

    }



    /**
     * Test for fizzbuzz for a number divisible by 3 and 5 e.g. 15
     */
    public function testFizzAndBuzz()
    {
        $val = 15;
        $oFB = new FizzBuzz();
        $this->assertEquals(  $oFB->fizz_or_buzz($val) ,'fizzbuzz');

    }




    /**
     * test for a non divisible number.
     */
    public function testNoFizzOrBuzz()
    {
        $val = 1;
        $oFB = new FizzBuzz();
        $this->assertEquals(  $oFB->fizz_or_buzz($val) ,'1');

    }


// OK - now we come to the good it, using a data provider to allow us to run a batch of tests
// Through a single test function
// You can even put in a pair of values that you know will fail

    /**
     * @dataProvider fizzbuzzDataProvider
     * @expectedExceptionMessage FizzBuzz Failure
     */
    public function testFizzBuzz($val,$expected)
    {

        $oFB = new FizzBuzz();
        $this->assertEquals($oFB->fizz_or_buzz($val),$expected);

    }


    public function fizzbuzzDataProvider() {

        return array(
            array('1', '1'),
            array('2', '2'),

            array('3', 'fizz'),
            array('4', '4'),
            array('5', 'buzz'),
            array('15', 'fizzbuzz'),


        );

    }

}
```


Suggest Solution - FizzBuzz Class
-----------------------------------
```
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
    public function buildLIst($n=100) {

        $n = intval($n);

        while($i < $n) {
            echo $i . '. ' . $this->fizz_or_buzz($i).PHP_EOL;

            $i++;
        }

    }

}

```