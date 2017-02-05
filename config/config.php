<?php

Config::setSettings('site_name', 'BeeJeeTaskManager');
Config::setSettings('routes', array(
   'default' => '',
    'admin' => 'admin_',
));
Config::setSettings('default_route', 'default');
Config::setSettings('default_controller', 'tasks');
Config::setSettings('default_action', 'index');

Config::setSettings('db_dsn', 'mysql:dbname=mvc;host=localhost');
Config::setSettings('db_user', 'root');
Config::setSettings('db_password', 'superroot');

Config::setSettings('salt', '2kfit947tmfd98jiw36qpfl702w8fk50');

Config::setSettings('img_directory', '/webroot/img');
Config::setSettings('upload_img_white_list', array('image/jpg','image/gif','image/png'));
Config::setSettings('img_width_for_resize', '320');
Config::setSettings('img_height_for_resize', '240');

Config::setSettings('sub_domen', 'taivsjuhbawieruhwgbp');
Config::setSettings('sub_domen', 'TESTBEEJEE');


