<?php


namespace App\Controller\User;


use App\Controller\AbstractController;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * @AutoController()
 */
class IndexController
{
    public function index()
    {
        return ['aa'=>123];
    }
}