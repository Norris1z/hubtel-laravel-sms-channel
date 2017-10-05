<?php

namespace NotificationChannels\Hubtel;

class HubtelMessage
{
    /**
     * Sender's phone number.
     * @var string
     */
    public $from;

    /**
     * Recipient phone number.
     * @var string
     */
    public $to;

    /**
     * Message.
     * @var string
     */
    public $content;

    /**
     *Indicate a delivery report request.
     *@var bool
     */
    public $registeredDelivery;

    /**
     *The Reference Number provided by the Client 
     *prior to sending the message.
     *@var int
     */
    public $clientReference;

    /**
     * Indicates the type of message to be sent.
     *@var int
     */
    public $type;

    /**
     *The User Data Header of the SMS Message being sent.
     *@var string 
     */
    public $udh;

    /**
     *Indicates when to send the message.
     *@var mixed
     */
    public $time;

    /**
     *Indicates if this message must be sent as a flash message.
     *@var bool
     */
    public $flashMessage;

    
    public function __construct($from = null, $to = null, $content = null)
    {
        $this->from = $from;
        $this->to = $to;
        $this->content = $content;
    }

    /**
     * Set the message sender's phone number.
     * @param string $from
     * @return $this
     */
    public function from($from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * Set the recipient's phone number.
     * @param string $to
     * @return $this
     */
    public function to($to)
    {
        $this->to = $to;
        return $this;
    }

    /**
     * Set the message content.
     * @param string $content
     * @return $this
     */
    public function content($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     *Set delivery report status.
     * @return $this
     */
    public function registeredDelivery()
    {
        $this->registeredDelivery = 'true';
        return $this;
    }

    /**
     * Set the client reference number.
     * @param int $reference
     * @return $this
     */
    public function clientReference($reference)
    {
        $this->clientReference = $reference;
        return $this;
    }

    /**
     * Set the message type.
     * @param int $type
     * @return $this
     */
    public function type($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Set the User Data Header of the SMS Message.
     * @param string $udh
     * @return $this
     */
    public function udh($udh)
    {
        $this->udh = $udh;
        return $this;
    }

    /**
     * Set the time to send the message.
     * @param mixed $time
     * @return $this
     */
    public function time($time)
    {
        $this->time = $time;
        return $this;
    }

    /**
     * Set message as a flash message.
     * @return $this
     */
    public function flashMessage()
    {
        $this->flashMessage = 'true';
        return $this;
    }
}
