<?php

namespace Adapter;

use Entity\Advertisement;
use Entity\AdvertisementResponse;
use External\VkAdvertisement;
use External\VkPublicator;
use Service\AdvertisementProviderInterface;

class VkAdvertisementProviderAdapter implements AdvertisementProviderInterface
{

	public function publication(Advertisement $advertsement): AdvertisementResponse
	{
		$vkAdvertisement = new VkAdvertisement();

		if (!$advertsement->getTitle())
		{
			$advertsement->setTitle("default");
		}
		$vkAdvertisement
			->setTitle($advertsement->getTitle())
			->setMessageBody($advertsement->getBody());

		$result = (new VkPublicator())->publication($vkAdvertisement);

		return (new AdvertisementResponse())->setTargeting($result->getTargetingName());
	}
	public function checking(Advertisement $advertiser):bool
	{
		return True;
	}

	public function preparingutput(Advertisement $advertiser):Advertisement
	{
		return $advertiser;
	}

	public function calculate(Advertisement $advertiser):float
	{
		return $advertiser->getDuration();
	}

	public function prepare(Advertisement $advertsement)
	{
		// TODO: Implement prepare() method.
	}

	public function check(Advertisement $advertsement)
	{
		// TODO: Implement check() method.
	}

	public function calculateDuration(Advertisement $advertsement)
	{
		// TODO: Implement calculateDuration() method.
	}
}