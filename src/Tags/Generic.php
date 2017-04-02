<?php

namespace Ampersa\Meta\Tags;

class Generic implements Tag
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
        return sprintf('<meta name="%s" content="%s">', $this->content['tag'], $this->content['content']);
    }
}
