<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Donhang;
use App\Models\User;
use App\Models\ChitietDonhang;
class ShoppingMail extends Mailable
{
    use Queueable, SerializesModels;

public $carts;
public $detail;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($carts,$detail)
    {
      $this->carts=$carts;
      $this->detail=$detail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.shopping');
    }
}
