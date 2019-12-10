<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\HttpLogger\LogWriter;
use Spatie\HttpLogger\LogProfile;

class HttpLogger
{
	protected $logProfile;
	protected $logWriter;

	public function __construct(LogProfile $logProfile, LogWriter $logWriter)
	{
		$this->logProfile = $logProfile;
		$this->logWriter = $logWriter;
	}

	public function handle(Request $request, Closure $next)
	{
		$start_time = microtime(true);
		$response = $next($request);

		if ($this->logProfile->shouldLogRequest($request)) {
			$this->logWriter
				->setResponse($response)
				->setStartTime($start_time)
				->setEndTime(microtime(true))
				->logRequest($request);
		}

		return $response;
	}
}
