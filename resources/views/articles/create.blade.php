<!DOCTYPE html>
<html lang="en">
<head>
    @vite (['resources/css/app.css', 'resources/js/app.js',])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>글쓰기</title>
</head>

<body class="bg-slate-300">
    <h1>Write</h1>
    <form action="/articles" method="POST">
        @csrf
        <input type="text" name="input_1"/>
        <button>SUBMIT</button>
    </form>
</body>
</html>