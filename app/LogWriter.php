<?php 

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;

class LogWriter extends \Spatie\HttpLogger\DefaultLogWriter {

	protected $start_time;
	protected $end_time;
	protected $response;

	public function setResponse($response) {
		$this->response = $response;

		return $this;
	}

	public function setStartTime(float $val) {
		$this->start_time = $val;

		return $this;
	}

	public function setEndTime(float $val) {
		$this->end_time = $val;

		return $this;
	}

	public function logRequest(Request $request) {
		$method = strtoupper($request->getMethod());
		$uri = $request->getPathInfo();
		$files = (new Collection(iterator_to_array($request->files)))
			->map([$this, 'flatFiles'])
			->flatten();
		$status_code = $this->response->status();

		$bodyAsJson = [
			'user_id' => \Auth::id(),
			'method' => $request->method(),
			'url' => $request->getPathInfo(),
			'request' => $request->except(config('http-logger.except')),
			'query' => $request->query->all(),
			'server' => $this->filterUnnecessary($request->server->all()),
			'cookies' => $request->cookies->all(),
			'session_id' => \Session::getId(),
			'datetime' => \Carbon\Carbon::now(),
			'files' => $files,
			'execution_time' => $this->end_time - $this->start_time,
			'status_code' => $this->response->status(),
		];

		if ($status_code != '200') {
			$bodyAsJson['response'] = $this->response->getContent();
		}
		$message = "ACCESS LOG: " . json_encode($bodyAsJson);
		Log::info($message);
	}

	protected function filterUnnecessary(array $data) : array {
		return Arr::except($data, ['DOCUMENT_ROOT', 'REMOTE_PORT', 'SERVER_SOFTWARE', 'SERVER_PROTOCOL', 'SCRIPT_NAME', 'SCRIPT_FILENAME', 'PHP_SELF', 'CONTENT_LENGTH', 'HTTP_CONTENT_LENGTH', 'HTTP_COOKIE', 'REQUEST_TIME_FLOAT', 'REQUEST_TIME']);
	}
}