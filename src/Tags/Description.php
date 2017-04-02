<?php

namespace Ampersa\Meta\Tags;

class Description implements Tag
{
    /** @var array */
    protected $content = [];

    public function __construct(array $content)
    {
        $this->content = $content;
    }

    /**
     * @inheritdoc
     */
    public function tag()
    {
        return sprintf('<meta itemprop="description" name="description" content="%s">', $this->content['content']);
    }
}
