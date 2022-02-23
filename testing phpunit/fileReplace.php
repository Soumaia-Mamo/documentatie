<?php

class fileReplace {
    function doAction(string $oudeBestand, string $oudeString, string $nieuweString, string $nieuweBestand){
        $oudebestand    = file_get_contents(__DIR__ . '/' . $oudeBestand);
        $nieuwebestand  = __DIR__ . '/' . $nieuweBestand;
        $replaceString        = str_replace($oudeString, $nieuweString, $oudebestand);
        file_put_contents($nieuwebestand, $replaceString);
        echo $replaceString; die();
        return $replaceString;
    }
}