<?php

namespace App\Core\Http\Middleware;

use App\Domains\Access\Repositories\Contracts\RoleRepository;
use Closure;

class VerifyUserRole
{
    /**
     * @var RoleRepository
     */
    private $role;

    /**
     * VerifyUserRole constructor.
     * @param RoleRepository $role
     */
    public function __construct(RoleRepository $role)
    {
        $this->role = $role;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
