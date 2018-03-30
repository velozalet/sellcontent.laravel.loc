<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Policies\ArticlePolicy;
use App\Article;
use App\Policies\UserPolicy;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /** The policy mappings for the application.
     * @var array
    */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Article::class => ArticlePolicy::class, //register authorize policy `ArticlePolicy` for model `Article`
        User::class => UserPolicy::class, //register authorize policy `UserPolicy` for model `Menu`
    ];

    /** Register any authentication / authorization services.
     * @return void
    */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
