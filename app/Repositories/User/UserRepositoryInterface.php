<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function search($user);
    
    public function showall();
    public function paginate();
    
    public function showUser($user);
    public function destroyUser($user);
    public function restoreUser($user);

    
    // public function showallascbyName();
    // public function showalldesbyName();
    // public function showallascbyEmail();
    // public function showalldesbyEmail();
    // public function showallascbyRole();
    // public function showalldesbyRole();
    // public function showallascbyCreated();
    // public function showalldesbyCreated();
    // public function showallascbyUpdated();
    // public function showalldesbyUpdated();
    // public function showallascbyDeleted();
    // public function showalldesbyDeleted();
}
