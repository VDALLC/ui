<?php
namespace Vda\Ui\Notification;

interface IStorage
{
    /**
     * Push notification to storage
     *
     * @param mixed $storage
     * @param Notificaton $notificaton
     */
    public function push($storage, Notification $notification);

    /**
     * Fetch notifications from storage
     *
     * @param mixed $storage
     */
    public function getNotifications($storage);

    /**
     * Remove persistent notification by id
     *
     * @param mixed $storage
     * @param mixed $notificationId
     * @return boolean True if notification was deleted
     */
    public function dismiss($storage, $notificationId);

    /**
     * Remove tagged notifications
     *
     * @param mixed $storage
     * @param string $tag,...
     * @return integer Number of dismissed items
     */
    public function dismissTagged($storage, $tag);

    /**
     * Remove non-persistent notifications
     *
     * @param mixed $storage
     * @return integer Number of dismissed items
     */
    public function dismissTransient($storage);
}
