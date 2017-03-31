<?php

namespace Ampersa\Meta\Types;

class Httpequiv implements Type
{
    public function __construct($equiv, $content)
    {
        $this->equiv = $equiv;
        $this->content = $content;
    }

    /**
     * @inheritdoc
     */
    public function tag()
    {
        return sprintf('<meta http-equiv="%s" content="%s">', $this->equiv, $this->content);
    }
}
