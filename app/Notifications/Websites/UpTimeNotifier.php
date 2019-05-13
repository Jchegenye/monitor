<?php

namespace Monitor\Notifications\Websites;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;

use Monitor\ReusableCodes\Helpers\CommonHelper;

class UpTimeNotifier extends Notification
{
    use Queueable;

    private $details;
    private $user;
    private $notify;
    private $totalDuration;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details,$user,$notify,$totalDuration)
    {
        $this->details = $details;
        $this->user = $user;
        $this->notify = $notify;
        $this->totalDuration = $totalDuration;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [''];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // return (new MailMessage)
        //             ->subject(strtoupper($this->details->site_info['site_name'])." IS UP | WEBSITE STATUS")
        //             ->markdown('emails.monitoring.websites.uptime', [
        //                 'details' => $this->details, 
        //                 'user' => $this->user, 
        //                 'notify' => $this->notify,
        //                 'totalDuration' => $this->totalDuration
        //             ]);
    }

    /**
     * Get the Slack representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return SlackMessage
     */
    public function toSlack($notifiable)
    {
        // return (new SlackMessage)
        //     ->from(CommonHelper::custom_app_name().' | '.$this->details->site_info['site_name'])
        //     ->image('https://laravel.com/favicon.png')
        //     ->content('Good news! '.strtoupper($this->details->site_info['site_name']).' is UP again at '.$this->details->updated_at.' Downtime took '.$this->totalDuration.'. '.$this->details->site_info['site_url']);
    }

}
