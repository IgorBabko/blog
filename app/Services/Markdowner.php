<?php

namespace Blog\Services;
use Michelf\MarkdownExtra;
use Michelf\SmartyPants;

class Markdowner
{
	public function toHTML($text)
	{
		// $text = $this->preTransformText($text);
		$text = MarkdownExtra::defaultTransform($text);
		$text = SmartyPants::defaultTransform($text);
		// $text = $this->postTransformText($text);
		return $text;
	}

	/**
	* @dataProvider conversionsProvider
	*/
	public function testConversions($value, $expected)
	{
		$this->assertEquals($expected, $this->markdown->toHTML($value));
	}

	public function conversionsProvider()
	{
		return [
			["test", "<p>test</p>\n"],
			["# title", "<h1>title</h1>\n"],
			["Here's Johnny!", "<p>Here&#8217;s Johnny!</p>\n"],
		];
	}
	// protected function preTransformText($text)
	// {
	// 	return $text;
	// }

	// protected function postTransformText($text)
	// {
	// 	return $text;
	// }
}