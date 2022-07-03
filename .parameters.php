<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arCurrentValues */

$arComponentParameters = array();

if ($arCurrentValues) {
	$c = array_key_last($arCurrentValues);
	$c = explode('_', $c);
	$c = end($c) + 1;
} else {
	$c = 1;
}
for ($i = 0; $i <= $c; $i++) {
	if (($arCurrentValues['DF_LINK_' . ($i - 1)] && $arCurrentValues['DF_TEXT_' . ($i - 1)]) || $i == 0) {
		$arComponentParameters['GROUPS'][$i] = array(
			'NAME' => "Группа " . ($i + 1)
		);
		$arComponentParameters['PARAMETERS']['DF_LINK_' . $i] = array(
			"PARENT" => $i,
			"NAME" => 'Адрес ссылки',
			"TYPE" => "string",
		);
		$arComponentParameters['PARAMETERS']['DF_TEXT_' . $i] = array(
			"PARENT" => $i,
			"NAME" => 'Текст ссылки',
			"TYPE" => "string",
		);
		$arComponentParameters['PARAMETERS']['DF_CLASS_' . $i] = array(
			"PARENT" => $i,
			"NAME" => 'Класс ссылки',
			"TYPE" => "string",
			"REFRESH" => "Y",
		);
	}
}