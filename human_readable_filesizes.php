<?php

$total = disk_total_space(".");
$free  = disk_free_space(".");

echo "<pre>";
print_r( human_readable_size($total) );
print_r( human_readable_size($free) );

function human_readable_size($raw_size,$return_array = true){
    $size_arr = array("B","KB","MB","GB","TB","PB");
    $max = count($size_arr)-1;
    
    for($i=$max; $i>=0; $i--){
        $value = pow(1024,$i);
        
        if($raw_size > $value){
            $size_hr = round(($raw_size / $value), 2);
            
            return $return_array ? array($size_hr,$size_arr[$i]) : "{$size_hr} {$size_arr[$i]}";
        }
    }
}
