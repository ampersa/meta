<?php

namespace Ampersa\Meta\Types;

class Charset implements Type
{
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * @inheritdoc
     */
    public function tag()
    {
        return sprintf('<meta charset="%s">', $this->content);
    }
}
