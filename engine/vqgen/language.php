<?php
/**
 * vQmod XML Generator v3.3.0
 *
 * Generate XML files for use with vQmod.
 * Built-in File Manager and Log Viewer.
 *
 * For further information please visit {@link http://www.vqmod.com/}
 *
 * @author Simon Powers - UK Site Buidler Ltd <info@uksitebuilder.net> {@link http://uksb.github.com/vqgen/}
 * @copyright Copyright (c) 2013, UK Site Builder Ltd
 * @version $Id: language.php, v3.3.0 2013-08-19 22:30:00 sp Exp $
 * @license http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution-ShareAlike 3.0 Unported License
 */

// General
define('PACKAGE_NAME', 'Создание и редактирование модулей');
define('OPENING_STATEMENT', '');
define('FILL_OUT_FORM', '');

// vQmod Files Pull Down section
define('VQMOD_FILES_INACTIVE', 'Недавно созданные, отредактированные и неактивные vQmod модули');
define('VQMOD_FILES_ACTIVE', 'Активные vQmod модули');
define('DELETE_VQMOD_CACHE', 'vQmod кэш будет обновлен при включении/удалении модуля');
define('ENABLE_ALL', 'Включить ВСЕ');
define('TH_FILENAME', 'Модуль');
define('TH_ACTION', 'Действие');
define('VER', 'Версия:');
define('VQMOD', 'vQmod:');
define('SIZE', 'Размер:');
define('DATE', 'Дата:');
define('VQMOD_AUTHOR', 'Автор:');
define('EDIT', 'Редактировать');
define('ENABLE', 'Включить');
define('GET', 'Скачать');
define('DELETE', 'Удалить');
define('DELETE_CONFIRM', 'Вы уверены, что хотите удалить: ');
define('DISABLE_VQMOD_CACHE', 'vQmod кэш будет обновлен при выключении/удалении <br>Модуль будет выключен при редактировании и кэш vQmod будет обновлен');
define('DISABLE_ALL', 'Выключить ВСЕ');
define('DISABLE', 'Выключить');

// vQmod Log Pull Down section
define('VQMOD_LOG_FILES', 'vQmod лог файлы');
define('CLEAR_VQMOD_LOGS', 'Очистить ВСЕ vQmod логи');
define('CLEAR_THIS_LOG', 'Очистить текущий vQmod лог');
define('LOG_LARGE', 'Лог файл слишком большой (больше %dmb) - Либо скачайте %s , либо удалите лог файл');
define('LOG_EMPTY', '%s пуст - Нет сообщений об ошибках - Ура!');

