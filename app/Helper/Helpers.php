<?php 
 namespace App\Helper;

 class Helpers {

    public static function getunlimitedTestAttempt($attempt)
    {
        $html = "";
        if($attempt == 1){            
            $html = "<label class='badge badge-success'>Yes</label>";
        }else{
            $html = "<lable class='badge badge-primary'>No</lable>";
        }
        return $html;
    }
    
 }
 



?>