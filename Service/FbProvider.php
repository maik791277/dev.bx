<?php

namespace Service;

use Adapter\FacebookAdvertisementProviderAdapter;
use Entity\Advertisement;
use Entity\AdvertisementResponse;
use FbExternal\FbAdvertisementResult;
use Service\Formatting\Formatter;

class FbProvider extends AbstractAdvertisementProvider
{

	private $fbAdapter;

	public function __construct(Formatter $formatter, FacebookAdvertisementProviderAdapter $fbAdapter)
	{
		parent::__construct($formatter);
		$this->fbAdapter=$fbAdapter;
	}

	public function publication(Advertisement $advertisement): AdvertisementResponse
	{
		$advertisement->setBody($this->formatter->format($advertisement->getBody()));
		echo $advertisement->getBody()."\n";
		return $this->fbAdapter->publication($advertisement);
	}

	public function prepare(Advertisement $advertisement): Advertisement
	{
		return $this->fbAdapter->prepare($advertisement);
	}

	public function check(Advertisement $advertisement): bool
	{
		return $this->fbAdapter->check($advertisement);
	}

	public function calculateDuration(Advertisement $advertisement): float
	{
		return $this->fbAdapter->calculateDuration($advertisement);
	}
}