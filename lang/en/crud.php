<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Update successfully',
        'removed' => 'Successfully removed',
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ],
    ],

    'customers' => [
        'name' => 'Customers',
        'index_title' => 'Customers List',
        'new_title' => 'New Customer',
        'create_title' => 'Create Customer',
        'edit_title' => 'Edit Customer',
        'show_title' => 'Show Customer',
        'inputs' => [
            'customer_name' => 'Customer Name',
            'customer_phone_number' => 'Customer Phone Number',
            'tour_no' => 'Tour No',
            'unique_id' => 'Unique Id',
        ],
    ],

    'guides' => [
        'name' => 'Guides',
        'index_title' => 'Guides List',
        'new_title' => 'New Guide',
        'create_title' => 'Create Guide',
        'edit_title' => 'Edit Guide',
        'show_title' => 'Show Guide',
        'inputs' => [
            'unique_id' => 'Guid No',
            'guid_first_name' => 'Guid First Name',
            'guid_last_name' => 'Guid Last Name',
        ],
    ],

    'hotels' => [
        'name' => 'Hotels',
        'index_title' => 'Hotels List',
        'new_title' => 'New Hotel',
        'create_title' => 'Create Hotel',
        'edit_title' => 'Edit Hotel',
        'show_title' => 'Show Hotel',
        'inputs' => [
            'hotel_name' => 'Hotel Name',
            'hotel_place' => 'Hotel Place',
            'unique_id' => 'Hotel Unique Id',
        ],
    ],

    'questions' => [
        'name' => 'Questions',
        'index_title' => 'Questions List',
        'new_title' => 'New Question',
        'create_title' => 'Create Question',
        'edit_title' => 'Edit Question',
        'show_title' => 'Show Question',
        'inputs' => [
            'question' => 'Question',
            'question_category_id' => 'Question Category',
            'unique_id' => 'Question Unique Id',
        ],
    ],

    'question_categories' => [
        'name' => 'Question Categories',
        'index_title' => 'Question Categories List',
        'new_title' => 'New Question category',
        'create_title' => 'Create Question Category',
        'edit_title' => 'Edit Question Category',
        'show_title' => 'Show Question Category',
        'inputs' => [
            'name' => 'Name',
            'unique_id' => 'Question Categories Id',
        ],
    ],

    'response_types' => [
        'name' => 'Response Types',
        'index_title' => 'ResponseTypes List',
        'new_title' => 'New Response type',
        'create_title' => 'Create ResponseType',
        'edit_title' => 'Edit ResponseType',
        'show_title' => 'Show ResponseType',
        'inputs' => [
            'name' => 'Name',
            'unique_id' => 'ResponseTypes Id',
        ],
    ],

    'tours' => [
        'name' => 'Tours',
        'index_title' => 'Tours List',
        'new_title' => 'New Tour',
        'create_title' => 'Create Tour',
        'edit_title' => 'Edit Tour',
        'show_title' => 'Show Tour',
        'inputs' => [
            'unique_id' => 'Tour Unique Id',
            'tour_operator' => 'Tour Operator',
            'tour_name' => 'Tour Name',
            'tour_start_date' => 'Tour Start Date',
            'tour_no' => 'Tour No',
        ],
    ],

    'customer_hotels' => [
        'name' => 'Customer Hotels',
        'index_title' => ' List',
        'new_title' => 'New Customer hotel',
        'create_title' => 'Create customer_hotel',
        'edit_title' => 'Edit customer_hotel',
        'show_title' => 'Show customer_hotel',
        'inputs' => [
            'hotel_id' => 'Hotel',
        ],
    ],

    'tour_guides' => [
        'name' => 'Tour Guides',
        'index_title' => ' List',
        'new_title' => 'New Guide tour',
        'create_title' => 'Create guide_tour',
        'edit_title' => 'Edit guide_tour',
        'show_title' => 'Show guide_tour',
        'inputs' => [
            'guide_id' => 'Guide',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'customer_form_urls' => [
        'name' => 'Customer Form Urls',
        'index_title' => 'CustomerFormUrls List',
        'new_title' => 'New Customer form url',
        'create_title' => 'Create CustomerFormUrl',
        'edit_title' => 'Edit CustomerFormUrl',
        'show_title' => 'Show CustomerFormUrl',
        'inputs' => [
            'url_link' => 'Url Link',
            'copy_link' => 'Copy Link',
            'unique_id' => 'Unique Url Id',
            'customer_id' => 'Customer',
            'tour_id' => 'Tour No',
            'status' => 'Status',
            'date' => 'Date',
            'other_details' => 'Other Details',
        ],
    ],

    'feed_back_forms' => [
        'name' => 'Feed Back Forms',
        'index_title' => 'FeedBackForms List',
        'new_title' => 'New Feed back form',
        'create_title' => 'Create FeedBackForm',
        'edit_title' => 'Edit FeedBackForm',
        'show_title' => 'Show FeedBackForm',
        'inputs' => [
            'question_id' => 'Question',
            'customer_id' => 'Customer',
            'response_type_id' => 'Response Type',
            'hotel_id' => 'Hotel',
            'guide_id' => 'Guide',
            'tour_id' => 'Tour',
            'customer_name' => 'Customer Name',
            'customer_tel_phone_number' => 'Customer Tel Phone Number',
            'date' => 'Date',
        ],
    ],
];
