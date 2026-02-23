<?php

function dd($value) {
?>
<pre>
<?php 
if(is_array($value))
{
print_r($value);
}
else 
{
var_dump($value); 
}
?>
</pre>
<?php
die;
}

function esc(string $value) {
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}


function url_to($path = "", $param = null) {
    $url = BASE_URL . $path;
    if(!is_null($param)) {
        $url .= "/" . $param;
    }
    return $url;
}





