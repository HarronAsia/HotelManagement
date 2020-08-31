<?php

namespace App\Repositories\Notification;

interface NotificationRepositoryInterface
{
    public function showall();
    
    public function showallUnreadbyUser($id);
    public function readAt($id);
    public function readAll();
    public function readAllonUser($id);
    public function deleteNotification($id);
    public function deleteAll();

    public function updateUserId($id, $notifiableid);
}
