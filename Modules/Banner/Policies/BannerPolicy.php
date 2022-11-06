<?php

namespace Modules\Banner\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Banner\Models\Banner;
use Modules\User\Models\User;

class BannerPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(User $user): bool
    {
        return $user->can('brand-list');
    }
    
    public function view(User $user, Banner $banner): bool
    {
        return $user->can('brand-list');
    }
    
    public function create(User $user): bool
    {
        return $user->can('brand-create');
    }
    
    public function update(User $user, Banner $banner): bool
    {
        return $user->can('brand-update');
    }
    
    public function delete(User $user, Banner $banner): bool
    {
        return $user->can('brand-delete');
    }
    
    public function restore(User $user, Banner $banner): bool
    {
    }
    
    public function forceDelete(User $user, Banner $banner): bool
    {
    }
}