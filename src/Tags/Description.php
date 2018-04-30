<?php

namespace Ampersa\Meta\Tags;

class Description extends Generic
{
    /** @var bool  Whether this tag must be unique in the output */
    protected $unique = true;

    /**
     * @inheritdoc
     */
    public function tag()
    {
        return sprintf('<meta itemprop="description" name="description" content="%s">', $this->content['content']);
    }
}
