<?php

declare(strict_types=1);

namespace App\Middleware\Auth;

use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface as HttpResponse;
use Hyperf\Utils\Context;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FooMiddleware implements MiddlewareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    protected $request;

    protected $response;

    public function __construct(ContainerInterface $container,HttpResponse $response,RequestInterface $request)
    {
        $this->container = $container;
        $this->request = $request;
        $this->response = $response;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        //var_dump($request);
        //$request = $request->withAttribute('aa','test');
        //Context::set(ServerRequestInterface::class,$request);
       // var_dump($this->response);
        return $handler->handle($request);

//        return $this->response->json(
//            [
//                'code'=>1,
//                'data'=>[
//                    'error'=>'無效',
//                ]
//            ]
//        );
    }
}