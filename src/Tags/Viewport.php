<?php

namespace Ampersa\Meta\Tags;

class Viewport extends Generic
{
    /** @var bool  Whether this tag must be unique in the output */
    protected $unique = true;

    /**
     * @inheritdoc
     */
    public function tag()
    {
        return sprintf('<meta name="viewport" content="%s">', $this->content['content']);
    }
}
