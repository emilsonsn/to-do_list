function atualizar (id){
    let tarefa = document.getElementById('tarefa_'+id);
    let form = document.createElement("form");
    form.style.height = "10px";
    form.method = "POST";
    form.action = "tarefa_controller.php?acao=atualizar";

    let inputId = document.createElement("input");
    inputId.name = 'id';
    inputId.value = id;
    inputId.type = 'hidden';

    
    let input = document.createElement("input");
    input.type = 'text';
    input.name = "tarefa";
    input.setAttribute("id","input-text");
    if(tarefa.innerHTML.trim()[0] != '<'){
    let texto = tarefa.innerHTML.trim().split('(');
    input.value = texto[0];
    }
    

    let button = document.createElement("input");
    button.type = 'submit';
    button.classList = 'btn btn-info';
    button.setAttribute("onclick","requisicaoUpdate()");

    tarefa.innerHTML = "";
    form.appendChild(input);
    form.appendChild(button);
    form.appendChild(inputId);
    tarefa.appendChild(form);
}

function deletar(id){
    const url = 'tarefa_controller.php?acao=deletar'
    const requisicao = new XMLHttpRequest();
    requisicao.open("POST", url,true);
    requisicao.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    requisicao.send(`id=${id}`);
    requisicao.onreadystatechange = ()=>{
        if(requisicao.readyState ==4){
            console.log(requisicao.responseText);
            window.location.reload();
        }
    }
}

function marcarRealizada(id){
    const url = 'tarefa_controller.php?acao=marcar'
    const requisicao = new XMLHttpRequest();
    requisicao.open("POST", url,true);
    requisicao.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    requisicao.send(`id=${id}`);
    requisicao.onreadystatechange = ()=>{
        if(requisicao.readyState ==4){
            console.log(requisicao.responseText);
            window.location.reload();
        }
    }
}

