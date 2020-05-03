<?php


namespace App\Controller;


use Hyperf\Di\Annotation\Inject;

use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\RequestInterface;
use App\Service\UserService;

/**
 * @AutoController()
 */

class TestController
{
    /**
     * @Inject()
     * @var UserService
     */
    public $userService;

    public function index(RequestInterface $request)
    {
        // 从请求中获得 id 参数
        $id = $request->input('id', 1);
        return $this->userService->getInfoById((int)$id);
    }
}