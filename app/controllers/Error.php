<?php

namespace app\controllers;

class Error extends \app\core\Controller
{
    public function publicationNotOwned()
    {
        $this->view('Error/publicationNotOwned');
    }
    public function commentNotOwned()
    {
        $this->view('Error/commentNotOwned');
    }
}
