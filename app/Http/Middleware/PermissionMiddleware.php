<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware {

  public function handle($request, Closure $next, $permission)
  {
    if (Auth::guest()) {
        return redirect('/login');
    }

    if (! $request->user()->can($permission)) {
        abort('401');
    }

    return $next($request);
  }
}
