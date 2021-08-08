<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\invoice;

class notifactiondb extends Notification
{
    use Queueable;
    private $invoices;

    public function __construct( invoice $invoices )
    {
        $this->invoices = $invoices;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return
        [
            'id'        => $this->invoices->id ,
            'title'     => 'تم اضافة فاتورة جديد بواسطة :' ,
            'user'      => Auth::user()->name ,
        ];
    }
}
