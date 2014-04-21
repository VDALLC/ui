<?php
namespace Vda\Ui\Notification;

class ErrorStorage implements IStorage
{
    public function push($storage, Notification $notification)
    {
        $this->raiseError($storage);
    }

    public function getNotifications($storage)
    {
        $this->raiseError($storage);
    }

    public function dismiss($storage, $notificationId)
    {
        $this->raiseError($storage);
    }

    public function dismissTagged($storage, $tag)
    {
        $this->raiseError($storage);
    }

    public function dismissTransient($storage)
    {
        $this->raiseError($storage);
    }

    private function raiseError($storage)
    {
        throw new \RuntimeException(
            "Notification storage '{$storage}' is not registered"
        );
    }
}
