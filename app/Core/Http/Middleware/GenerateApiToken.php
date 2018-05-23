<?php

namespace App\Core\Http\Middleware;

use App\Domains\Access\Repositories\Contracts\UserRepository;
use Closure;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class GenerateApiToken
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
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
        if(!Auth::guest()){
            if(is_null(auth()->user()->api_token)){
                $user = $this->userRepository->find(auth()->user()->id);
                $user->api_token = Str::random(60);
                $user->save();
            }
        }
        return $next($request);
    }
}
