<?php

namespace Adapter;

use Entity\Advertisement;
use Entity\AdvertisementResponse;
use FbExternal\FbAdvertisement;
use FbExternal\FbPublicator;
use Service\AdvertisementProviderInterface;

class FacebookAdvertisementProviderAdapter implements AdvertisementProviderInterface
{

	public function publication(Advertisement $advertisement): AdvertisementResponse
	{
		$fbAdvertisement = new FbAdvertisement();
		$fbAdvertisement->setTitle($advertisement->getTitle())->setMessageText($advertisement->getBody());
		$result=(new FbPublicator())->publication($fbAdvertisement);
		return (new AdvertisementResponse())->setTargeting($result->getTarget());
	}
	public function check(Advertisement $advertisement):bool
	{
		if (!$advertisement->getTitle())
			return True;
		return False;
	}
	public function prepare(Advertisement $advertisement):Advertisement
	{
		return $advertisement;
	}
	public function calculateDuration(Advertisement $advertisement):float
	{
		return $advertisement->getDuration()*100;
	}
}