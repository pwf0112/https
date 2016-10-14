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
}