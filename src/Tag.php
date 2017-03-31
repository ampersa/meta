<?php

namespace Ampersa\Meta;

use Ampersa\Meta\Types\Type;
use InvalidArgumentException;

class Tag
{
    protected $tag;

    public function __construct(string $class, array $params)
    {
        if (!class_exists($class)) {
            $class = sprintf('\Ampersa\Meta\Types\%s', ucfirst($class));
            if (!class_exists($class)) {
                throw new InvalidArgumentException(sprintf('%s does not exist', $class));
            }
        }

        $this->tag = new $class(...$params);
    }

    /**
     * Call the tags tag() function
     * @return string
     */
    public function tag()
    {
        return call_user_func([$this->tag, 'tag']);
    }
}
