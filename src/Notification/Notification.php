<?php
namespace Vda\Ui\Notification;

use \Vda\Ui\Message\Message;

class Notification
{
    const NORMAL = 0;
    const IMPORTANT = 1;
    const CRITICAL = 2;

    private $message;
    private $severity;
    private $id;
    private $tags;
    private $storage;

    public function __construct($message, $severity = self::NORMAL, $id = null, array $tags = array())
    {
        $this->message = is_string($message) ? new Message($message) : $message;
        $this->severity = $severity;
        $this->id = $id;
        $this->tags = $tags;
        $this->storage = array();
    }

    /**
     * @return IMessage
     */
    public function getMessage()
    {
        return $this->message;
    }

    public function getSeverity()
    {
        return $this->severity;
    }

    public function getId()
    {
        return $this->id;
    }

    public function addStorage($storage)
    {
        $this->storage[] = $storage;
    }

    public function getStorage()
    {
        return $this->storage;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function isTransient()
    {
        return is_null($this->id);
    }
}
