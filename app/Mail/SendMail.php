<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $data_send_mail;

    public function __construct($data_send_mail)
    {
        $this->data_send_mail = $data_send_mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.order')
                                        ->from('huyetvuno1@gmail.com','Orfarm')
                                        ->subject('Đơn hàng đã đặt')
                                        ->with( $this->data_send_mail )
                                        ;
    }
}
