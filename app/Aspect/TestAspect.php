<?php

declare(strict_types=1);

namespace App\Aspect;

use Hyperf\Di\Annotation\Aspect;
use Hyperf\Di\Aop\AbstractAspect;
use Psr\Container\ContainerInterface;
use Hyperf\Di\Aop\ProceedingJoinPoint;

/**
 * @Aspect
 */
class TestAspect extends AbstractAspect
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function process(ProceedingJoinPoint $proceedingJoinPoint)
    {
        return $proceedingJoinPoint->process();
    }
}
