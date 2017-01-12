<!DOCTYPE html>
<html>
<head>
    <title>404-kowloon</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <meta name="description" content="Kowloon 404 page">

    <link href="/css/app.css" rel="stylesheet">

</head>
<body>
<style>
    .page_404 {
        position: fixed; /* or absolute */
        top: 50%;
        left: 50%;
        width: 75%;
        height: auto;
        transform: translate(-50%, -50%);
    }
    .button{
        position: fixed; /* or absolute */
        top: 85%;
        left: 43%;
        width: 100%;
        height: auto;

    }
</style>

<div class="container-fluid">
    <a href="{{url('/')}}" class="thumbnail">
        <img class="page_404" src="{{url('/images/404/404.png')}}" alt="404 kowloon">
    </a>
    <div class="button">
        <a href="{{url('/')}}"> <button class="btn btn-default">Return to home page</button></a>
    </div>
</div>


</div>
</body>
</html>
