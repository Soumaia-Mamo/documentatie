<?php

require_once (__DIR__. '/../fileReplace.php');

class testFileReplace extends \PHPUnit\Framework\TestCase {

    /**
      * @dataProvider dataProvider
      */
    function test ($params) {
         $fileReplace = new fileReplace();
         $return  = $fileReplace->doAction($params['oudeBestand'], $params['oudeString'],$params['nieuweString'],$params['nieuweBestand']);      
        // echo $return ; die();
         $this->assertTrue(strpos($return, $params['oudeString'])  == false);
         $this->assertFalse(strpos($return, $params['oudeString']) == true);
    }

    function dataProvider() {
         $param1 = [] ;
         $param1['oudeBestand']  = 'bestandLezen.txt';
         $param1['oudeString']   = 'examen';
         $param1['nieuweString'] = 'SoumaiaMamo';
         $param1['nieuweBestand']= 'fileReplace.txt' ;

         return [
             [$param1]
         ];
    }
}