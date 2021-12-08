<?php

class FinancialTransactionsRuTest extends \PHPUnit\Framework\TestCase
{




	public function testGetFieldName():void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->getFieldValueMaximumLength("gfdgfdgg");

		static::assertEquals("Name", $dataGenerator::FIELD_NAME);
	}



	public function getDatasenplise(): array
	{
		return [
			'filled' => [
				[
					'Name' => 'NOMER',
					'PersonalAcc' => '123123123',
					'BankName' => 'RMR',
					'BIC' => '791277',
					'CorrespAcc' => '5656656566565665656',
					'Sum' => '91929391923',
					'UIN' => '90123',
				],
				'ST00012|Name=NOMER|PersonalAcc=123123123|BankName=RMR|BIC=791277|CorrespAcc=5656656566565665656|Sum=91929391923|UIN=90123',
			],
			'empty' => [
				[],
				'ST00012|Name=|PersonalAcc=|BankName=|BIC=|CorrespAcc=',
			],
		];
	}
	/**
	 * @dataProvider getDatasenplise
	 * @param array $fields
	 * @param array $empty
	 */
	public function testGetData(array $fields, string $empty): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields($fields);

		$data = $dataGenerator->getData();

		static::assertEquals($empty, $data);
	}



}