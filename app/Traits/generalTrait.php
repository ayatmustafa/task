<?php
namespace App\Traits;


trait generalTrait
{
    public function getClassName()
    {
        return  "Hello;  My Path is " .get_class($this) ;
    }
}
?>
