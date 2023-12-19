<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
            $token = $this->extractBearerToken($request);

            if (!$token) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            // Perform additional checks or logic if needed

            return $next($request);
        }

        private function extractBearerToken($request)
        {
            $authorizationHeader = $request->header('Authorization');

            if (preg_match('/Bearer\s+(.*)$/i', $authorizationHeader, $matches)) {
                return $matches[1];
            }

            return null;
        }
    }
