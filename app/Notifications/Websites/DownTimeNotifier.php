<?php

namespace Monitor\Notifications\Websites;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;

use Monitor\ReusableCodes\Helpers\CommonHelper;

class DownTimeNotifier extends Notification
{
    use Queueable;

    private $details;
    private $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details,$user)
    {
        $this->details = $details;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        if (app()->environment('production')) {
            return ['database', 'mail', 'slack'];
        }else{
            return ['database', 'mail'];
        }
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject(strtoupper($this->details->site_info['site_name'])." IS DOWN | WEBSITE STATUS")
                    ->markdown('emails.monitoring.websites.downtime', ['details' => $this->details, 'user' => $this->user]);
    }

    /**
     * Get the Slack representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return SlackMessage
     */
    public function toSlack($notifiable)
    {
        return (new SlackMessage)
                    ->from(CommonHelper::custom_app_name().' | '.$this->details->site_info['site_name'])
                    ->image('https://laravel.com/favicon.png')
                    ->content('Whoops! '.strtoupper($this->details->site_info['site_name']).' is DOWN since '.$this->details->updated_at.' '.$this->details->site_info['site_url']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'website_id' => $this->details->id, //website ids
            'user_id' => $this->user->id,
            'status' => 'down',
            'downtime' => $this->details->updated_at,
            'message' => 'Whoops! '.strtoupper($this->details->site_info['site_name']).' is DOWN since '.$this->details->updated_at.' '.$this->details->site_info['site_url']
        ];
    }
}
