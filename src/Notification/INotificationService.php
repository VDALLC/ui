<?php
namespace Vda\Ui\Notification;

interface INotificationService
{
    const STORAGE_REQUEST    = 'request';
    const STORAGE_SESSION    = 'session';
    const STORAGE_DATASOURCE = 'datasource';
    const STORAGE_FALLBACK   = 'fallback';

    /**
     * Send user notification using one or more delivery methods
     *
     * @param string|Notification $notification
     * @param mixed $storage,...
     */
    public function push($notification, $storage);

    /**
     * @return Notification[]
     */
    public function getNotifications($storage = null);

    public function dismiss($notificationId, $storage = null);

    public function dismissTagged($tag, $storage = null);

    public function dismissTransient($storage = null);
}
