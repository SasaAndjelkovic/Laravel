<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

       
    </head>
    <body>
        <article>
            <?= $post; ?>  
        </article>

        <a href="/">Go back</a>

    </body>
</html>