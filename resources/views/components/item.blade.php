<div id="taskField-{{$task->id}}" class="p-3 bg-white space-x-2 rounded-md mb-3">
    <div class="flex space-x-2 justify-between items-center">
    <p 
    id="taskItem-{{$task->id}}"
    class="{{$task->isLined ? "line-through" : ""}} cursor-pointer  font-medium px-1 rounded-md select-none "
    onclick="lineThrough({{$task->id}})">{{$task->message}}</p>
    <input id="taskEditBox-{{$task->id}}" type="text" class="font-semibold p-1 rounded-md hidden" placeholder="{{$task->message}}">
        <div class="flex">
            <span class="material-symbols-outlined">schedule</span> 
            <p>{{$task->updated_at}}</p>
        </div>
        <div>
            <button onclick="deleteTask({{$task->id}})">
            <span class="material-symbols-outlined cursor-pointer rounded-md hover:bg-red-500 duration-300">delete</span>
            </button>

            <button onclick="enableEditBox({{$task->id}})" >
                <span class="material-symbols-outlined cursor-pointer rounded-md hover:bg-green-500 duration-300">edit</span>
            </button>
        </div>
        
    </div>
</div>   