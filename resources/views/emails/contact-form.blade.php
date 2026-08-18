@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot

    {{-- Body --}}
    # New Contact Form Submission

    You have received a new message from your website's contact form.

    **Name:** {{ $formData['name'] }}  
    **Email:** {{ $formData['email'] }}  
    **Subject:** {{ $formData['subject'] }}

    **Message:**  
    {{ $formData['message'] }}

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        @endcomponent
    @endslot
@endcomponent
