<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\User;
use Hyperf\DbConnection\Db;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\Paginator\Paginator;
/**
 * @AutoController()
 */
class DbController
{
    public function index(RequestInterface $request, ResponseInterface $response)
    {


        $data = Db::select("select * from user");
       $table = Db::table('user')->pluck('name');
        $raw = Db::raw('count(0) as count');




        return $response->json([
            'limit'=>$limit,
            'data'=>$data,
            'table'=>$table,
            'raw'=>$raw,
        ]);
    }


}
