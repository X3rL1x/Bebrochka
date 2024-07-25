document.getElementById('addTaskButton').addEventListener('click', addTask);
document.getElementById('taskInput').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        addTask();
    }
});
document.getElementById('deleteAllButton').addEventListener('click', deleteAllChecked); 

function addTask() {
    const taskInput = document.getElementById('taskInput');
    const taskText = taskInput.value.trim();
    
    if (taskText !== '') {
        const li = document.createElement('li');

        // Получаем текущую дату
        const currentDate = new Date();
        const formattedDate = currentDate.toLocaleDateString();

        // Добавляем текст заметки и дату
        li.textContent = `${taskText} (${formattedDate})`;

        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.addEventListener('change', function() {
            li.classList.toggle('completed', this.checked);
        });

        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Удалить';
        deleteButton.addEventListener('click', function () {
            li.remove();
        });

        li.appendChild(checkbox);
        li.appendChild(deleteButton);
        document.getElementById('taskList').appendChild(li);
        
        taskInput.value = '';
        taskInput.focus();
    }
}

function deleteAllChecked() {
    const taskList = document.getElementById('taskList');
    const checkedItems = taskList.querySelectorAll('li input[type="checkbox"]:checked');

    checkedItems.forEach(checkbox => {
        const li = checkbox.parentElement;
        li.remove();
    });
}