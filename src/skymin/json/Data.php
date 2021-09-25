<?php

namespace skymin\json;

use function file_exists;
use function file_get_contents;
use function file_put_contents;
use function json_encode;
use function json_decode;
use const JSON_PRETTY_PRINT;
use const JSON_UNESCAPED_UNICODE;

class Data{
	
	public static function call(string $path, string $name) :array{
		$name = $name . '.json';
		return json_decode(file_exists($path . $name) ? file_get_contents($path . $name) : "{}", true);
	}
	
	public static function save(string $path, string $name, array $data) :void{
		file_put_contents($path . $name . '.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}
	
}
