<?php

namespace App\Operation;

class Settings
{
	protected $isBeforeActionsEnabled = true;
	protected $isAfteerActionsEnabled = true;


	public function disableBeforeSaveActions(): self
	{
		$this->isBeforeActionsEnabled = false;

		return $this;
	}

	public function isBeforeActionsEnabled(): bool
	{
		return $this->isBeforeActionsEnabled;
	}






	public function disableAfteerSaveActions(): self
	{
		$this->isAfteerActionsEnabled = false;
		return $this;
	}

	public function isAfteerActionsEnabled(): bool
	{
		return $this->isAfteerActionsEnabled;
	}


}