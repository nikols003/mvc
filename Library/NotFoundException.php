<?php


class NotFoundException extends Exception
{
    public function __construct($message = "Not found")
    {

        parent::__construct($message, 404);
    }
}