<!-- Creating an instance -->

<?php

// $instance = new SimpleClass();

// $className = 'SimpleClass';
// $instance = new $className();


// #example 4 

// Creating an instance using arbitrary expression

class ClassA extends \stdClass{}
class ClassB extends \stdClass{}
class ClassC extends ClassB{}
class ClassD extends ClassA{}

function getSomeClass(): string
{
    return 'ClassA';
}

var_dump(new(getSomeClass()));
var_dump(new('Class' . 'B'));
var_dump(new('Class' . 'C'));
var_dump(new(ClassD::class));