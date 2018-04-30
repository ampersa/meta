<?php

namespace Ampersa\Meta\Tags;

class Favicon extends Generic
{
    /** @var bool  Whether this tag must be unique in the output */
    protected $unique = true;

    /**
     * @inheritdoc
     */
    public function tag()
    {
        return sprintf('<link rel="shortcut icon" href="%s">', $this->content['content']);
    }
}
