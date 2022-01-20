<?php

namespace External;

class VkPublicator
{
	public function publication(VkAdvertisement $advertisement): VkAdvertsimentResult
	{
		//...

		return (new VkAdvertsimentResult())->setTargetingName("response");
	}
}