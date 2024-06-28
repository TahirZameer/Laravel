<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Page for Laravel blade framework practice</h1>
    <h2>Welcome, {{$user ?? "Tahir Zameer"}} </h2>
    <b>Now Conditional operators</b><br>
    @if($user == "")
        {{"User is empty 🤷‍♀️🤷‍♀️"}}
    @elseif($user != "")
        {{"User is not empty 👨‍🎓"}}
    @endif
    <br><br><br>
    <b>Now Conditional operators unless</b>
    <br>
    @unless($user == "Tahir Zameer")
        {{"It's not Me 🤷‍♀️🤷‍♀️"}}
    @endunless
</body>
</html>