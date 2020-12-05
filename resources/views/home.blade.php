<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Speech To Text</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/dropzone.css">
</head>
<body>

<header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="/" class="navbar-brand d-flex align-items-center">
                <strong>Speech To Text</strong>
            </a>
        </div>
    </div>
</header>


<main role="main">
    <section class="jumbotron text-center">
        <p>
            Demo Audio File: <a target="_blank" href="/demo.mp3">Download</a>
        </p>
        <div class="container">
            <div id="dropzone">
                <form action="/speech-to-text" id="myDropzone" class="dropzone"></form>
            </div>

            <div id="results" class="alert alert-success mt-4 d-none"></div>
        </div>
    </section>
</main>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="/assets/dropzone.js"></script>
<script src="/assets/custom.js"></script>
</body>
</html>
