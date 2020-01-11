window.onload = function(){
    var ftList = document.getElementById('ft_list');
    var addTask = document.getElementById('addTask');
    var allTask = [];

    submitTask = function (value) {
        var newTask = document.createElement('div');
        newTask.innerHTML = value;
        newTask.style.backgroundColor = 'white';
        newTask.style.borderRadius = '50px';
        newTask.style.margin = '0 auto';
        newTask.style.width = '90%';
        newTask.style.height = '40px';
        newTask.style.padding = '10px';
        newTask.style.marginBottom = '10px';
        if (allTask.length > 0) {
            ftList.insertBefore(newTask, allTask[allTask.length - 1]);
        } else {
            ftList.appendChild(newTask);
        }
        allTask.push(newTask);
        newTask.addEventListener('click', function(e) {
            var answer = window.confirm('Voulez-vous supprimer la task suivante :\n' + newTask.innerHTML);
            if (answer) {
                allTask.splice(allTask.indexOf(newTask), 1);
                newTask.remove();
            }
            saveTodo();
        });
    }

    addTask.addEventListener('click', function(event) {
        var answer = prompt('Which task do yo want to add ?');
        if (answer != null) {
            submitTask(answer);
            saveTodo();
        }
    })

    saveTodo = function() {
        var taskToSave = [];
        allTask.forEach((task) => {
            taskToSave.push(task.innerHTML);
        })
        var expire = new Date();
        expire.setFullYear(expire.getFullYear() + 10);
    
        document.cookie = "todo=" + JSON.stringify(taskToSave) + ";expires=" + expire.toUTCString() + ";path=/;";
    }

    getCookie = function(name) {
        var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        if (match) return match[2];
        return null;
      }

    loadTask = function () {
        var cookie = getCookie('todo');
        if (cookie) {
           var todoTask = JSON.parse(cookie);
            if (todoTask.length > 0) {
                todoTask.forEach((task) => {
                    submitTask(task);
                });
            } 
        }
        
    }
    loadTask();
};