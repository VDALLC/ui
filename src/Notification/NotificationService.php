<?php
namespace Vda\Ui\Notification;

use \Vda\Messaging\Message;

class NotificationService implements INotificationService
{
    private $backends;
    private $storageTypes;

    /**
     * @param array Initial backends mapping
     * @see self::registerStorage()
     */
    public function __construct(array $backends = array())
    {
        $this->backends = array();
        $this->storageTypes = array();

        foreach ($backends as $storageType => $backend) {
            $this->registerStorage($storageType, $backend);
        }

        if (empty($this->backends[self::STORAGE_FALLBACK])) {
            $this->registerStorage(self::STORAGE_FALLBACK,  new ErrorStorage());
        }
    }

    /**
     * Register notification storage backend
     *
     * @param mixed $storageType
     * @param string|IStorage $backend
     */
    public function registerStorage($storageType, $backend)
    {
        $this->backends[$storageType] = $backend;

        if ($storageType != self::STORAGE_FALLBACK && !in_array($storageType, $this->storageTypes)) {
            $this->storageTypes[] = $storageType;
        }
    }

    public function push($notification, $storage)
    {
        if (!($notification instanceof Notification)) {
            $notification = new Notification($notification);
        }

        $notification->addStorage($storage);

        $this->getBackend($storage)->push($storage, $notification);
    }

    public function getNotifications($storage = null)
    {
        $backends = is_null($storage) ? $this->listBackends() : (array) $storage;
        $result = array();

        foreach ($backends as $storage) {
            $result = array_merge($result, $this->getBackend($storage)->getNotifications($storage));
        }

        return $result;
    }

    public function dismiss($notificationId, $storage = null)
    {
        $backends = is_null($storage) ? $this->listBackends() : (array) $storage;
        $result = false;

        foreach ($backends as $storage) {
            $result = $this->getBackend($storage)->dismiss($storage, $notificationId) || $result;
        }

        return $result;
    }

    public function dismissTagged($tag, $storage = null)
    {
        $backends = is_null($storage) ? $this->listBackends() : (array) $storage;
        $cnt = 0;

        foreach ($backends as $storage) {
            $cnt += $this->getBackend($storage)->dismiss($storage, $tag);
        }

        return $cnt++;
    }

    public function dismissTransient($storage = null)
    {
        $backends = is_null($storage) ? $this->listBackends() : (array) $storage;
        $cnt = 0;

        foreach ($backends as $storage) {
            $cnt += $this->getBackend($storage)->dismissTransient($storage);
        }

        return $cnt;
    }

    /**
     * @param mixed $storage
     * @return IStorage
     */
    private function getBackend($storage)
    {
        if (!array_key_exists($storage, $this->backends)) {
            $storage == self::STORAGE_FALLBACK;
        }

        $backend = $this->backends[$storage];

        if (is_string($backend)) {
            $backend = new $backend();
            $this->backends[$storage] = $backend;
        }

        return $backend;
    }

    private function listBackends()
    {
        return $this->storageTypes;
    }
}
