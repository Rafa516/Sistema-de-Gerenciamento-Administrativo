<?php

use \Projeto\PageAdmin;
use \Projeto\Model\Usuario;
use \Projeto\Model\Itinerario;
use \Projeto\Model\Componente;
use \Projeto\Model\Unidade;
use \Projeto\Model\Cidade;

//------------------ROTA DA PÁGINA DE LOGIN--------------------------------//

$app->get('/admin/login', function() {  

	
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login-admin",[
		'error'=>Usuario::getError(),
		'profileMsg'=>Usuario::getSuccess(),
	]);

});


//---------ROTA PARA ENCERRAR A SESSÃO----------------------//

$app->get('/admin/logout', function() {

	Usuario::logout();

	header("Location: /admin/login");
	exit;

});

//---------ROTA PARA DELETAR O USUÁRIO----------------------//

$app->get("/admin/usuarios/delete/:id_usuario",function($id_usuario){

	$usuario = new Usuario();

	$usuario->get((int)$id_usuario);

	$usuario->deletarUsuario();

	Usuario::setSuccess("Usuário removido com sucesso.");

	header("Location: /admin/usuarios");
 	exit;
});



//---------ROTA DO FORMULÁRIO DE LOGIN----------------------//

$app->post('/admin/login', function() {

	try {

		Usuario::login($_POST['login'], $_POST['senha']);

	} catch(Exception $e) {

		Usuario::setError($e->getMessage());

		header("Location: /admin/login");
		exit;

	}

	header("Location: /admin");
	exit;

});

//---------ROTA PARA O ENCERRAMENTO DA SESSÃO (LOGOUT)----------------------//

$app->get('/admin/logout', function() {

	Usuario::logout();

	header("Location: /admin/login");
	exit;

});

//---------ROTA PARA A PÁGINA INDEX (HOME) ----------------------//

$app->get('/admin', function() {  


	Usuario::verificaLoginAdmin();

	$page = new PageAdmin();

	$page->setTpl("admin");

});

//---------ROTA PARA A PÁGINA DO PAINEL DE DADOS ----------------------//

$app->get('/admin/painel', function() {  


	Usuario::verificaLoginAdmin();

	$itinerarios = new Itinerario();

	$unidades = new Unidade();

	$page = new PageAdmin();

	$page->setTpl("admin-painel",[
		"itinerarios"=>$itinerarios->getItinerariosGrafico(),
		"unidades"=>$unidades->getUnidadesGrafico(),
		"educacaoInfantil"=>$unidades->getUnidadesEducacaoInfantil(),
		"educacaoInfantilFundamental"=>$unidades->getUnidadesInfantilFundamental(),
		"educacaoFundamental"=>$unidades->getUnidadesFundamental(),
		"educacaoFundamentalMedio"=>$unidades->getUnidadesFundamentalMedio(),
		"educacaoMedio"=>$unidades->getUnidadesMedio(),
		"diretores"=>$unidades->getDiretores(),
		"viceDiretores"=>$unidades->getViceDiretores(),
		"supervisores"=>$unidades->getListaSupervisores(),
		"chefeSecretaria"=>$unidades->getChefeSecretaria(),
		"coordenadoresPedagogicos"=>$unidades->getListaCoordenadoresPedagogicos()
	]);

});

//---------ROTA PARA A PÁGINA UTILIDADES----------------------//

$app->get('/admin/utilidades', function() {  


	Usuario::verificaLoginAdmin();

	$itinerarios = new Itinerario();

	$componentes = new Componente();

	$cidades = new Cidade();


	$page = new PageAdmin();

	$page->setTpl("admin-utilidades",[
            "itinerarios"=>$itinerarios->getItinerariosCadastrados(), 
			"componentes"=>$componentes->getComponentes(),
			"cidades"=>$cidades->getCidades()           
        ]);

});

//---------ROTA PARA A PÁGINA DOS USUÁRIOS CADASTRADOS----------------------//

$app->get('/admin/usuarios', function() {  


	Usuario::verificaLoginAdmin();

	$usuario = new Usuario();


	$search = (isset($_GET['search'])) ? $_GET['search'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = $usuario->getPageSearchUsers($search, $page);

	} else {

		$pagination = $usuario->getPageUsers($page);

	}

	$pages = [];

	for ($i=1; $i <= $pagination['pages']; $i++) { 
		array_push($pages, [
			'link'=>'/admin/usuarios?page='.$i,
			'page'=>$i,
			'search'=>$search,
			
	]);
		
	}

	$page = new PageAdmin();
	
	
	$page->setTpl("admin-usuarios", array(	
		"usuarios"=>$pagination['data'],
		"search"=>$search,
		'profileMsg'=>Usuario::getSuccess(),
		'errorRegister'=>Usuario::getErrorRegister(),
		"pages"=>$pages
		
	));

});


//---------ROTA PARA O REGISTRO DOS USUÁRIOS----------------------//

