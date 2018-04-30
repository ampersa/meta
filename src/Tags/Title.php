<?php

namespace Ampersa\Meta\Tags;

class Title extends Generic
{
    /** @var bool  Whether this tag must be unique in the output */
    protected $unique = true;

    /**
     * @inheritdoc
     */
    public function tag()
    {
        return sprintf('<title>%s</title>', $this->content['content']);
    }
}
