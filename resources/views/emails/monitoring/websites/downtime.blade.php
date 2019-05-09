@component('mail::message')
# Hi {{$user->name}},

<a href="{{$details->site_info['site_url']}}" target="_blank">{{ucfirst($details->site_info['site_name'])}}</a> is DOWN since {{$details->updated_at}}

Monitor robot will alert you when it's up or 

@component('mail::button', ['url' => url('/dashboard/monitoring/uptime/websites/'.$details->id), 'color' => 'red'] )
Take Action
@endcomponent

Sincerely,<br>
{{ CommonHelper::custom_app_name() }} Team
@endcomponent
