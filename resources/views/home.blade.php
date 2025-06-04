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

            <form action="/add" method="POST">
                @csrf
                @method("POST")
                <div class="bg-white rounded-2xl flex items-center justify-center">
                    <input class="w-full rounded-xl p-2 focus:outline-none focus:ring-2 focus:ring-gray-500" type="text" required placeholder="Add your task" name="task">
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
                        @foreach ($tasks as $task)
                        <x-item :task="$task"/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        function lineThrough(taskID){
            const task = document.getElementById(`taskItem-${taskID}`)
            task.classList.toggle("line-through")
            const isLined = task.classList.contains("line-through")

            fetch("/edit-lined",{
                method:"PUT",
                headers:{
                    'Content-Type':"application/json",
                    "X-CSRF-Token":"{{csrf_token()}}"
                },
                body:JSON.stringify({"taskID":taskID,"lined":isLined})
            }).catch((err)=>console.err(err))
        }

        function deleteTask(taskID){
            console.log("sa")
            fetch('/delete',{
                method:"DELETE",
                headers:{
                    'Content-Type':"application/json",
                    "X-CSRF-Token":"{{csrf_token()}}"
                },
                body:JSON.stringify({"taskID":taskID})
            }).then((response)=>{
                if(response.ok){
                    document.getElementById(`taskField-${taskID}`).remove()
                }
            }).catch((err)=>console.log(err))
        }

        function enableEditBox(taskID){
            const editBox = document.getElementById(`taskEditBox-${taskID}`)
            const taskItem = document.getElementById(`taskItem-${taskID}`)
            editBox.classList.toggle("hidden")
            taskItem.classList.toggle("hidden")

            editBox.focus()

            editBox.addEventListener("keydown",function(e){
                if(e.key == "Enter"){
                    const message = editBox.value
                    updateTask(taskID,message)
                }
            })

            function updateTask(taskID,newMessage){
                fetch("/edit",{
                    method:"PUT",
                    headers:{
                    'Content-Type':"application/json",
                    "X-CSRF-Token":"{{csrf_token()}}"
                },
                body:JSON.stringify({"taskID":taskID,"newMessage":newMessage})
                }).then((response)=>{
                    if(response.ok){
                        taskItem.textContent = newMessage
                        editBox.classList.add("hidden")
                        taskItem.classList.remove("hidden")
                    }
                })
            }
        }
    </script>
</body>
</html>