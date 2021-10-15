<?php
    require("../../app_lista_tarefas/conexao.php");
    require("../../app_lista_tarefas/tarefa.service.php");
    require("../../app_lista_tarefas/tarefa.model.php");
    
    $conexao = new Conexao();
    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
    if($acao == 'inserir'){
        $tarefa = new Tarefa();
        $tarefa->__set("tarefa",$_POST['tarefa']);

        $tarefaService = new TarefaService($conexao,$tarefa);
        $tarefaService->inserir();
        header("Location: nova_tarefa.php?inclusao=1");

    } else if ($acao=='recuperar'){
        $tarefa = new Tarefa();
        $conecao = new Conexao();
        $tarefaService = new TarefaService($conecao,$tarefa);
        $registros = $tarefaService->recuperar();

    }else if ($acao =="atualizar"){
        $tarefa = new Tarefa();
        $conecao = new Conexao();
        $tarefa->__set('tarefa',$_POST['tarefa']);
        $tarefa->__set('id',$_POST['id']);
        $tarefaService = new TarefaService($conecao,$tarefa);
        $registros = $tarefaService->atualizar();
        header("Location: todas_tarefas.php?update=1");

    }

    else if ($acao =="deletar"){
        $tarefa = new Tarefa();
        $conecao = new Conexao();
        $tarefa->__set('id',$_POST['id']);
        $tarefaService = new TarefaService($conecao,$tarefa);
        $registros = $tarefaService->deletar();
    }

    else if ($acao =="marcar"){
        $tarefa = new Tarefa();
        $conecao = new Conexao();
        $tarefa->__set('id',$_POST['id']);
        $tarefa->__set('id_status',2);
        $tarefaService = new TarefaService($conecao,$tarefa);
        $registros = $tarefaService->marcarRealizada();
    }
?>