<?php

use Ampersa\Meta\Meta;
use Ampersa\Meta\Tags\Title;
use Ampersa\Meta\Tags\Generic;

class MetaTest extends PHPUnit_Framework_TestCase
{
    public function testMetaSets()
    {
        $meta = new Meta;
        $meta->set('title', 'This is a test title');
        $meta->set('test', 'value');

        $this->assertEquals([
            new Title(['tag' => 'title', 'content' => 'This is a test title']),
            new Generic(['tag' => 'test', 'content' => 'value']),
        ], array_values($meta->all()));
    }

    public function testMetaOutputs()
    {
        $meta = new Meta;
        $meta->set('title', 'This is a test title');
        $meta->set('test', 'value');

        $this->assertEquals('<title>This is a test title</title>'."\n".'<meta name="test" content="value">', $meta->output());
    }

    public function testMetaSetsViaArray()
    {
        $meta = new Meta;
        $meta->set([
            'title' => 'This is a test title',
            'key' => 'value',
        ]);

        $this->assertEquals('<title>This is a test title</title>'."\n".'<meta name="key" content="value">', $meta->output());
    }

    public function testMetaSetsViaConstructor()
    {
        $meta = new Meta([
            'title' => 'This is a test title',
            'key' => 'value',
        ]);

        $this->assertEquals('<title>This is a test title</title>'."\n".'<meta name="key" content="value">', $meta->output());
    }

    public function testArrayBasedMetaOG()
    {
        $meta = new Meta;
        $meta->set('og', [
            'url' => 'https://test.com',
            'image' => 'prettyPicture.png',
            'image:width' => '500',
            'image:height' => '300',
            'title' => 'A lovely Facebook post',
        ]);

        $this->assertEquals('<meta property="og:url" content="https://test.com">'."\n".'<meta property="og:image" content="prettyPicture.png">'."\n".'<meta property="og:image:width" content="500">'."\n".'<meta property="og:image:height" content="300">'."\n".'<meta property="og:title" content="A lovely Facebook post">', $meta->output());
    }

    public function testArrayBasedMetaTwitter()
    {
        $meta = new Meta;
        $meta->set('twitter', [
            'card' => 'summary',
            'site' => '@AmpersaUK',
            'title' => 'Meta tags'
        ]);

        $this->assertEquals('<meta name="twitter:card" content="summary">'."\n".'<meta name="twitter:site" content="@AmpersaUK">'."\n".'<meta name="twitter:title" content="Meta tags">', $meta->output());
    }

    public function testFaviconOutputsCorrectResult()
    {
        $meta = new Meta;
        $meta->set('favicon', '/favicon.ico');

        $this->assertEquals('<link rel="shortcut icon" href="/favicon.ico">', $meta->output());
    }

    public function testTagCanBeOverloaded()
    {
        $meta = new Meta;
        $meta->set('favicon', '/favicon.ico');
        $meta->set('favicon', '/overloaded.ico');

        $this->assertEquals('<link rel="shortcut icon" href="/overloaded.ico">', $meta->output());
    }

    public function testTagCanBeDuplicatedWhereSet()
    {
        $meta = new Meta;
        $meta->set('canonical', 'Test1');
        $meta->set('canonical', 'Test2');

        $this->assertEquals('<link rel="canonical" href="Test1">'."\n".'<link rel="canonical" href="Test2">', $meta->output());
    }
}
