<?php

require_once (__DIR__. '/../fileReplaceArray.php');

class testFileReplaceArray extends \PHPUnit\Framework\TestCase {

    /**
      * @dataProvider dataProvider
      */
    function test ($params) {
         $fileReplaceArray = new fileReplaceArray();
         $return = $fileReplaceArray->doActionMultiple($params['oudeBestand'], $params['replace'],$params['nieuweBestand']);

         foreach ($params['replace'] as $oudewaarde => $nieuwewaarde) {
            $this->assertTrue(strpos($return, $oudewaarde)   == False);
            $this->assertFalse(strpos($return, $oudewaarde)  == True);
         }
    }

    function dataProvider() {
         $param1 = [] ;
         $param1['oudeBestand']  = 'bestandLezen.txt';
         $param1['replace']      = [
             'a' => 'A' ,
             'b' => 'B' ,
             'c' => 'C' ,
             'd' => 'D' ,
             'e' => 'E' ,
             'f' => 'F' ,
             'g' => 'G' ,
             'h' => 'H' ,
             'i' => 'I' ,
             'j' => 'J' ,
             'k' => 'K' ,
             'l' => 'L' ,
             'm' => 'M' ,
             'n' => 'N' ,
             'o' => 'O' ,
             'p' => 'P' ,
             'q' => 'Q' ,
             'r' => 'R' ,
             's' => 'S' ,
             't' => 'T' ,
             'u' => 'U' ,
             'v' => 'V' ,
             'w' => 'W' ,
             'x' => 'X' ,
             'y' => 'Y' ,
             'z' => 'Z' ,
         ];
         $param1['nieuweBestand']= 'fileReplace.txt' ;

         return [
             [$param1]
         ];
    }
}