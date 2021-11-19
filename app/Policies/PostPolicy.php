<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the Admin can view any models.
     *
     * @param  \App\Models\Admin  $Admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Admin $Admin)
    {
        //
    }

    /**
     * Determine whether the Admin can view the model.
     *
     * @param  \App\Models\Admin  $Admin
     * @param  \App\Models\Post  $posts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $Admin, Post $posts)
    {
        //
    }

    /**
     * Determine whether the Admin can create models.
     *
     * @param  \App\Models\Admin  $Admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $Admin)
    {
        //
    }

    /**
     * Determine whether the Admin can update the model.
     *
     * @param  \App\Models\Admin  $Admin
     * @param  \App\Models\Post  $posts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, Post $posts)
    {
        return $admin->id === $posts->author_id;
    }

    /**
     * Determine whether the Admin can delete the model.
     *
     * @param  \App\Models\Admin  $Admin
     * @param  \App\Models\Post  $posts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, Post $posts)
    {
        return $admin->id === $posts->author_id;
    }

    /**
     * Determine whether the Admin can restore the model.
     *
     * @param  \App\Models\Admin  $Admin
     * @param  \App\Models\Post  $posts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, Post $posts)
    {
        //
    }

    /**
     * Determine whether the Admin can permanently delete the model.
     *
     * @param  \App\Models\Admin  $Admin
     * @param  \App\Models\Post  $posts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, Post $posts)
    {
        //
    }
}
