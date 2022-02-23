     
<?php

class searchVariabels {

    function doAction(string $filename, string $current, string $replace, string $newfile) {
        $tekst_in_file  = file_get_contents(__DIR__ . '/' . $filename);
        $nieuwe_tekst   = str_replace($current, $replace, $tekst_in_file);
        $nieuwe_file    = __DIR__ . '/' . $newfile;
        file_put_contents($nieuwe_file, $nieuwe_tekst);
        echo $nieuwe_tekst; die();

        return $nieuwe_tekst;
    }

    function doActionMultiple(string $filename, array $changes, string $newfile) {
        $tekst_in_file  = file_get_contents(__DIR__ . '/' . $filename);
        $nieuwe_tekst   = str_replace(array_keys($changes), array_values($changes), $tekst_in_file);
        $nieuwe_file    = __DIR__ . '/' . $newfile;
   file_put_contents($nieuwe_file, $nieuwe_tekst);
        //echo $nieuwe_tekst; die();

        return $nieuwe_tekst;
    }

    function doActionFiles(array $changes) {

        foreach (glob('/var/www/html/manuals/karina/*') as $path_to_file) {
            $tekst_in_file   = file_get_contents($path_to_file);
            $nieuwe_file     = $path_to_file.'.swp';
            $keys            = array_keys($changes);
            $values          = array_values($changes);
            $nieuwe_tekst    = str_replace($keys, $values, $tekst_in_file);
            file_put_contents($nieuwe_file, $nieuwe_tekst);

            //echo $nieuwe_tekst; die();
        }
        return $nieuwe_tekst;
    }

    function doActionFilesMultiple(array $changes) {
        $folder = (__DIR__ . '/karina/');

        if ($dir = opendir($folder)) {
            while (($path_to_file = readdir($dir)) !== false) {
                if (!is_dir($folder.$path_to_file)) {
                        $tekst_in_file  = file_get_contents($folder.$path_to_file);
                        $nieuwe_file    = ($folder.$path_to_file).'.swp' ;
                        $keys           = array_keys($changes);
                        $values         = array_values($changes);
                        $nieuwe_tekst   = str_replace($keys, $values, $tekst_in_file);
                        file_put_contents($nieuwe_file, $nieuwe_tekst);
                }
            }
            return $nieuwe_tekst;
            closedir($dir);
        }
    }

    function doActionVariables() {
        $folder = (__DIR__ . '/config/');

        if ($dir = opendir($folder)) {
            while (($path_to_file = readdir($dir)) !== false) {
                if (!is_dir($folder.$path_to_file)) {
                    $begin_variable = 'xxx_';
                    $lines = file($folder.$path_to_file);
                    foreach($lines as $line) {
                            $array_substrings = explode('=', $line);
                            if(count($array_substrings) > 1 && strpos(trim($array_substrings[0]), $begin_variable) !== false) {
                                echo $array_substrings[0] . ' &&& ';
                            }
                    }
                }
            }
             closedir($dir);
        }
    }
}