<?php

class fileReplaceArray {
    function doActionMultiple(string $oudeBestand, array $replace, string $nieuweBestand){
        $oudebestand   = file_get_contents(__DIR__ . '/' . $oudeBestand);
        $nieuwebestand = __DIR__ . '/' . $nieuweBestand;
        $keys          = array_keys($replace);
        $values        = array_values($replace);
        $replaceString = str_replace($keys, $values, $oudebestand);
        file_put_contents($nieuwebestand, $replaceString);
       // echo $replaceString; die();
        return $replaceString;
    }
}


<?php

class fileReplaceArray {
>>    function doActionMultiple(string $oudeBestand, array $replace, string $nieuweBestand){
       foreach(glob('/var/www/html/manuals/soumaia/*') as $path_to_file) {
         $file_contents = file_get_contents($path_to_file);
         //$oudebestand   = file_get_contents(__DIR__ . '/' . $oudeBestand);
         //$nieuwebestand = __DIR__ . '/' . $nieuweBestand;
         $keys          = array_keys($replace);
         $values        = array_values($replace);
         $replaceString = str_replace($keys, $values, $file_contents);
         file_put_contents($path_to_file, $replaceString);
         // echo $replaceString; die();
       }

        return $replaceString;
    }
}



function doActionFilesMultiple(array $changes) {
    $folder = (__DIR__. '/karina/');
    if ($dir = opendir($folder)) {
        while (($path_to_file = readdir($dir)) !== false) {
            $tekst_in_file = file_get_contents($path_to_file);
            $nieuwe_file = $path_to_file.'.swp';
            $keys = array_keys($changes);
            $values = array_values($changes);
            $nieuwe_tekst = str_replace($keys, $values, $tekst_in_file);
            file_put_contents($nieuwe_file, $nieuwe_tekst);
        }
        return $nieuwe_tekst;
        closedir($dir);
    }
}
}