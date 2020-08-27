<?php

namespace App\Repositories\Notification;

interface NotificationRepositoryInterface
{
    public function showall();
    
    public function showallUnreadbyUser($id);

    public function readAt($id);
    public function readAll();

    public function deleteNotification($id);

    public function updateUserId($id,$notifiableid);
}
