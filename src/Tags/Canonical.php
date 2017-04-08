<?php

namespace Ampersa\Meta\Tags;

class Canonical implements Tag
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
        return sprintf('<link rel="canonical" href="%s">', $this->content['content']);
    }
}
