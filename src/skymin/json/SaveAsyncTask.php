<?php
declare(strict_types = 1);

namespace skymin\json;

use pocketmine\Server;
use pocketmine\scheduler\AsyncTask;

use PrefixedLogger;

use function file_put_contents;
use function json_encode;
use const JSON_PRETTY_PRINT;
use const JSON_UNESCAPED_UNICODE;

final class SaveAsyncTask extends AsyncTask{
	
	private PrefixedLogger $logger;
	
	public function __construct(
		private string $path,
		private array $data
	){
		$this->logger = new PrefixedLogger(Server::getInstance()->getLogger(), 'JSONDATA');
	}
	
	public function onRun() :void{
		$this->logger->debug('Starting save data');
		file_put_contents($this->path . '.json', json_encode($this->data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	}
	
	public function onCompletion() :void{
		$this->logger->debug('Completed to save Data');
	}
}