<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lugas Chat</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
</head>
<body>
    <livewire:counter />
    {{-- <div id="app" class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                kiri
            </div>
            <div class="col-md-7">
                kanan
            </div>
        </div>
    </div> --}}
    {{-- <script src="{{ asset('js/app.js') }}"></script>
    <script>
        Echo.channel('channelname_1')
            .listen('ChatEvent', (e) => {
                console.log(e);
            });
    </script> --}}
    @livewireScripts
</body>
</html>
