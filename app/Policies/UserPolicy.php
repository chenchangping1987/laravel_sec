<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // 用户资料更新授权
	public function update(User $currentUser, User $user)
	{
		return $currentUser->id === $user->id;
    }

    // 用户删除授权
	public function destroy(User $currentUser, User $user)
	{
		return $currentUser->is_admin && $currentUser->id !== $user->id;
    }

    // 关注授权
	public function follow(User $currentUser, User $user)
	{
		return $currentUser->id !== $user->id;
	}
}
