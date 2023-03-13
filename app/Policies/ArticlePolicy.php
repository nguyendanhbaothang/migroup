<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
       return $user->hasPermission('Article_viewAny');

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user)
    {
       return $user->hasPermission('Article_view');

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
       return $user->hasPermission('Article_create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user)
    {
        return $user->hasPermission('Article_update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user)
    {
       return $user->hasPermission('Article_delete');
    }
}
