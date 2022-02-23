<?php

require_once (__DIR__. '/../optellensoumaia.php');

class optellenSoumaia extends \PHPUnit\Framework\TestCase {

   /**
   * @dataProvider dataProvider1
    */

    function test($params) {


        $optellensoumaia = new OptellenS();

        $return          = $optellensoumaia->doAction($params["num1"] , $params["num2"]);


        $this->assertTrue($return == "sum" .$params["sum"]);
        $this->assertFalse($return == "sum xxx ");

    }
function dataProvider1(){

    $params1 = [];
    $params1["num1"] = 24 ;
    $params1["num2"] = 2 ;
    $params1["sum"] = 26 ;


    $params2 = [];
    $params2["num1"] = 1 ;
    $params2["num2"] = 2 ;
    $params2["sum"] = 3 ;



    return [
             [$params1],
             [$params2]

           ];
        }
   }
