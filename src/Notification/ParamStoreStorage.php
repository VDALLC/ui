<?php
namespace Vda\Ui\Notification;

use \Vda\Util\ParamStore\IParamStore;

class ParamStoreStorage implements IStorage
{
    public function __construct(IParamStore $store)
    {
        $this->store = $store;

        if (!isset($this->store['messages'])) {
            $this->store['messages'] = array();
        }
    }

    public function push($storage, Notification $notification)
    {
        if ($notification->getId() === null) {
            $this->store['messages'][] = $notification;
        } else {
            $this->store['messages'][$notification->getId()] = $notification;
        }
    }

    public function getNotifications($storage)
    {
        return $this->store['messages'];
    }

    public function dismiss($storage, $notificationId)
    {
        if (isset($this->store['messages'][$notificationId])) {
            unset($this->store['messages'][$notificationId]);
            return true;
        }

        return false;
    }

    public function dismissTagged($storage, $tag)
    {
        $cnt = 0;

        foreach ($this->store['messages'] as $k => $m) {
            if (in_array($tag, $m->getTags())) {
                unset($this->store['messages'][$k]);
                $cnt++;
            }
        }

        return $cnt;
    }

    public function dismissTransient($storage)
    {
        $cnt = 0;

        foreach ($this->store['messages'] as $k => $m) {
            if ($m->isTransient()) {
                unset($this->store['messages'][$k]);
                $cnt++;
            }
        }

        return $cnt;
    }
}
