<?php
/*
=====================================================
 DLE VQMOD Installer
-----------------------------------------------------
 Site: dle-vqmod.ru
=====================================================
*/

if (!defined('E_DEPRECATED')) {
	error_reporting(E_ALL ^ E_NOTICE);
	ini_set('error_reporting', E_ALL ^ E_NOTICE);
} else {
	error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);
	ini_set('error_reporting', E_ALL ^ E_DEPRECATED ^ E_NOTICE);
}

define('DATALIFEENGINE', true);
define('ROOT_DIR', dirname(__FILE__));
define('ENGINE_DIR', ROOT_DIR . '/engine');
define('LANG_DIR', ROOT_DIR . '/language/');

require_once ENGINE_DIR . "/inc/include/functions.inc.php";
require_once ENGINE_DIR . "/data/config.php";
require_once ENGINE_DIR . "/classes/mysql.php";
require_once ENGINE_DIR . "/data/dbconfig.php";
require_once ENGINE_DIR . "/modules/sitelogin.php";
require_once ENGINE_DIR . "/classes/install.class.php";

@header("Content-type: text/html; charset=" . $config['charset']);
if ($config['langs'] == 'Russian' OR $config['langs'] == 'Ukrainian') {
	require_once LANG_DIR . $config['langs'] . "/adminpanel.lng";
	$lang = array(
		'm01' => "Начать установку",
		'm02' => "Установить",
		'm03' => "Удалить",
		'm04' => "Автор",
		'm05' => "Версия",
		'm06' => "Страница DLE VQMOD",
		'm07' => "Форум поддержки",
		'm08' => "Установка завершена",
		'm10' => "удалите этот файл для окончания установки",
		'm11' => "DLE VQMOD удален",
		'm21' => "Автоматически будет создана резервная копия в /install/backup",
		'm22' => "Если вы уверены что всё впорядке, ",
		'm23' => "нажмите кнопку",
		'm24' => "обновлять",
		'm25' => "Сайт",
		'm26' => "Перевод",
		'm27' => "Ошибка",
		'm28' => "Эта версия VQMOD не совместима с вашей версией DLE",
		'm29' => "Вы можете найти VQMOD для вашей версии DLE тут",
		'm30' => "Произошла ошибка",
		'm31' => "Вы должны войти в систему как администратор, чтобы иметь возможность установить VQMOD",
		'm32' => "Установка окончена",
		'm33' => "Перейти на сайт",
		'm34' => "Ручная установка",
		'm35' => "Выполните вручную эти инструкции, если получили сообщение об ошибке. Не забудьте сделать резервную копию вашего сайта, чтобы восстановить в случае неудачной установки",
		'm36' => "Количество файлов для изменения:",
		'm37' => "Количество правок:",
		'm38' => "<b>Внимание:</b> Ручная установка используется как запасной вариант. Рекомендуется воспользоваться автоматической установкой!",
		'm39' => "Результат поиска №",
		'm40' => "на ",
		'm41' => " строк",
		'm42' => "Выше вставить",
		'm43' => "Заменить на",
		'm44' => "Ниже вставить",
		'm45' => "Перед ним в ту же строку вставить",
		'm46' => "После него в ту же строку вставить",
		'm47' => "Пропустить шаг, если в файле присутствует:",
		'm48' => "Найти:"
	);
} else {
	require_once LANG_DIR . "English/adminpanel.lng";
	$lang = array(
		'm01' => "Start Installation",
		'm02' => "Install",
		'm03' => "Uninstall",
		'm04' => "Author",
		'm05' => "Release Date",
		'm06' => "DLE VQMOD Page",
		'm07' => "Support Forum",
		'm08' => "Installation Finished",
		'm10' => "delete this file to finish installation",
		'm11' => "DLE VQMOD Uninstalled",
		'm21' => "Auto backup your site in /install/backup",
		'm22' => "If you are sure that everything is okay, ",
		'm23' => "click button",
		'm24' => "Upgrade",
		'm25' => "Site",
		'm26' => "Translation",
		'm27' => "Error",
		'm28' => "This vqmod version not compatible with your DLE version.",
		'm29' => "You can find VQMOD for your version DLE here",
		'm30' => "An error occurred",
		'm31' => "You must log in admin to be able to install the VQMOD",
		'm32' => "Setup done",
		'm33' => "Go to site",
		'm34' => "Manual install",
		'm35' => "Follow these instructions by hand, if you get an error message. Do not forget to make a backup of your site in order to restore a failed installation",
		'm36' => "File count to change:",
		'm37' => "Number of edits:",
		'm38' => "<b>Attention:</b> Manual install is used as a fallback. It is recommended to use the automatic installation!",
		'm39' => "Search result #",
		'm40' => "in ",
		'm41' => " lines",
		'm42' => "Before paste",
		'm43' => "Replaced by",
		'm44' => "After paste",
		'm45' => "Insert the code before the search inline instead of the line before",
		'm46' => "Insert the code afterthe search inline instead of the line before",
		'm47' => "If the found, the operation is skipped :",
		'm48' => "Find:"
	);
}

