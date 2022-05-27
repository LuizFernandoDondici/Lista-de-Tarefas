
// Evento para alterar cor do input quando estiver vazio.

let insertTarefa = document.querySelector("#insert-tarefa");

insertTarefa.addEventListener("keyup", ()=>{

    if (insertTarefa.value.length > 0) {
        insertTarefa.style.borderColor = 'green';
    } else {
        insertTarefa.style.borderColor = 'red';
    }
});