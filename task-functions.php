<?php
// Register custom post type for tasks
function register_task_post_type() {
    $labels = array(
        'name'               => _x('Tasks', 'post type general name', 'textdomain'),
        'singular_name'      => _x('Task', 'post type singular name', 'textdomain'),
        'menu_name'          => _x('Tasks', 'admin menu', 'textdomain'),
        'name_admin_bar'     => _x('Task', 'add new on admin bar', 'textdomain'),
        'add_new'            => _x('Add New', 'task', 'textdomain'),
        'add_new_item'       => __('Add New Task', 'textdomain'),
        'new_item'           => __('New Task', 'textdomain'),
        'edit_item'          => __('Edit Task', 'textdomain'),
        'view_item'          => __('View Task', 'textdomain'),
        'all_items'          => __('All Tasks', 'textdomain'),
        'search_items'       => __('Search Tasks', 'textdomain'),
        'parent_item_colon'  => __('Parent Tasks:', 'textdomain'),
        'not_found'          => __('No tasks found.', 'textdomain'),
        'not_found_in_trash' => __('No tasks found in Trash.', 'textdomain')
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __('Task management for your site.', 'textdomain'),
        'public'             => true,
        'menu_icon'          => 'dashicons-list-view',
        'supports'           => array('title', 'editor', 'comments'),
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'tasks'),
    );

    register_post_type('task', $args);
}
add_action('init', 'register_task_post_type');
function add_task($title, $content) {
    $task_data = array(
        'post_title'   => $title,
        'post_content' => $content,
        'post_status'  => 'publish',
        'post_type'    => 'task',
    );

    $task_id = wp_insert_post($task_data);

    return $task_id;
}
// Example: Add a meta box to display tasks
function task_management_meta_box() {
    add_meta_box(
        'task-details',
        'Task Details',
        'display_task_details',
        'task',
        'normal',
        'default'
    );
}

function display_task_details($post) {
    // Display task details here
}
add_action('add_meta_boxes_task', 'task_management_meta_box');
