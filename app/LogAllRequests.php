<?php 

namespace App;

use Illuminate\Http\Request;

class LogAllRequests implements \Spatie\HttpLogger\LogProfile {
	public function shouldLogRequest(Request $request): bool {
		return true;
	}
}