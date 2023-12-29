<?php
namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MenuPolicy
{
    use HandlesAuthorization;

    public function createMenu(User $user)
    {
        // Your logic to determine if the user can create a menu
        return $user->isMasterAdmin() || $user->isRestaurantAdmin();
    }
}
