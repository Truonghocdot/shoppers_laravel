<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(private $cartItem,private $customerName ,private $total, private $counpon)
    {
        
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('truonghocdot05@gmail.com', 'Shoppers'),
            subject: 'Confirm your order!',
        );
    }

    public function content(): Content
    {
        return new Content(
            with: [
                'name'=> $this->customerName,
                'total'=> $this->total,
                'coupon'=> $this->counpon,
                'cart'=>$this->cartItem
            ],
            view: 'customer.mail',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
