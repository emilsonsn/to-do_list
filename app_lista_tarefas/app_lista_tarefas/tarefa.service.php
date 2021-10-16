<?php
    class TarefaService{

        private $conexao;
        private $tarefa;

        public function __construct($conexao,$tarefa){
            $this->conexao = $conexao->conectar();
            $this->tarefa = $tarefa;
        }

        public function inserir(){
             if($this->tarefa->tarefa!=""){
             $query = "insert into tb_tarefas(tarefa) values(:tarefa)";
             $smtp = $this->conexao->prepare($query);
             $smtp->bindvalue(":tarefa",$this->tarefa->__get('tarefa'));
             $smtp->execute();
            }
        }

        public function recuperar(){
            $query = 'select tb_tarefas.id,status,tarefa from tb_tarefas,tb_status where tb_tarefas.id_status=tb_status.id';
            $smtp = $this->conexao->prepare($query);
            $smtp->execute();
            return $smtp->fetchAll();
        }

        public function atualizar(){
            $query = "update tb_tarefas set tarefa = :tarefa where id = :id;";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':tarefa',$this->tarefa->__get('tarefa'));
            $stmt->bindValue(':id',$this->tarefa->__get('id'));
            $stmt->execute();
            // header( 'Location : todas_tarefas.php');
        }

        public function deletar(){
            $query = "delete from tb_tarefas where id = :id;";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id',$this->tarefa->__get('id'));
            $stmt->execute();
            echo '{"status":"sucesso"}';
        }

        public function marcarRealizada(){
            $query = "update tb_tarefas set id_status = ? where id = ?;";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1,$this->tarefa->__get('id_status'));
            $stmt->bindValue(2,$this->tarefa->__get('id'));
            $stmt->execute();
        }
    }
?>