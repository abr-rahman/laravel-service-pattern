<?php

/**
 * Task 4: Polymorphism
 * Here example is polymorephism
 */
class BaseClass
{
    public function calcTask(){
        return "sound is very Beautiful";
    }
}
/**
 * Task 1: Class Inheritance
 * BaseClass inheritance Bird class
 */
class Bird extends BaseClass
{
    /**
     * Task 3: Encapsulation
     * Encapsulation is done by private key word
     */
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function calcTask()
    {
        return $this->data . 'Bird';
    }
}

class Animal extends BaseClass
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    public function calcTask()
    {
        return $this->data . 'Animal';
    }
}
