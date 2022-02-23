  <?php

  require_once (__DIR__. '/../bestandLezen.php');

>>class testBestandLezen extends \PHPUnit\Framework\TestCase {

      /**
       * @dataProvider dataProvider1
       */
     function test ($params) {
           $bestandLezen = new Lezen();
           $return = $bestandLezen->doAction($params['bestandNaam']);
           //echo $return;  die();

>>         $this->assertTrue(strpos($return , $params['correct']) !== false );
>>         $this->assertFalse(strpos($return , $params['nietCorrect']) !==false );
     }

     function dataProvider1() {
          $param1                 = [] ;
          $param1['bestandNaam']  = 'bestandLezen.txt';
          $param1['correct']      = 'De PvB is een praktijkexamen';
          $param1['nietCorrect']  = 'De P..vB is e..en praktij..kexamen..';


          $param2                 = [];
          $param2['bestandNaam']  = 'bestandLezen.txt';
          $param2['correct']      = 'De onderwijsinstelling maakt over';
          $param2['nietCorrect']  = 'De o..nderwij..sinstelling ..maakt nie..t over';

          return [
              [$param1],
              [$param2]
          ];
     }
  }
