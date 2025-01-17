<?php
// https://api.delion.online/public/v1/tickers
function deliondex_api_query($method, $params='')
{
	$uri = "https://api.delion.online/public/v1/{$method}";
	if (!empty($params)) $uri .= "/{$params}";
	$ch = curl_init($uri);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	$execResult = strip_tags(curl_exec($ch));
	$obj = json_decode($execResult);
	return $obj;
}