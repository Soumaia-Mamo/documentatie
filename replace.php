<?php

class fileReplaceArray {
  function doActionMultipleBestanden(array $replace){
      $folder = (__DIR__.'/foldernaam/');
      if ($dir = opendir($folder)) {
          while(($path_to_file  = readdir($dir)) !== false ) {
             if(!is_dir($folder.$path_to_file)){
                $file_contents    = file_get_contents($folder.$path_to_file);
                //$new_file        = ($folder.$path_to_file).'.swp' ;
                $keys            = array_keys($replace);
                $values          = array_values($replace);
                $replace_contents= str_replace($keys, $values, $file_contents);
                file_put_contents($folder.$path_to_file , $replace_contents);
             }
          }
      return $replace_contents;
      closedir($dir);
     }
  }

  function doActionSpecifiekeBestanden(array $replace){
      $folder = (__DIR__.'/config/');
      $files = glob($folder.'/ex_*');
      foreach($files as $file ){
        $file_contents    = file_get_contents($file);
      //$new_file         = ($file).'.swp' ;
        $keys             = array_keys($replace);
        $values           = array_values($replace);
        $replace_contents = str_replace($keys, $values, $file_contents);
        file_put_contents($file , $replace_contents);
      }
      return $replace_contents;
  }
}
