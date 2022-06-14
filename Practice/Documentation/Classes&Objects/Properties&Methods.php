<?php

class foo{
    public $bar = 'property';

    public function bar(){
        return 'method'
    ;}
}

$obj = new foo();
echo $obj->bar, PHP_EOL,$obj->bar(),PHP_EOL;


// Calling an anonymous function stored in the property 

class Too{
        public $af;
        public function __construct() {
            $this->af = function(){
                return 42;
            };
        }
}

$af1 = new Too();
echo ($af1->af)(), PHP_EOL;