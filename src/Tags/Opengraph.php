<?php

namespace Ampersa\Meta\Tags;

class Opengraph extends Generic
{
    /** @var bool  Whether this tag must be unique in the output */
    protected $unique = false;

    /**
     * @inheritdoc
     */
    public function tag()
    {
        $lines = [];
        foreach ($this->content['content'] as $key => $value) {
            $lines[] = $this->buildTag($key, $value, 'og');
        }

        return implode("\n", $lines);
    }

    /**
     * Build a valid meta tag, including any parent namespace
     * @param  string       $key
     * @param  string       $value
     * @param  string|array $namespace
     * @return string
     */
    protected function buildTag($key, $value, $namespace = null)
    {
        // Building the FQ value by imploding namespace and value with a colon (:)
        // Namespace may be an array or a string - arrays are also imploded by colon notation
        if (!is_null($namespace)) {
            if (is_array($namespace)) {
                $namespace = implode(':', $namespace);
            }

            $key = sprintf('%s:%s', $namespace, $key);
        }

        return sprintf('<meta property="%s" content="%s">', $key, $value);
    }
}
