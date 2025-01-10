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
        <h1>Create</h1>
        <a href="/" class="bg-green-600 text-white-rounded p-4">Back to home</a>
    </div>
    <div>
        <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
            <div class="flex flex-col gap-4">
                @csrf
                <input type="text" name="name" placeholder="Name" value="{{old('name')}}">
                @error('name')
                <p>{{$message}}</p>
                @enderror
                <input type="text" name="description" placeholder="description" value="{{old('description')}}">
                @error('description')
                <p>{{$message}}</p>
                @enderror
                <input type="file" name="image" id="">
                <div>
                    <input type="submit" value="Submit" class="bg-green-600 text-white-rounded p-4">
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>

