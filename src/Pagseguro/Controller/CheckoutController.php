<?php
namespace Pagseguro\Controller;

use CodeRockr\Controller\AbstractController;

class CheckoutController extends AbstractController
{
    /**
     * Index page
     * @return text
     */
    public function post()
    {
        return '<?xml version="1.0" encoding="ISO-8859-1"?>  
        <checkout>  
            <code>8CF4BE7DCECEF0F004A6DFA0A8243412</code>  
            <date>2010-12-02T10:11:28.000-02:00</date>  
        </checkout>';
    }
}