<?php 
 require_once 'cabecalho.php';

if(isset($_POST['IDvasc_vac'])){
   $IDvasc_vac=$_POST['IDvasc_vac'];
   require_once 'model/Vacina.php';
   $consulta=acharVacinaVac($IDvasc_vac);
   if (!$consulta){
   	   return "<h2>Vacina não encontrada!</h2>";
   }else{
   	  while($linha=$consulta->fetch_assoc()){ 
?>
<form id="cadanimal"  action="alterarVacinaVaca.php" method="POST">
	<h1>Alterar vacina</h1>
</br>
	<p>Nome da vacina: <input type="text" name="nome" size="40" maxlength="40" value="<?php echo $linha['Nomevasc_vac']; ?>"></p>
	<p>Tipo da vacina: <input type="text" name="tipo" size="40" maxlength="40" value="<?php echo $linha['Tipovasc_vac']; ?>"></p>
	<p>Data da aplicação: <input type="date" name="data" value="<?php echo $linha['Dataapli_vac']; ?>"></p>
	<p>Próxima aplicação: <input type="date" name="proxima" value="<?php echo $linha['proximaapli_vac']; ?>"></p>
  <p>Identificação bovino: <input type="text" name="identificacao" size="30" maxlength="30" value="<?php echo $linha['Identificacao_vac']; ?>"></p>
		
       <input type="hidden" name="IDvasc_vac" value="<?php echo $linha['IDvasc_vac']; ?>">
	   <h3><input type="submit" onclick='mostra()' class="enviar" name="Cadastrar"></h3>
</form>	

<div id="load">
  <div>G</div>
  <div>N</div>
  <div>I</div>
  <div>D</div>
  <div>A</div>
  <div>O</div>
  <div>L</div> 
</div>

<?php 
      }	
   }
} 

if (isset($_POST['nome'])) {
	    $nome=$_POST['nome'];
    	$tipo=$_POST['tipo'];
    	$data=$_POST['data'];
    	$proxima=$_POST['proxima'];
      $identificacao=$_POST['identificacao'];
    	$IDvasc_vac=$_POST['IDvasc_vac'];

    	require_once 'model/Vacina.php';
    	$resposta=alterarVacinaVaca($IDvasc_vac,$nome,$tipo,$data,$proxima,$identificacao);
    	if (!$resposta) {
    		echo "<h5>Erro na tentativa de alterar!</h5>";
    	}else{
    		echo "<h5>Alterado com sucesso!</h5>";
    	}
}
?>

<script src="js/mensagem.js"></script>
</body>
</html>