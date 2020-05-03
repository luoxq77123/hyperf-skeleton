<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */



namespace App\Controller;

use App\Annotation\Bar;
use App\Annotation\Foo;
use Hyperf\Config\Annotation\Value;
use Hyperf\Contract\ConfigInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\Utils\Context;
use Psr\Http\Message\ServerRequestInterface;

/**
 * @AutoController()
 * @Foo("app")
 */

class IndexController extends AbstractController
{

    /**
     * @Inject()
     * @var ConfigInterface
     */
    public $config;
    /**
     * @Value("app_names")
     */
    private $config1;
    /**
     *
     */
    public function index(RequestInterface $request,ResponseInterface $response)
    {
        $method = $this->request->getMethod();
        $key = $request->input('aa');
        $all = $request->all();
        $has_array = $request->hasInput(['test','aa']);
        $has_test = $request->has('test');
        $has_aa = $request->has('aa');
        $path = $request->path();
        $url = $request->url();
        $fullUrl = $request->fullUrl();

        return [
            'method'=>$method,
            'key'=>$key,
            'all'=>$all,
            'has_array'=>$has_array,
            'has_test'=>$has_test,
            'has_aa'=>$has_aa,
            'path'=>$path,
            'url'=>$url,
            'fullUrl'=>$fullUrl,

        ];
    }

    /**
     * @GetMapping()
     */
    public function test()
    {
        $user = $this->request->getAttribute('aa', 'Hyperf1');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }

    /**
     * @RequestMapping(path="test1",methods="get,post,delete")
     */
    public function testAction()
    {
        $user = $this->request->input('user', 'Hyperf2');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }


}
