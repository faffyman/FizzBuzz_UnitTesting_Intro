<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 11/09/2013
 * Time: 22:21
 */

namespace FizzBuzz\tests;
require_once '/Users/tim/PhpstormProjects/FizzBuzz/FizzBuzz.php';

class FizzBuzzTest extends \PHPUnit_Framework_TestCase {


    public function testPHpUnit()
    {
        $this->assertTrue(true,'Ooops, false ain\'t true');
    }


    /**
     * @expectedExceptionCode 500
     * @expectedExceptionMessage "Holy moley what happened Batman!"
     */
    public function testFizz()
    {
       $val = 3;
        $oFB = new \FizzBuzz\FizzBuzz();
        $this->assertEquals(  $oFB->fizzBuzzGame($val) ,'fizz');

    }



    /**
     * @expectedExceptionCode 500
     * @expectedExceptionMessage "Holy moley what happened Batman!"
     */
    public function testBuzz()
    {
        $val = 5;
        $oFB = new \FizzBuzz\FizzBuzz();
        $this->assertEquals(  $oFB->fizzBuzzGame($val) ,'buzz');

    }



    /**
     * @expectedExceptionCode 500
     * @expectedExceptionMessage "Holy moley what happened Batman!"
     */
    public function testFizzAndBuzz()
    {
        $val = 15;
        $oFB = new \FizzBuzz\FizzBuzz();
        $this->assertEquals(  $oFB->fizzBuzzGame($val) ,'fizzbuzz');

    }




    /**
     * @expectedExceptionCode 500
     * @expectedExceptionMessage "Holy moley what happened Batman!"
     */
    public function testNoFizzOrBuzz()
    {
        $val = 1;
        $oFB = new \FizzBuzz\FizzBuzz();
        $this->assertEquals(  $oFB->fizzBuzzGame($val) ,'1');

    }


    /**
     * @dataProvider fizzbuzzDataProvider
     * @expectedExceptionMessage FizzBuzz Failure
     */
    public function testFizzBuzz($val,$expected)
    {

        $oFB = new \FizzBuzz\FizzBuzz();
        $this->assertEquals($oFB->fizzBuzzGame($val),$expected);

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
 