function mainTable_head($title) {
	echo "<div class=\"box\"><div class=\"box-header\"><div class=\"title\"><div class=\"box-nav\"><font size=\"2\">{$title}</font></div></div></div><div class=\"box-content\"><table class=\"table table-normal\">";
}

function mainTable_foot() {
	echo "</table></div></div>";
}

function Table_head($title) {
	echo "<div class=\"box\"><div class=\"box-header\"><div class=\"title\"><div class=\"box-nav\"><font size=\"2\">{$title}</font></div></div></div><div class=\"box-content\">";
}

function Table_foot() {
	echo "</div></div>";
}

$module = array(
	'name' => "DLE VQMOD",
	'icon' => "code",
	'modver' => "2.6.1",
	'ifile' => "install_module.php",
	'file11_0' => "vqmod-install-11_0.xml",
	'file11_1' => "vqmod-install-11_1.xml",
	'link' => "http://dle-vqmod.ru",
	'image' => "",
	'author_n' => "WebAir Studio",
	'author_s' => "http://webair-studio.ru",
);

if ($is_logged && $member_id['user_group'] == "1") {

	echoheader("<i class=\"icon-" . $module['icon'] . "\"></i>" . $module['name'], $lang['m01']);
	echo <<< HTML
<script src="engine/skins/javascripts/application.js"></script>
<script type='text/javascript' src='engine/classes/highlight/highlight.code.js'></script>

<script>function done_edit( id ) { $("tr#edit_" + id).fadeOut(); }</script>
<style type="text/css">.primary-sidebar,.newsbutton,.navbar-right,.sidebar-background,.pull-right,.navbar-toggle,.navbar-collapse-top{display:none;} .main-content{margin:0!important;} .box{ width: 75%; margin: auto !important;}</style>
HTML;

	if ($_REQUEST['action'] == "install") {

		$mod = new VQEdit();
		$mod->backup = True;
		$mod->bootup($path = ROOT_DIR, $logging = True);
		if ($config['version_id'] == "11.0") {
			$mod->file(ROOT_DIR . "/install/xml/" . $module['file11_0']);
		} else {
			if ($config['version_id'] == "11.1") {
				$mod->file(ROOT_DIR . "/install/xml/" . $module['file11_1']);
			} else {
				mainTable_head($lang['m27']);
				echo "<div style=\"padding:10px; background: #990000; color: #fff;\">{$lang['m28']}<br />{$lang['m29']} :<br /><br /><i>{$module['link']}</i></div>";
				mainTable_foot();
				echofooter();
				die();
			}
		}
		$mod->close();
		mainTable_head($lang['m32']);
		$stat_info = str_replace("install.php", $module['ifile'], $lang['stat_install']);
		echo <<< HTML
	<table width="100%" class="table table-normal">
		<tr>
			<!--<td width="210" align="center" valign="middle" style="padding:4px;">
				<img src="{$module['image']}" alt="" />
			</td>-->
			<td style="padding: 10px;" valign="top" width="100%">
				<b><a href="{$module['link']}">{$module['name']}</a></b><br /><br />
				<b>{$lang['m04']}</b> : <a href="{$module['author_s']}">{$module['author_n']}</a><br />{$translation}
				<b>{$lang['m05']}</b> : <font color="#555555">{$module['modver']}</font><br />
				<b>{$lang['m25']}</b> : <a href="{$module['link']}">{$module['link']}</a><br />
				<br /><br />
				<b><font color="#BF0000">{$module['ifile']}</font> {$lang['m10']}</b><br />
			</td>
		</tr>
		<tr>
			<td width="150" align="left" style="padding:4px;">
				<input type="button" onclick="window.location='http://dle-vqmod.ru/'" value="dle-vqmod.ru" class="btn btn-blue" />
			</td>
			<td colspan="1" style="padding:4px;" align="right">
				<input type="button" onclick="window.location='{$config['http_home_url']}'" value="{$lang['m33']}" class="btn btn-green" />
			</td>
		</tr>
	</table>
HTML;
		mainTable_foot();
	} else {
		if ($_REQUEST['action'] == "manual") {
			if (function_exists('file_get_contents')) {
				$xmlstr = file_get_contents(ROOT_DIR . "/install/xml/" . $module['file']);
			} else {
				$h = fopen(ROOT_DIR . "/install/xml/" . $module['file'], 'r');
				$xmlstr = fread($h, filesize(ROOT_DIR . "/install/xml/" . $module['file']));
				fclose($h);
			}
			$xml = new SimpleXmlElement($xmlstr);
			$_EDITIONS = array();
			$proc_count = 0;
			foreach ($xml->file as $e) {
				$file = strval($e->attributes());
				if (isset($e->operation[0])) {
					foreach ($e->operation as $a) {
						$_EDITIONS[$file][] = array(
							'ignoreif' => htmlentities(trim($a->ignoreif), ENT_QUOTES),
							'search' => htmlentities(trim($a->search), ENT_QUOTES),
							'add' => htmlentities(trim($a->add), ENT_QUOTES),
							'operation' => $a->search->attributes()
						);
					}
				} else {
					$_EDITIONS[$file][] = array(
						'ignoreif' => htmlentities(trim($e->operation->ignoreif), ENT_QUOTES),
						'search' => htmlentities(trim($e->operation->search), ENT_QUOTES),
						'add' => htmlentities(trim($e->operation->add), ENT_QUOTES),
						'operation' => $e->operation->search->attributes()
					);
				}
				$proc_count = $proc_count + count($_EDITIONS[$file]);
			}
			Table_head($lang['m34']);
			$edit_count = count($_EDITIONS);
			ksort($_EDITIONS);
			echo <<< HTML
<div class="row box-section">
	<div class="alert alert-info">{$lang['m35']}<br />
	{$lang['m36']} {$edit_count}&nbsp;&nbsp;-&nbsp;&nbsp;{$lang['m37']} {$proc_count}</div>
	<div class="alert alert-danger">{$lang['m38']}</div>
	<div class="accordion" id="accordion">
HTML;
			$file_count = 0;
			foreach ($_EDITIONS as $file => $operations) {
				$file_hash = md5($file);
				$file_count++;
				echo <<< HTML
<div class="accordion-group">
	<div class="accordion-heading">
		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#{$file_hash}">{$file_count}) Файл - {$file}</a>
	</div>
	<div id="{$file_hash}" class="accordion-body collapse">
		<div class="accordion-inner padded">
HTML;
				foreach ($operations as $opid => $operation) {
					$process = "";
					if (isset($operation['operation']->index)) {
						$process .= $lang['m39'] . $operation['operation']->index;
					}
					if (isset($operation['operation']->offset)) {
						$process .= $lang['m40'] . $operation['operation']->offset . $lang['m41'];
					}
					$pro_lang = array(
						"before" => $lang['m42'],
						"replace" => $lang['m43'],
						"after" => $lang['m44'],
						"ibefore" => $lang['m45'],
						"iafter" => $lang['m46'],
					);
					$_pp = strval($operation['operation']->position);
					$do_it = (!empty($process)) ? $pro_lang[$_pp] . " (" . $process . ")" : $pro_lang[$_pp];

					if ($operation['ignoreif'] !== "") {
						echo <<< HTML
	<h5>{$lang['m47']}</h5>
	<div class="code"><pre><code class="php">{$operation['ignoreif']}</code></pre></div>
HTML;
					}
					echo <<< HTML
	<h5>{$lang['m48']}</h5>
				<div class="code"><pre><code class="php">{$operation['search']}</code></pre></div>
				<h5>{$do_it}:</h5>
				<div class="code"><pre><code class="php">{$operation['add']}</code></pre></div>
				<hr />
HTML;
				}
				echo <<< HTML
		</div>
	</div>
</div>
HTML;
			}
			Table_foot();
			echo <<< HTML
	</div>
</div>
<script>hljs.initHighlightingOnLoad();</script>
HTML;

		} else {

			mainTable_head($lang['m01']);
			echo <<< HTML
	<table width="100%" class="table table-normal">
		<tr>
			<!--<td width="210" align="center" valign="middle" style="padding:4px;">
				<img src="{$module['image']}" alt="" />
			</td>-->
			<td style="padding: 10px;" valign="top" width="100%">
				<b><a href="{$module['link']}">{$module['name']}</a></b><br /><br />
				<b>{$lang['m04']}</b> : <a href="{$module['author_s']}">{$module['author_n']}</a><br />{$translation}
				<b>{$lang['m05']}</b> : <font color="#555555">{$module['modver']}</font><br />
				<b>{$lang['m25']}</b> : <a href="{$module['link']}">{$module['link']}</a><br />
				<br /><br />
				<b><font color="#BF0000">{$lang['m01']} ...</font></b><br /><br />
				<b>*</b> {$lang['m21']}<br />
				<b>*</b> {$lang['m22']} {$lang['m23']} <font color="#51A351"><b>{$lang['m02']}</b></font><br />
			</td>
		</tr>
		<tr>
			<td width="150" align="left" style="padding:4px;"></td>
			<td colspan="1" style="padding:4px;" align="right">
				<form method="post" action="{$PHP_SELF}">
					<input type="hidden" value="manual" name="action" />
					<input type="submit" value="{$lang['m34']}" class="btn btn-gold" />
				</form>
			</td>
			<td colspan="1" style="padding:4px;" align="right">
				<form method="post" action="{$PHP_SELF}">
					<input type="hidden" value="install" name="action" />
					<input type="submit" value="{$lang['m02']}" class="btn btn-green" />
				</form>
			</td>
		</tr>
	</table>
HTML;

			mainTable_foot();
		}
	}
	echofooter();
} else {
	msg("home", $lang['m30'], $lang['m31'], $config["http_home_url"]);
}
?>