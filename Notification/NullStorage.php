<?php
namespace Vda\Ui\Notification;

class NullStorage implements INotificationStorage
{
    public function push($storage, Notification $notification)
    {
    }

    public function getNotifications($storage)
    {
        return array();
    }

    public function dismiss($storage, $notifiactionId)
    {
        return false;
    }

    public function dismissTagged($storage, $tag)
    {
        return 0;
    }

    public function dismissTransient($storage)
    {
        return 0;
    }
}
