<!DOCTYPE html>
<html>
@include('layouts.htmlcore')
<head>
    <title>Upload Files</title>
    @include('layouts.head')
</head>
<body>
    <x-preloading />
    <div class="container">
        <h1>Upload Files</h1>
        <x-cloudinary::widget>Upload Files</x-cloudinary::widget>
    </div>

    @cloudinaryJS
</body>
</html>