// vQmod Cache Pull Down section
define('VQMOD_CACHE_FILES', 'vQmod кэш файлы');
define('CLEAR_VQMOD_CACHE', 'Очистить vQmod кэш');
define('CLEAR_MODS_CACHE', 'Очистить mods.cache файл');
define('CACHE_FILES', 'vQmod кэш файлы: ');
define('CHOOSE_ONE', 'Выбрать файл');
define('CHOOSE_CACHE_FILE', 'Выберите файл кэша из выпадающего меню, чтобы просмотреть его содержимое
	
Если вы только что создали или изменили XML-файл vQmod, посетите главную страницу вашего сайта, чтобы были созданы файлы vQmod кэша');
define('CACHE_IS_EMPTY', ' пуст - Выберите файл кэша из выпадающего меню, чтобы просмотреть его содержимое');

// Buttons
define('CREATE_NEW_FILE', 'Создать новый файл');
define('ENABLE_THIS_VQMOD', 'Включить этот vQmod');
define('ADD_OPERATION', 'Добавить новую операцию');
define('ADD_FILE', 'Добавить новый файл');
define('START_OVER', 'Начать сначала');
define('GENERATE_XML_FILE', 'Сохранить модуль');

// Legends
define('GENERAL_FILE_INFO', 'Информация о модуле');
define('FILE_TO_EDIT', 'Файл для редктирования');
define('OPERATION_TO_PERFORM', 'Операция для выполнения');

// Labels
define('FILENAME', '<b>Имя файла:</b>');
define('FILENAMES', '<b>Имя файла:</b>');
define('TITLE', '<b>Описание:</b>');
define('FILE_VERSION', '<b>Версия модуля:</b>');
define('VQMOD_VERSION', '<b>vQmod версия:</b>');
define('AUTHOR', '<b>Автор:</b>');
define('PATH_TO_FILENAMES', '<b>Путь к файлу:</b>');
define('REMOVE_ON_GENERATE', 'Удалить при генерации');
define('INFO', '<b>Описание:</b>');
define('SEARCH', '<b>Найти:</b>');
define('POSITION', '<b>Действие:</b>');
define('OFFSET', '<b>Смещение:</b>');
define('INDEX', '<b>По счету:</b>');
define('ERROR', '<b>Ошибка:</b>');
define('REGEX', '<b>Рег. выражение:</b>');
define('IGNOREIF', '<b>Пропустить, если:</b>');

// Help Text
define('FILENAME_HELP', '');
define('TITLE_HELP', 'Название модуля или краткое описание');
define('FILE_VERSION_HELP', 'Версия модуля');
define('VQMOD_VERSION_HELP', 'Минимальная требуемая версия vQmod');
define('AUTHOR_HELP', 'Имя автора или веб сайт');
define('INFO_ASSIST', 'Описание операции');
define('SEARCH_ASSIST', 'Строка или часть строки');
define('POSITION_HELP', 'Выберите тип операции');
define('OFFSET_ASSIST', '');
define('OFFSET_HELP', 'Добавить/заменить - до/после определенного кол-ва строк относительно поисковой строки. Только целое число');
define('INDEX_ASSIST', '');
define('INDEX_HELP', 'Какой по счету результат поиска использовать. Один или несколько значений через запятую. По умолчанию заменяются все');
define('ERROR_ASSIST', '');
define('ERROR_HELP', 'На случай безрезультатного поиска. Лог - запись ошибки в файл.');
define('REGEX_ASSIST', '');
define('REGEX_HELP', 'Для использования регулярных выражений при поиске, выберите Вкл');
define('IGNOREIF_ASSIST', 'Пропустить операцию, если найдена строка');
define('IGREGEX_HELP', 'Для использования регулярных выражений при пропуске операции, выберите Вкл');
define('ADD_ASSIST', 'Вставьте ваш код');

// Select Lists Text
define('REPLACE', 'Заменить');
define('BEFORE', 'Добавить до');
define('AFTER', 'Добавить после');
define('IBEFORE', 'Добавить на ту же строку до');
define('IAFTER', 'Добавить на ту же строку после');
define('TOP', 'Добавить в начало файла');
define('BOTTOM', 'Добавить в конец файла');
define('ALL', 'Заменить весь файл');
define('ABORT_LOG', 'Прервать и лог');
define('SKIP_LOG', 'Пропустить и лог');
define('SKIP_NO_LOG', 'Пропустить без лога');
define('ISTRUE', 'Вкл');
define('ISFALSE', 'Выкл');
define('ADD', 'Добавить');
define('NEW_OPERATIONS', 'новых операций');
define('NOW', 'Сейчас!');

// Alerts
define('CLEAR_REMOVE_ON_GENERATE', "Пожалуйста, снимите галочку с \'Удалить при генерации\', для этого файла, если вы хотите добавить новую операцию.\\n\\nВ качестве альтернативы, вы можете добавить новый файл для редактирования.");

// Messages
define('FILE_GENERATED', 'Успешно сохранено в ');
define('CONTENT', 'Контент');
define('MODULES_BTN', 'Модули vQmod');
define('LOG_BTN', 'Лог ошибок');
define('CACHE_BTN', 'Кэш vQmod');
define('LOADING', 'Загрузка...');
define('DONATE', '');
define('CLEARED_MODSCACHE', 'Файл кэша mods.cache очищен!');
define('CLEARED_VQCACHE', 'Папка кэша vqmod/vqcache очищена!');
define('CLEARED_VQCACHEFILE', 'vqmod/vqcache/%s удален!');
define('CLEARED_ALL_LOGS', 'Все лог файлы в vqmod/logs удалены!');
define('CLEARED_LOG_FILE', 'vqmod/logs/%s удален!');
define('VQMOD_FILE_DELETED', 'vqmod/xml/%s удален!');
define('VQMOD_FILE_DISABLED', 'vqmod/xml/%s выключен!');
define('VQMOD_FILES_DISABLED', 'Все модули в vqmod/xml выключены!');
define('VQMOD_FILE_ENABLED', 'vqmod/xml/%s включен!');
define('VQMOD_FILES_ENABLED', 'Все модули в vqmod/xml включены!');
define('ERROR_ADMIN', 'Нет доступа!');
define('ERROR_ADMIN_MSG', 'Вы не авторизованы, либо не являетесь администратором!');
