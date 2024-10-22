<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex items-center justify-center p-[6rem]">
        <form class="flex flex-col w-[40%] gap-[5px]" action="{{ route('Event.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="name">name</label>
            <input name="name" type="text">
            <label for="date">date</label>
            <input type="datetime-local" name="date" id="">
            <label for="location">location</label>
            <input type="text" name="location" id="">
            <label for="description">description</label>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
            <label for="price">price</label>
            <input type="number" name="price">
            <label for="cover">cover</label>
            <input type="file" name="cover" id="">
            <button>Submit</button>
        </form>
    </div>
</body>

</html>
