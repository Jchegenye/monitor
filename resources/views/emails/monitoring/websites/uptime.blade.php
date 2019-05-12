@component('mail::message')
# Hi {{$user->name}},

Good news! <a href="{{$details->site_info['site_url']}}" target="_blank">{{ucfirst($details->site_info['site_name'])}}</a> is UP again at {{$details->updated_at}}. 
Downtime took {{$totalDuration}} 

Monitor robot will alert you just in-case {{ucfirst($details->site_info['site_name'])}} goes down again.

Sincerely,<br>
{{ CommonHelper::custom_app_name() }} Team
@endcomponent