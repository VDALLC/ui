<?php
namespace Vda\Ui\Message;

interface IMessage
{
    /**
     * Do implementation specific processing and return the result
     *
     * @return string
     */
    public function parse();

    /**
     * Return original message string
     *
     * @return string
     */
    public function getMessage();

    /**
     * Return message parameters
     * @return array
     */
    public function getParams();

    /**
     * Set message parameters
     *
     * @param array $params
     */
    public function setParams(array $params);

    /**
     * Same as parse()
     *
     * @return string
     */
    public function __toString();
}
