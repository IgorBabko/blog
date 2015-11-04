<?php

class MarkdownerTest extends TestCase
{
	protected $markdown;

	public function setup()
	{
		$this->markdown = new \Blog\Services\Markdowner();
	}

	public function testSimpleParagraph()
	{
		foreach ($this->markdown->conversionsProvider() as $conversion) {
			$this->assertEquals(
				$conversion[1],
				$this->markdown->toHTML($conversion[0])
			);
		}
	}
}