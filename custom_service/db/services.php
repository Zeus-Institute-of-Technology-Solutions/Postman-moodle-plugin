<?php

defined('MOODLE_INTERNAL') || die();
$functions = array(
    'local_custom_service_get_client_token' => array(
        'classname' => 'getClientToken',
        'classpath' => 'local/custom_service/libs/token.php',
        'description' => 'Get Token',
        'type' => 'write',
        'ajax' => true,
    ),
    'local_custom_service_get_refresh_token' => array(
        'classname' => 'refreshToken',
        'classpath' => 'local/custom_service/libs/refresh.php',
        'description' => 'Refresh endpoint',
        'type' => 'write',
        'ajax' => true,
    ),
    'local_custom_service_course_subscribe' => array(
        'classname' => 'subscribeToCourse',
        'classpath' => 'local/custom_service/libs/subscribe.php',
        'description' => 'Refresh endpoint',
        'type' => 'write',
        'ajax' => true,
    ),
    'local_custom_service_course_access' => array(
        'classname' => 'accessCourse',
        'classpath' => 'local/custom_service/libs/accessurl.php',
        'description' => 'Refresh endpoint',
        'type' => 'write',
        'ajax' => true,
    ),
);

$services = array(
    'Postman Moodle Plugin' => array(
        'functions' => array(
            'local_custom_service_update_courses_lti',
            'local_custom_service_update_courses_sections'
        ),
        'restrictedusers' => 0,
        'enabled' => 1,
    )
);