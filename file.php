<?php
class File
{
  public $filename = 'db.txt';
  public $content = 'doopdeet';
  public function __destruct()
  {
    file_put_contents($this->filename,$this->content);
  }
}
$o = unserialize($_GET['u']);
?>