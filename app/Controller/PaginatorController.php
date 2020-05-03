<?php

declare(strict_types=1);

namespace App\Controller;

use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\Paginator\Paginator;


/**
 * @AutoController("page")
 */
class PaginatorController
{
    public function page(RequestInterface $request)
    {
        $currentPagepage = intval($request->input('page',1));
        var_dump($currentPagepage);
        $perPage = intval($request->input('size',2));
        var_dump($perPage);
        $data = [
            ['id'=>1,'user'=>'luo1'],
            ['id'=>2,'user'=>'luo2'],
            ['id'=>3,'user'=>'luo3'],
            ['id'=>4,'user'=>'luo4'],
            ['id'=>5,'user'=>'luo5'],
            ['id'=>6,'user'=>'luo6'],
            ['id'=>7,'user'=>'luo7'],
            ['id'=>8,'user'=>'luo8'],
        ];

        $paginator = new Paginator($data,$perPage,$currentPagepage);

        $data = 1;

        return [
            'paginator'=>$paginator,
            'data'=>$data,
        ];
    }
}
