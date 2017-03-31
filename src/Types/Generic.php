<?php

namespace Ampersa\Meta\Types;

class Generic implements Type
{
    /**
     * @inheritdoc
     */
    public function tag()
    {
        return sprintf('<meta name="%s" content="%s">', $this->name, $this->content);
    }
}
