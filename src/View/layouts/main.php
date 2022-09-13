<?php use App\Core\Application; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>MVC Framework 1.0</title>
</head>
<body>
<header>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark py-3" aria-label="Fourth navbar example">
        <div class="container-fluid container">

            <!-- BRAND LOGO -->
            <a class="navbar-brand" href="/">
                <span class="p-2"><small class="fw-bold fs-6">MVC</small>Framework</span>
            </a>

            <!-- MOBILE HAMBURGER-->
            <button class="navbar-toggler border-0 fs-5" type="button" data-bs-toggle="collapse"
                    data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- MENU -->
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav align-items-center mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="docs">Documentation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pricing">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-center mt-4 mt-md-0">
                    <li class="nav-item me-md-2">
                        <a href="login" class="text-white btn btn-gray py-1">Sign in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="register">Register</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</header>

<main class="container p-3 py-6">
    <?php if (Application::$app->session->getFlash('success')): ?>
        <div class="alert alert-success">
            <?= Application::$app->session->getFlash('success')?>
        </div>
    <?php endif; ?>

    {{content}}
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
</body>
</html>