<?php

namespace Ampersa\Meta\Types;

class Opengraph implements Type
{
    /** @var array */
    protected $parts = [];

    public function __construct(array $parts)
    {
        $this->parts = $parts;
    }

    /**
     * @inheritdoc
     */
    public function tag()
    {
        $lines = [];
        foreach ($this->parts as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $sKey => $sValue) {
                    $lines[] = $this->buildTag($sKey, $sValue, ['og', $key]);
                }
            } else {
                $lines[] = $this->buildTag($key, $value, 'og');
            }
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
