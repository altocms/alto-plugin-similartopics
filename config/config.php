<?php
/*---------------------------------------------------------------------------
 * @Project: Alto CMS
 * @Project URI: http://altocms.com
 * @Plugin Name: Similar Topics
 * @Plugin ID: similartopics
 * @Description: Similar Topics (defined by tags)
 * @Copyright: Alto CMS Team
 * @License: GNU GPL v2 & MIT
 *----------------------------------------------------------------------------
 */

$config['default_limit'] = 10;

// Настройки виджета для сайдбара
$config['widget_sidebar'] = array(
    'priority' => 200,
    'action'   => array(
        'blog' => array('{topic}'),
    ),
    'display'  => false,
);

// Настройки виджета в подвале топика
$config['widget_showtopic'] = array(
    'limit'       => 2,
    'text_maxlen' => 180,
    'display'     => true,
);

// EOF