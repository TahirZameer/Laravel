<!-- resources/views/nextpage.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Next Page</title>
</head>
<body>
    <h1>
        Welcome, {{$user ?? "Tahir Zameer"}} {{$id ?? "23160"}}
    </h1>
    <h2>
        Welcome, {{time()}}
    </h2>
    <h2>
        Welcome, {{date('d-m-y')}}, {{date('d/m/y')}}, {{date('m-d-y')}}
    </h2>
</body>
</html>
