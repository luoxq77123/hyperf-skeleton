<?php


namespace App\Annotation;


use Doctrine\Common\Annotations\Annotation\Target;
use Hyperf\Di\Annotation\AbstractAnnotation;

/**
 * @Annotation()
 * @Target("ALL")
 */
class Bar extends AbstractAnnotation
{
    /**
     * @var string
     */
    public $string;

    /**
     */
    public $string1;

    public function __construct($value = null)
    {
        parent::__construct($value);
        $this->bindMainProperty('string1',$value);
    }

}


/**
 * @Annotation()
 * @Target("CLASS")
 */
class Foo extends AbstractAnnotation
{
    /**
     * @var string
     */

    public $int;

    public function __construct($value = null)
    {
        parent::__construct($value);
    }


}