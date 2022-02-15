<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('master', function () {
            $idUser = Auth::id();
            $previlleges = DB::table('role_groups_user')
                ->join('role_table', 'role_table.id_role', '=', 'role_groups_user.id_role')
                ->select('role_table.init_role')
                ->where('id_user', $idUser)
                ->get()
                ->toArray()[0]->init_role;

            return $previlleges === "master";
        });

        Gate::define('admin', function () {
            $idUser = Auth::id();
            $previlleges = DB::table('role_groups_user')
                ->join('role_table', 'role_table.id_role', '=', 'role_groups_user.id_role')
                ->select('role_table.init_role')
                ->where('id_user', $idUser)
                ->get()
                ->toArray()[0]->init_role;

            return $previlleges === "admin";
        });

        Gate::define('user', function () {
            $idUser = Auth::id();
            $previlleges = DB::table('role_groups_user')
                ->join('role_table', 'role_table.id_role', '=', 'role_groups_user.id_role')
                ->select('role_table.init_role')
                ->where('id_user', $idUser)
                ->get()
                ->toArray()[0]->init_role;

            return $previlleges === "user";
        });
    }
}
