<!doctype html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel AI</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full grid place-items-center p-6">
    @if(session()->has('file'))
        <div>
            <iframe src="https://giphy.com/embed/R6gvnAxj2ISzJdbA63" width="480" height="480" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
            <a
                href="{{ asset(session('file')) }}"
                download=true
                class="block w-full text-center mt-3 rounded p-2 bg-gray-200 hover:bg-gray-300 transition"
            >Download Audio</a>

            <audio src="{{ asset(session('file')) }}" controls class="block w-full mt-3"></audio>
        </div>
    @else
        <form action="/roast" method="POST" class="w-full lg:max-w-md lg:mx-auto">
        @csrf
            <div class="flex gap-2">
                <input name="topic" type="text"placeholder="What do you want to roast?" class="border rounded p-2 flex-1">
                <button type="submit" class="rounded p-2 bg-gray-200 hover:bg-gray-300 transition">Roast</button>
            </div>
        </form>
    @endif
</body>
</html>
