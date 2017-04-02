<?php

namespace Ampersa\Meta\Tags;

class Title implements Tag
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
        return sprintf('<title>%s</title>', $this->content['content']);
    }
}
