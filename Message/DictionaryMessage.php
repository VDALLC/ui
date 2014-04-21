<?php
namespace Vda\Ui\Message;

class DictionaryMessage extends Message
{
    protected static $globalDict;
    protected static $globalPrepend = '[';
    protected static $globalAppend = ']';

    protected $dict = null;
    protected $prepend = null;
    protected $append = null;

    public function getDictionary()
    {
        return $this->dict;
    }

    public function setDictionary($dict)
    {
        self::checkDictionary($dict);

        $this->dict = $dict;
    }

    public function getPrepend()
    {
        return $this->prepend;
    }

    public function setPrepend($prepend)
    {
        $this->prepend = $prepend;
    }

    public function getAppend()
    {
        return $this->append;
    }

    public function setAppend($append)
    {
        $this->append = $append;
    }

    public static function getGlobalDict()
    {
        return self::$globalDict;
    }

    public static function setGlobalDict($dict)
    {
        self::$globalDict = $dict;
    }

    public static function getGlobalPrepend()
    {
        return self::$globalPrepend;
    }

    public static function setGlobalPrepend($prepend)
    {
        self::$globalPrepend = $prepend;
    }

    public static function getGlobalAppend()
    {
        return self::$globalAppend;
    }

    public static function setGlobalAppend($append)
    {
        self::$globalAppend = $append;
    }

    protected function preprocessMessage($message)
    {
        $dict = $this->dict ?: self::$globalDict;

        if (is_null($dict) || !isset($dict[$message])) {
            $prepend = is_null($this->prepend) ? self::$globalPrepend : $this->prepend;
            $append = is_null($this->append) ? self::$globalAppend : $this->append;

            return $prepend . $message . $append;
        }

        return $dict[$message];
    }

    private static function checkDictionary($dictionary)
    {
        if (!is_null($dict) && !is_array($dict) && !($dict instanceof \ArrayAccess)) {
            throw new \InvalidArgumentException('Invalid dictionary type');
        }
    }
}
