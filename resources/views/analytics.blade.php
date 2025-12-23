@if(config('app.env') == 'production')
    <!-- Google tag (gtag.js) -->
    <!--
        HOW TO USE:
        1. Replace G-XXXXXXXXXX with your Google Analytics Measurement ID.
        2. You can find your Measurement ID in your Google Analytics dashboard
           under Admin > Data Streams > [Your Stream] > Measurement ID.
    -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-B09KB964LQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-B09KB964LQ');
    </script>
@endif
