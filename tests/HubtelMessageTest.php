<?php

namespace NotificationChannels\Hubtel\Test;

use PHPUnit\Framework\TestCase;
use NotificationChannels\Hubtel\HubtelMessage;

class HubtelMessageTest extends TestCase
{
    public $message;

    public function setUp():void
    {
        parent::setUp();
        $this->message = new HubtelMessage();
    }

    /** @test **/
    public function it_can_construct_the_message_with_the_basic_required_parameters()
    {
        $message = new HubtelMessage('Norris', '1234567890', 'Hello There');
        $this->assertEquals($message->from, 'Norris');
        $this->assertEquals($message->to, '1234567890');
        $this->assertEquals($message->content, 'Hello There');
    }

    /** @test **/
    public function it_can_set_the_message_sender_from_a_method()
    {
        $this->message->from('Norris');
        $this->assertEquals($this->message->from, 'Norris');
    }

    /** @test **/
    public function it_can_set_the_message_recipient_from_a_method()
    {
        $this->message->to('1234567890');
        $this->assertEquals($this->message->to, '1234567890');
    }

    /** @test **/
    public function it_can_set_the_message_content_from_a_method()
    {
        $this->message->content('Hello zing');
        $this->assertEquals($this->message->content, 'Hello zing');
    }

    /** @test **/
    public function it_can_request_for_a_delivery_report()
    {
        $this->message->registeredDelivery();
        $this->assertEquals($this->message->registeredDelivery, 'true');
    }

    /** @test **/
    public function it_can_add_a_client_reference_to_the_sms()
    {
        $this->message->clientReference('12345');
        $this->assertEquals($this->message->clientReference, '12345');
    }

    /** @test **/
    public function it_can_state_the_message_type()
    {
        $this->message->type(2);
        $this->assertEquals($this->message->type, 2);
    }

    /** @test **/
    public function it_can_add_user_defined_headers_to_the_message()
    {
        $this->message->udh('48656c6c6f207a696e67');
        $this->assertEquals($this->message->udh, '48656c6c6f207a696e67');
    }

    /** @test **/
    public function it_can_set_the_time_to_send_the_message()
    {
        $this->message->time('2017-10-12 10:24:30');
        $this->assertEquals($this->message->time, '2017-10-12 10:24:30');
    }

    /** @test **/
    public function it_can_send_the_message_as_a_flash_message()
    {
        $this->message->flashMessage();
        $this->assertEquals($this->message->flashMessage, 'true');
    }
}
