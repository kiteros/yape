<?php
//String cutting function
//Return the string after an other in a moter string
function after ($this, $inthat)
{
    if (!is_bool(strpos($inthat, $this))){
      return substr($inthat, strpos($inthat,$this)+strlen($this));
    }
}
?>
