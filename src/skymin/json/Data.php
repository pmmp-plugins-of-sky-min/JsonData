<?php
declare(strict_types = 1);

namespace skymin\json;

use pocketmine\Server;

use function file_exists;
use function file_get_contents;
use function json_decode;

final class Data{
	
	public static function call(string $path) :array{
		$path .= '.json';
		return json_decode(file_exists($path) ? file_get_contents($path) : "{}", true);
	}
	
	public static function save(string $path, array $data) :void{
		Server::getInstance()->getAsyncPool()->submitTask(new SaveAsyncTask($path, $data));
	}
	
}
