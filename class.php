<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

class dfParams extends CBitrixComponent
{
	function createResult($arParams)
	{
		$arResult = array();
		foreach ($arParams as $i => $item) {
			if (stripos($i, 'DF_') !== false) {
				$arItem = explode('_', $i);
				$arResult['ITEMS'][end($arItem)][$arItem[1]] = $item;
			}
		}
		return $arResult;
	}

	public function executeComponent()
	{
		$this->arResult = array_merge($this->arResult, $this->createResult($this->arParams));
		$this->includeComponentTemplate();
	}
}