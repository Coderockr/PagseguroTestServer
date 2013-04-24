<?php
namespace CodeRockr\Controller;

abstract class AbstractController
{
    protected $app;

    public function __construct($app)
    {
        $this->app = $app;
    }
}