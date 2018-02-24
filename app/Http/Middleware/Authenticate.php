<?php
namespace App\Http\Middleware;

use Closure;
use Cartalyst\Sentinel\Sentinel;
use Route;

/**
 * Authenticate with Sentinel
 * 
 * @author Amir Eslamdoust <amireslamdoust@gmail.com>
 * @version 1.0.0
 * @uses
 *
 * @see
 *
 */
class Authenticate
{

    private $auth;

    public function __construct(Sentinel $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     * 
     * @author Amir Eslamdoust <amireslamdoust@gmail.com>
     * @since Feb 04, 2018 - 15:48:38 PM
     * @param Object $request
     * @param Closure $next            
     * @param string|null $guard            
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $backURL = $request->route()->getName();

        if (! $this->auth->check()) {
            return redirect()->route('signin-form',['redirect' => base64_encode($backURL)]);
        }
        
        return $next($request);
    }
}