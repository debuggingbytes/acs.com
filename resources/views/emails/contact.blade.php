@component('mail::message')
# ACS Contact

{{$request->fullName}} has requested to be contacted<br>
<br>
Email: {{$request->email}}<br>
Phone: {{$request->phone}}<br>

Message: <br>
{{$request->comments}}




Thanks,<br>
{{ config('app.name') }}
@endcomponent
