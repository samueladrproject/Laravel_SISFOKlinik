<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class cekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        $idUser = Auth::id();
        $previlleges = DB::table('role_groups_user')
            ->join('role_table', 'role_table.id_role', '=', 'role_groups_user.id_role')
            ->select('role_table.init_role')
            ->where('id_user', $idUser)
            ->get()
            ->toArray()[0]->init_role;

        if (in_array($previlleges, $levels)) {
            return $next($request);
        }
        // return redirect('/');
    }
}
