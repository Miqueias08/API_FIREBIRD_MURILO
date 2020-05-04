<?php
	Route::get('/client/contas/pagas/{cpf}',"Api\ConsultasController@ContasPagas");
	Route::get('/client/contas/abertas/{cpf}',"Api\ConsultasController@ContasAbertas");
