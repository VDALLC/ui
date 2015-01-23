<?php
namespace Vda\Ui\Notification;

class NullNotificationBackend implements INotificationBackend
{
    public function push($message, $method)
    {
    }

    public function getMessages()
    {
        return array();
    }

    public function dismiss($messageId)
    {
        return false;
    }
}
