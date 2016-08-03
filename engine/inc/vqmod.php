<?php
/*
=====================================================
 DataLife Engine vQmod - by WebAir 
-----------------------------------------------------
 http://dle-vqmod.ru/
-----------------------------------------------------
 Copyright (c) 2016 WebAir
=====================================================
 Данный код защищен авторскими правами
=====================================================
 Файл: vqmod.php
-----------------------------------------------------
 Назначение: Управления и создание vQmod модулей
=====================================================
*/

if( !defined( 'DATALIFEENGINE' ) OR !defined( 'LOGGED_IN' ) ) {
	die( "Hacking attempt!" );
}

echoheader("<i class=\"icon-code\"><b>&lt;/&gt;</b></i>".$lang['vqmod_module_name'], $lang['vqmod_module_desc']);
echo "<style>#vqmod-iframe{width: 100%;padding-left:20px;border:none;height:-webkit-calc(100vh - 170px);height:-moz-calc(100vh - 170px);height:calc(100vh - 170px);}</style><div class='box'><iframe id='vqmod-iframe' src='/vqgen/'></div>";
echofooter();
?>