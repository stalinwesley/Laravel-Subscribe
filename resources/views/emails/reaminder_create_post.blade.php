@component('mail::message')
# Introduction

New Post Published in {{ $email_content['website_title']}} Web site.
<br>
Title: {{ $email_content['title']}}
<br>
Description: {{ $email_content['description']}}




Thanks,<br>
{{ config('app.name') }}
@endcomponent
