<?php

namespace Service\Formatting;

class HeadFormatterDecorator extends BaseFormatterDecorator
{

	public function format(string $text): string
	{
		return "<h1>Это хедр</h1> ".$this->baseFormatter->format($text);
	}
}