<?php

require_once (__DIR__ . '/../search.php');

class testSearch extends \PHPUnit\Framework\TestCase {

    /**
     * @dataProvider dataProvider1
     */
    function test($parms) {
        $search = new  searchVariabels();
        $return = $search->doActionVariables($parms['search']);

        $this->assertTrue(strpos($return,$parms['search'])  ==  True );
        $this->assertFalse(strpos($return,$parms['search']) ==  False );
    }

    function dataProvider1() {
        $parms['search']=" ";
        return [
                [$parms]
               ];
    }
}