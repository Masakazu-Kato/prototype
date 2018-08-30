<?php
namespace App\Library\ORM;

class Table extends \Cake\ORM\Table
{
    protected static $_translationTable = [];
    public static function __($name)
    {
        return static::$_translationTable[$name] ?? $name;
    }
}