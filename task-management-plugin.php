<?php
/*
Plugin Name: Task Management Plugin
Description: A simple task management plugin.
Version: 1.0
Author: Your Name
*/

// Register activation and deactivation hooks if needed
register_activation_hook(__FILE__, 'task_management_plugin_activate');
register_deactivation_hook(__FILE__, 'task_management_plugin_deactivate');

// Include necessary files
require_once plugin_dir_path(__FILE__) . 'task-functions.php';

// Add your plugin's functions and hooks here
