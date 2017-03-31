<?php

namespace Ampersa\Meta\Types;

class Description implements Type
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
        return sprintf('<meta itemprop="description" name="description" content="%s">', $this->content);
    }
}
