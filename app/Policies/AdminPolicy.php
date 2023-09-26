<?php


namespace App\Policies;

// use App\Models\Hall;
// use App\Models\User;
use App\Models\Admin;

class AdminPolicy
{
    public function before(Admin $admin, $ability)
    {
        return $admin->supe_admin;

    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $admin): bool
    {
        // return $user->admins()
        // ->wherePivot('supe-admin', 0)
        // ->exists();
        return $admin->supe_admin;

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $admin): bool
    {
    //     $isadmin = $user->admins()
    //     ->wherePivot('supe-admin', 0)
    //     ->exists();
    
    // return ($isadmin);
    return $admin->supe_admin;

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $admin): bool
    {
        // $result =  $user->admins()
        // ->wherePivot('supe-admin', 0)
        // ->exists();
        // return $result;
        return $admin->supe_admin;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $admin): bool
    {
        // $canUpdateAdmin = $user->admins()
        //     ->wherePivot('admin_id', $admin->id)
        //     ->wherePivot('supe-admin', 0)
        //     ->exists();
    
        // $isAdminInHall = $hall->halls()
        //     ->wherePivot('hall_id', $hall->id)
        //     ->exists();
    
        // return $canUpdateAdmin && $isAdminInHall;
        return $admin->supe_admin;

    }
    

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $admin): bool
    {
    //     $canUpdateAdmin = $user->admins()
    //     ->wherePivot('admin_id', $admin->id)
    //     ->wherePivot('supe-admin', 0)
    //     ->exists();

    // $isAdminInHall = $hall->halls()
    //     ->wherePivot('hall_id', $hall->id)
    //     ->exists();

    // return $canUpdateAdmin && $isAdminInHall;
    return $admin->supe_admin;

    }


    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $admin): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $admin): bool
    {
        return false;
    }
}