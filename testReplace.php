<?php

require_once (__DIR__. '/../replace.php');

class testReplace extends \PHPUnit\Framework\TestCase {

    /**
      * @dataProvider dataProvider
      */
    function test($params) {
         $fileReplaceArray = new fileReplaceArray();
         $return = $fileReplaceArray->doActionSpecifiekeBestanden($params['replace']);

         foreach ($params['replace'] as $oudewaarde => $nieuwewaarde) {
            $this->assertTrue(strpos($return, $oudewaarde)     == False);
            $this->assertFalse(strpos($return, $oudewaarde)    == True);
         }
    }

    function dataProvider() {
         $param1 = [] ;
         $param1['replace'] = [
                              'oudewaarde' => 'nieuwewaarde' , 
         ];

           return [
               [$param1]
           ];
      }
  }
