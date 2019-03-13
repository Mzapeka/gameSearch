<!doctype html>
<html lang="ru" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Game Search">

    <title>Game Search</title>

    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/main.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Search Games</h1>

        <!-- Notification -->
        <div class="notification"></div>

        <form id="searchForm">
            <div class="form-group">
                <label for="input">Search</label>
                <input type="text" class="form-control" id="input" aria-describedby="searchHelp" placeholder="Enter search text">
                <small id="searchHelp" class="form-text text-muted">Please enter here the game name</small>
            </div>

            <button id="search_button" class="btn btn-primary">Search</button>
        </form>

        <div class="content">
            <div class="card-columns"></div>
        </div>
    </div>
</main>

<footer class="footer mt-auto py-3">
    <div class="container">
        <span class="text-muted"></span>
    </div>
</footer>

<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.js"></script>
<script src="/assets/js/gameSearch.js"></script>

</body>
</html>

