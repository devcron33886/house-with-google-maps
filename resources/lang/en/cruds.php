<?php

return [
    'userManagement'    => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'        => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role'              => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user'              => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'name'                      => 'Name',
            'name_helper'               => ' ',
            'email'                     => 'Email',
            'email_helper'              => ' ',
            'email_verified_at'         => 'Email verified at',
            'email_verified_at_helper'  => ' ',
            'password'                  => 'Password',
            'password_helper'           => ' ',
            'roles'                     => 'Roles',
            'roles_helper'              => ' ',
            'remember_token'            => 'Remember Token',
            'remember_token_helper'     => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'mobile'                    => 'Mobile',
            'mobile_helper'             => ' ',
            'profile_image'             => 'Profile Image',
            'profile_image_helper'      => ' ',
            'verified'                  => 'Verified',
            'verified_helper'           => ' ',
            'verified_at'               => 'Verified at',
            'verified_at_helper'        => ' ',
            'verification_token'        => 'Verification token',
            'verification_token_helper' => ' ',
        ],
    ],
    'category'          => [
        'title'          => 'Category',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'house'             => [
        'title'          => 'House',
        'title_singular' => 'House',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'category'            => 'Category',
            'category_helper'     => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'price'               => 'Price',
            'price_helper'        => ' ',
            'price_status'        => 'Price Status',
            'price_status_helper' => ' ',
            'currency'            => 'Select Currency',
            'currency_helper'     => ' ',
            'payment_time'        => 'Payment Time',
            'payment_time_helper' => ' ',
            'bedrooms'            => 'Bedrooms',
            'bedrooms_helper'     => ' ',
            'bathrooms'           => 'Bathrooms',
            'bathrooms_helper'    => ' ',
            'floors'              => 'Number Floors',
            'floors_helper'       => ' ',
            'latitude'            => 'Latitude',
            'latitude_helper'     => ' ',
            'longitude'           => 'Longitude',
            'longitude_helper'    => ' ', 'cover_photo'              => 'Upload House cover Photo',
            'cover_photo_helper'       => ' ',
            'photos'              => 'Upload HousePhotos',
            'photos_helper'       => ' ',
            'description'         => 'House Description',
            'description_helper'  => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'created_by'          => 'Created By',
            'created_by_helper'   => ' ',
            'house_status'        => 'House Status',
            'house_status_helper' => ' ',
        ],
    ],
    'address'           => [
        'title'          => 'Address',
        'title_singular' => 'Address',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'house'              => 'Choose House',
            'house_helper'       => ' ',
            'address_one'        => 'Address Line 1',
            'address_one_helper' => ' ',
            'address_two'        => 'Address Line 2',
            'address_two_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'booking'           => [
        'title'          => 'Booking',
        'title_singular' => 'Booking',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'house'             => 'Choose House',
            'house_helper'      => ' ',
            'names'             => 'Names',
            'names_helper'      => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'mobile'            => 'Mobile number',
            'mobile_helper'     => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'day'               => [
        'title'          => 'Day',
        'title_singular' => 'Day',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'infrastructure'    => [
        'title'          => 'Infrastructure',
        'title_singular' => 'Infrastructure',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'house'             => 'House',
            'house_helper'      => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'latitude'          => 'Latitude',
            'latitude_helper'   => ' ',
            'longitude'         => 'Longitude',
            'longitude_helper'  => ' ',
            'photos'            => 'Photos',
            'photos_helper'     => ' ',
            'active'            =>'Active',
            'active_helper'     =>'',
            'address'           =>'Infrastructure Address',
            'address_helper'    =>'',
            'working_hours'     =>'Working Hours',
            'working_hours_helper' =>'',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
            'day'               => 'Day',
            'day_helper'        => ' ',
        ],
    ],
    'taskManagement'    => [
        'title'          => 'Task management',
        'title_singular' => 'Task management',
    ],
    'taskStatus'        => [
        'title'          => 'Statuses',
        'title_singular' => 'Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'taskTag'           => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'task'              => [
        'title'          => 'Tasks',
        'title_singular' => 'Task',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'status'             => 'Status',
            'status_helper'      => ' ',
            'tag'                => 'Tags',
            'tag_helper'         => ' ',
            'attachment'         => 'Attachment',
            'attachment_helper'  => ' ',
            'due_date'           => 'Due date',
            'due_date_helper'    => ' ',
            'assigned_to'        => 'Assigned to',
            'assigned_to_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'tasksCalendar'     => [
        'title'          => 'Calendar',
        'title_singular' => 'Calendar',
    ],
    'contactManagement' => [
        'title'          => 'Contact management',
        'title_singular' => 'Contact management',
    ],
    'contactCompany'    => [
        'title'          => 'Companies',
        'title_singular' => 'Company',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'company_name'           => 'Company name',
            'company_name_helper'    => ' ',
            'company_address'        => 'Address',
            'company_address_helper' => ' ',
            'company_website'        => 'Website',
            'company_website_helper' => ' ',
            'company_email'          => 'Email',
            'company_email_helper'   => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated At',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted At',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'contactContact'    => [
        'title'          => 'Contacts',
        'title_singular' => 'Contact',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'company'                   => 'Company',
            'company_helper'            => ' ',
            'contact_first_name'        => 'First name',
            'contact_first_name_helper' => ' ',
            'contact_last_name'         => 'Last name',
            'contact_last_name_helper'  => ' ',
            'contact_phone_1'           => 'Phone 1',
            'contact_phone_1_helper'    => ' ',
            'contact_phone_2'           => 'Phone 2',
            'contact_phone_2_helper'    => ' ',
            'contact_email'             => 'Email',
            'contact_email_helper'      => ' ',
            'contact_skype'             => 'Skype',
            'contact_skype_helper'      => ' ',
            'contact_address'           => 'Address',
            'contact_address_helper'    => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated At',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted At',
            'deleted_at_helper'         => ' ',
        ],
    ],
    'subscriber'        => [
        'title'          => 'Subscriber',
        'title_singular' => 'Subscriber',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
];
