<?php
namespace CurlX;

use Curl\Curl;

class Https
{
	public static function init()
	{
		$curl = new Curl();
		$curl->setOpt(CURLOPT_RETURNTRANSFER, TRUE);
		$curl->setOpt(CURLOPT_SSL_VERIFYPEER, FALSE);

		return $curl;
	}

	public static function get($url, $param = [])
	{
		$curl = self::init();

		$curl->get($url, $param);

		return $curl;
	}

	public static function post($url, $data = [])
	{
		$curl = self::init();

		$curl->post($url, $data);

		return $curl;
	}

	public static function file($url, $filePath)
	{
		$data = ["media"  => new \CURLFile($filePath)];

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		if (!empty($data)){
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($curl);
		curl_close($curl);
		return $output;
	}
}