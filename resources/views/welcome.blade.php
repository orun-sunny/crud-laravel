<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <script
        src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>

    <style type="text/tailwindcss">
        @layer utilities {
            .container {
                @apply px-10 mx-auto;
            }


        }


    </style>
</head>
<body>
<div class="container">
    <div class="flex justify-between">
        <h1>Hello World</h1>
        <a href="/create" class="bg-green-600 text-white-rounded p-4">Crud new Project</a>
    </div>
</div>
</body>
</html>

