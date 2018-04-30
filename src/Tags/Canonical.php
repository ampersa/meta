<?php

namespace Ampersa\Meta\Tags;

class Canonical extends Generic
{
    /** @var bool  Whether this tag must be unique in the output */
    protected $unique = false;

    /**
     * @inheritdoc
     */
    public function tag()
    {
        return sprintf('<link rel="canonical" href="%s">', $this->content['content']);
    }
}
