<?php
namespace Vda\Ui\Message;

use \Vda\Util\StringUtil;

class Message implements IMessage
{
    protected static $globalPrefix = '#';
    protected static $globalSuffix = '#';

    protected $prefix = null;
    protected $suffix = null;
    protected $message;
    protected $params;

    public function __construct($message, array $params = array())
    {
        $this->message = $message;
        $this->params = $params;
    }

    public function parse()
    {
        return StringUtil::fillParams(
            $this->preprocessMessage($this->message),
            $this->params,
            is_null($this->prefix) ? self::$globalPrefix : $this->prefix,
            is_null($this->suffix) ? self::$globalSuffix : $this->suffix
        );
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function setParams(array $params)
    {
        $this->params = $params;
    }

    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
    }

    public function __toString()
    {
        return $this->parse();
    }

    public static function setGlobalPrefix($prefix)
    {
        self::$globalPrefix = $prefix;
    }

    public static function setGlobalSuffix($suffix)
    {
        self::$globalSuffix = $suffix;
    }

    protected function preprocessMessage($message)
    {
        return $message;
    }
}
