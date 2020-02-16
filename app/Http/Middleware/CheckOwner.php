<?php

namespace App\Http\Middleware;
use Closure;
use App\Project;
use Illuminate\Support\Facades\Auth;

class CheckOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $project = Project::find($request->project_id);
 
        if ($project->user_id != Auth::user()->id)
        {
            return redirect("/home");
        }
        return $next($request);
    }
}
