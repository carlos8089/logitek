<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logitek</title>
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="nav-bar">
                        <ul>
                            <div class="nav-li"><a type="button" href=""></a>Se connecter</div>
                            <div class="nav-li"><a type="button" href=""></a>S'enregistrer</div>
                        </ul>
                    </div>
                </div>
                <div class="row" id="search-zone"></div>
                    <form action="result.php" method="post">
                        <div class="col-9">
                            <input type="text" name="searchkey" id="searchinp">
                        </div>
                        <div class="col-8">
                            <button type="submit" id="searchbtn">Go</button>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="row"><p><h3>Les plus recommandés</h3></p></div>
                </div>
        </div>
    </div>

</body>
</html>
