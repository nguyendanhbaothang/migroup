<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\Group;
use App\Models\User;
use App\Policies\ArticlePolicy;
use App\Policies\AuthorPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\GroupPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
            Group::class => GroupPolicy::class,
            User::class => UserPolicy::class,
            Article::class => ArticlePolicy::class,
            Author::class => AuthorPolicy::class,
            Category::class => CategoryPolicy::class,
        ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
