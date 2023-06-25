<pre>
<?php

$line = 'Student, hello!';
$control = [];
$lenghtOfLine = strlen($line);

for ($i = 1; $i <= $lenghtOfLine; $i++) {
    $tmp = substr($line, strlen($line) - 1);
    $line = substr($line, 0, -1);
    $control[$tmp]++;
}

var_dump($control);

?>
</pre>
