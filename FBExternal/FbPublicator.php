<?php

namespace FbExternal;

class FbPublicator
{
	public function publication(FbAdvertisement $advertisement):FbAdvertisementResult
	{
		return (new FbAdvertisementResult())->setTarget("тут могла быть ваша реклама");
	}
}