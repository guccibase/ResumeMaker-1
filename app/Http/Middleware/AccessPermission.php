<?php
namespace App\Http\Middleware;

use Closure;
use Cartalyst\Sentinel\Sentinel;
use Route;

/**
 * Access Permission
 * 
 * @author Amir Eslamdoust <amireslamdoust@gmail.com>
 * @version 1.0.0
 * @uses
 *
 * @see
 *
 */
class AccessPermission
{

    private $auth;

    public function __construct(Sentinel $auth)
    {
        $this->auth = $auth;
    }

    /**
     *
     * @author Amir Eslamdoust <amireslamdoust@gmail.com>
     * @since Feb Object, 2018 - 15:48:33 PM
     * @param Object $request
     * @param Closure $next            
     * @param unknown $guard            
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (! $this->auth->hasAccess($request->route()
            ->getName()))
            return redirect()->route('access.denied');
        
        return $next($request);
    }
}

