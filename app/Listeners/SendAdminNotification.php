<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\ProductClicked;
use Illuminate\Support\Facades\Mail;

class SendAdminNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductClicked $event)
    {
        $adminEmail = ['info@vibrantindiatech.com'];
        $htmlContent = "
        <html>
        <body>
            <h1>Product Clicked Notification</h1>
            <table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse; width: 100%;'>
                <thead>
                    <tr>
                        <th style='background-color: #f2f2f2;'>Field</th>
                        <th style='background-color: #f2f2f2;'>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Product Name</td>
                        <td>{$event->product->name}</td>
                    </tr>
                    <tr>
                        <td>Company Name</td>
                        <td>{$event->product->company->name}</td>
                    </tr>
                    <tr>
                        <td>User Name</td>
                        <td>{$event->user->name}</td>
                    </tr>
                     <tr>
                        <td>User Phone</td>
                        <td>{$event->user->mobileno}</td>
                    </tr>
                    <tr>
                        <td>User Email</td>
                        <td>{$event->user->email}</td>
                    </tr>
                    <tr>
                        <td>Clicked At</td>
                        <td>" . now()->toDateTimeString() . "</td>
                    </tr>
                </tbody>
            </table>
        </body>
        </html>
    ";

    Mail::html($htmlContent, function ($message) use ($adminEmail) {
        $message->to($adminEmail)
            ->subject('Product Clicked Notification');
    });
    }
}


