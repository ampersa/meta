<?php

namespace Ampersa\Meta\Types;

class Viewport implements Type
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
        return sprintf('<meta name="viewport" content="%s">', $this->content);
    }
}