$app->post("/admin/usuarios/registro", function(){

	if (Usuario::checkEmailExist($_POST['email']) === true) {

		Usuario::setErrorRegister("Este endereço de e-mail já está sendo usado por outro usuário.");
		header("Location: /admin/usuarios");
		exit;

	}

	if (Usuario::checkLoginExist($_POST['login']) === true) {

		Usuario::setErrorRegister("Este Login já está sendo usado por outro usuário.");
		header("Location: /admin/usuarios");
		exit;

	}

	$usuario = new Usuario();

	$usuario->setData([
		'inadmin'=>$_POST['inadmin'],
		'login'=>$_POST['login'],
		'nome_user'=>$_POST['nome_user'],
		'email'=>$_POST['email'],
		'senha'=>$_POST['senha'],
		'foto'=>0
	]);

	$usuario->cadastroUsuario();

	Usuario::setSuccess("Usuário cadastrado com sucesso");

	header('Location: /admin/usuarios');
	exit;

});


//---------ROTA PARA EDITAR OS USUÁRIOS----------------------//

$app->get('/admin/usuarios/editar/:id_usuario', function($id_usuario){
 
   Usuario::verificaLoginAdmin();
 
   $usuario = new Usuario();
 
   $usuario->get((int)$id_usuario);
 
   $page = new PageAdmin();
 
   $page ->setTpl("admin-usuario-editar", array(
        "usuario"=>$usuario->getValues(),
        'profileMsg'=>Usuario::getSuccess(),
        'errorRegister'=>Usuario::getErrorRegister()  
    ));
 
});

//---------ROTA PARA O ENVIO DO FORMULÁRIO DE EDIÇÃO DOS USUÁRIOS----------------------//

$app->post("/admin/usuarios/editar/:id_usuario",function($id_usuario){

	Usuario::verificaLoginAdmin();

	$usuario = new Usuario();


	$usuario->get((int)$id_usuario);
 
  	$usuario->setData($_POST);

  	$usuario->editarUsuario();

  	Usuario::setSuccess("Dados alterados com Sucesso");

  	header("Location: /admin/usuarios");
  	exit;


});

//---------ROTA PARA  A PÁGINA DO PERFIL DO USUÁRIO----------------------//

$app->get('/admin/perfil', function() {  


	Usuario::verificaLoginAdmin();

	$page = new PageAdmin();

	$page->setTpl("admin-perfil",[
	'alteracaoErro'=>Usuario::getError(),
	'alteracaoSucesso'=>Usuario::getSuccess()
	]);

});


//---------ROTA PARA ALTERAR OS DADOS DO USUÁRIO - POST----------------------//

$app->post("/admin/perfil/editar/:id_usuario", function ($id_usuario) {

	$usuario = new Usuario();

	$usuario->get((int)$id_usuario);

	$usuario->setData($_POST);

	$usuario-> editarUsuario();

	header('Location: /admin/login');
	exit;

});

//---------ROTA PARA ALTERAR A FOTO DO PERFIL DO USUÁRIO - POST---------------------//

$app->post("/admin/perfil/editar-imagem/:id_usuario", function ($id_usuario) {

	$usuario = new Usuario();

	$usuario->get((int)$id_usuario);

	$usuario->setData($_POST);

	$usuario->alterarImagemPerfil();

	header('Location: /admin/login');
	exit;

});

//---------ROTA PARA ALTERAR SENHA DO USUÁRIO  - POST---------------------//

$app->post("/perfil/alterar-senha-admin", function(){



	if ($_POST['senha_atual'] === $_POST['nova_senha']) {

		Usuario::setError("A sua nova senha deve ser diferente da atual.");
		header("Location: /admin/perfil");
		exit;		

	}

	$usuario = Usuario::getFromSession();

	if (!password_verify($_POST['senha_atual'], $usuario->getsenha())) {

		Usuario::setError("A senha atual está inválida.");
		header("Location: /admin/perfil");
		exit;			

	}

	$usuario->setsenha($_POST['nova_senha']);
	// var_dump($usuario);
	// exit;	

	$usuario->editarSenha();

	Usuario::setSuccess("Senha alterada com sucesso.");

	header("Location: /admin/perfil");
	exit;

});

//---------ROTA PARA ALTERAR SENHA DOS USUÁRIOS  - POST---------------------//

$app->post("/perfil/alterar-senha-usuarios/:id_usuario", function($id_usuario){

	$usuario = new Usuario();
	
	$usuario->get((int)$id_usuario);

	$usuario->setsenha($_POST['nova_senha']);
	// var_dump($usuario);
	// exit;	

	$usuario->editarSenha();

	Usuario::setSuccess("Senha alterada com sucesso.");

	header("Location: /admin/usuarios/editar/".$id_usuario);
	exit;

});

//---------ROTA PARA A PÁGINA DE TODOS OS DocumentoS ----------------------//
$app->get('/admin/historico', function() {  


	Usuario::verificaLoginAdmin();

	$usuario = new Usuario();



	$search = (isset($_GET['search'])) ? $_GET['search'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = $usuario->getPageSearch($search, $page);

	} else {

		$pagination = $usuario->getPageAll($page);

	}

	$pages = [];

	for ($i=1; $i <= $pagination['pages']; $i++) { 
		array_push($pages, [
			'link'=>'/admin/historico?page='.$i,
			'page'=>$i,
			'search'=>$search,
		]);
	}

	$page = new PageAdmin();

	$page->setTpl("admin-historico",[
		
		"historicos"=>$pagination['data'],
		"total"=>$pagination['total'],
		"search"=>$search,
		'profileMsg'=>usuario::getSuccess(),
		"pages"=>$pages,
		"values"=>$usuario->getValues()
	]);

});




