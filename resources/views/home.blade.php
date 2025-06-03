<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
    
    <!-- For Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

    <!-- For Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body style="font-family: Space Mono">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-gray-300 space-y-9 p-9 rounded-md shadow-lg">
            <div class="text-center">
                <h1 class="text-xl"><strong class="select-none underline-offset-2 hover:underline "> TODO APP WITH LARAVEL</strong></h1>
            </div>

            <form action="">
                <div class="bg-white rounded-2xl flex items-center justify-center">
                    <input class="w-full rounded-xl p-2 focus:outline-none focus:ring-2 focus:ring-gray-500" type="text" required placeholder="Add your task">
                    <div class="p-0.5 rounded-2xl bg-green-500 hover:bg-green-600 duration-300">
                        <button class="cursor-pointer">
                            <span class="material-symbols-outlined p-2">add_circle</span>
                        </button>
                    </div>
                </div>
            </form>
            <div>
                <hr>
                <!-- ITEMS -->
                <div class="mt-3">
                    <div class="mb-2">
                        <h1 class="text-2xl font-semibold" >Tasks</h1>
                    </div>
                    <div>
                        <!-- FOREACH LOOP -->
                        <div class="p-3 bg-white flex items-center  space-x-2 rounded-md">
                            <p 
                            id="task"
                            class="cursor-pointer  font-medium px-1 rounded-md select-none "
                            onclick="lineThrough()">MESSAGEMESSAGEMESSAGEMESSAGEMESSAGE</p>
                            <div class="flex space-x-2 justify-center items-center">
                                <div class="flex"><span class="material-symbols-outlined">schedule</span> Tue Oct 17 2023</div>
                                <span class="material-symbols-outlined cursor-pointer rounded-md  hover:bg-green-500 duration-300">edit</span>
                                <span class="material-symbols-outlined cursor-pointer rounded-md  hover:bg-red-500 duration-300">delete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        function lineThrough(){
            const task = document.getElementById("task")
            task.classList.toggle("line-through")
        }
    </script>
</body>
</html>