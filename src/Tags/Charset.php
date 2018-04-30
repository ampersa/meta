<?php

namespace Ampersa\Meta\Tags;

class Charset extends Generic
{
    /** @var bool  Whether this tag must be unique in the output */
    protected $unique = true;

    /**
     * @inheritdoc
     */
    public function tag()
    {
        return sprintf('<meta charset="%s">', $this->content['content']);
    }
}
