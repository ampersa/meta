<?php

namespace Ampersa\Meta\Types;

class Title implements Type
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
        return sprintf('<title>%s</title>', $this->content);
    }
}
