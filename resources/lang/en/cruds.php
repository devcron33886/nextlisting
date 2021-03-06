<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
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
    'role' => [
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
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'mobile'                   => 'Mobile',
            'mobile_helper'            => ' ',
            'address'                  => 'Your Address',
            'address_helper'           => ' ',
        ],
    ],
    'plan' => [
        'title'          => 'Plan',
        'title_singular' => 'Plan',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'slug'               => 'Slug',
            'slug_helper'        => ' ',
            'price'              => 'Price',
            'price_helper'       => ' ',
            'plan_status'        => 'Plan Status',
            'plan_status_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'house' => [
        'title'          => 'House',
        'title_singular' => 'House',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'property_title'        => 'Property Title',
            'property_title_helper' => ' ',
            'slug'                  => 'Slug',
            'slug_helper'           => ' ',
            'price'                 => 'Price',
            'price_helper'          => ' ',
            'area'                  => 'Area',
            'area_helper'           => ' ',
            'bedrooms'              => 'Bedrooms',
            'bedrooms_helper'       => ' ',
            'bathrooms'             => 'Bathrooms',
            'bathrooms_helper'      => ' ',
            'status'                => 'Status',
            'status_helper'         => ' ',
            'house_image'           => 'Upload House Images',
            'house_image_helper'    => ' ',
            'description'           => 'House Description',
            'description_helper'    => ' ',
            'approved'              => 'Approved',
            'approved_helper'       => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'location'              => 'House Location',
            'location_helper'       => ' ',
            'house_address'         => 'House Address',
            'house_address_helper'  => ' ',
            'created_by'            => 'Created By',
            'created_by_helper'     => ' ',
        ],
    ],
    'loaction' => [
        'title'          => 'Loaction',
        'title_singular' => 'Loaction',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'state'             => 'State',
            'state_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'amenity' => [
        'title'          => 'Amenity',
        'title_singular' => 'Amenity',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'parking'               => 'Parking',
            'parking_helper'        => ' ',
            'garage'                => 'Garage',
            'garage_helper'         => ' ',
            'building_age'          => 'Building Age',
            'building_age_helper'   => ' ',
            'air_condition'         => 'Air Condition',
            'air_condition_helper'  => ' ',
            'bedding'               => 'Bedding',
            'bedding_helper'        => ' ',
            'heating'               => 'Heating',
            'heating_helper'        => ' ',
            'internet'              => 'Internet',
            'internet_helper'       => ' ',
            'microwave'             => 'Microwave',
            'microwave_helper'      => ' ',
            'smoking_allow'         => 'Smoking Allow',
            'smoking_allow_helper'  => ' ',
            'terrace'               => 'Terrace',
            'terrace_helper'        => ' ',
            'balcony'               => 'Balcony',
            'balcony_helper'        => ' ',
            'wi_fi'                 => 'Wi Fi',
            'wi_fi_helper'          => ' ',
            'beach'                 => 'Beach',
            'beach_helper'          => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'house'                 => 'Select House',
            'house_helper'          => ' ',
            'property_video'        => 'Property Video',
            'property_video_helper' => ' ',
        ],
    ],
    'houseManagement' => [
        'title'          => 'House Management',
        'title_singular' => 'House Management',
    ],
    'vehicleListing' => [
        'title'          => 'Vehicle Listing',
        'title_singular' => 'Vehicle Listing',
    ],
    'car' => [
        'title'          => 'Car',
        'title_singular' => 'Car',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Car Title',
            'title_helper'       => ' ',
            'slug'               => 'Slug',
            'slug_helper'        => ' ',
            'price'              => 'Price',
            'price_helper'       => ' ',
            'seats'              => 'Number Seats',
            'seats_helper'       => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'status'             => 'Status',
            'status_helper'      => ' ',
            'car_image'          => 'Upload Car Images',
            'car_image_helper'   => ' ',
            'approved'           => 'Approved',
            'approved_helper'    => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'location'           => 'Choose Car Location',
            'location_helper'    => ' ',
            'address'            => 'Address',
            'address_helper'     => ' ',
            'model_year'         => 'Model Year',
            'model_year_helper'  => ' ',
            'created_by'         => 'Created By',
            'created_by_helper'  => ' ',
        ],
    ],
    'vehicleInfo' => [
        'title'          => 'Vehicle Info',
        'title_singular' => 'Vehicle Info',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'car'                   => 'Select Car',
            'car_helper'            => ' ',
            'fuel'                  => 'Fuel',
            'fuel_helper'           => ' ',
            'steeling'              => 'Steeling',
            'steeling_helper'       => ' ',
            'air_bag'               => 'Air Bag',
            'air_bag_helper'        => ' ',
            'transmission'          => 'Transmission',
            'transmission_helper'   => ' ',
            'audio_input'           => 'Audio Input',
            'audio_input_helper'    => ' ',
            'bluetooth'             => 'Bluetooth',
            'bluetooth_helper'      => ' ',
            'heated_seats'          => 'Heated Seats',
            'heated_seats_helper'   => ' ',
            'fm_radio'              => 'Fm Radio',
            'fm_radio_helper'       => ' ',
            'usb_input'             => 'Usb Input',
            'usb_input_helper'      => ' ',
            'gps_navigation'        => 'Gps Navigation',
            'gps_navigation_helper' => ' ',
            'sunroof'               => 'Sunroof',
            'sunroof_helper'        => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'landOrPlotListing' => [
        'title'          => 'Land Or Plot Listing',
        'title_singular' => 'Land Or Plot Listing',
    ],
    'landOrPlot' => [
        'title'          => 'Land Or Plot',
        'title_singular' => 'Land Or Plot',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'title'                 => 'Title',
            'title_helper'          => ' ',
            'slug'                  => 'Slug',
            'slug_helper'           => ' ',
            'price'                 => 'Price',
            'price_helper'          => ' ',
            'location'              => 'Location',
            'location_helper'       => ' ',
            'area'                  => 'Area',
            'area_helper'           => ' ',
            'description'           => 'Land / Plot Description',
            'description_helper'    => ' ',
            'property_image'        => 'Property Images',
            'property_image_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'created_by'            => 'Created By',
            'created_by_helper'     => ' ',
        ],
    ],
    'electronic' => [
        'title'          => 'Electronic',
        'title_singular' => 'Electronic',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'title'                  => 'Title',
            'title_helper'           => ' ',
            'slug'                   => 'Slug',
            'slug_helper'            => ' ',
            'price'                  => 'Price',
            'price_helper'           => ' ',
            'product_image'          => 'Product Image',
            'product_image_helper'   => ' ',
            'description'            => 'Product Description',
            'description_helper'     => ' ',
            'status'                 => 'Status',
            'status_helper'          => ' ',
            'product_gallery'        => 'Product Gallery',
            'product_gallery_helper' => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'subscription' => [
        'title'          => 'Subscription',
        'title_singular' => 'Subscription',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'plan'              => 'Plan',
            'plan_helper'       => ' ',
            'start_from'        => 'Start From',
            'start_from_helper' => ' ',
            'end_at'            => 'End At',
            'end_at_helper'     => ' ',
            'is_active'         => 'Is Active',
            'is_active_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'advert' => [
        'title'          => 'Advert',
        'title_singular' => 'Advert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'image'             => 'Image',
            'image_helper'      => ' ',
            'link'              => 'Advert Link',
            'link_helper'       => ' ',
            'published'         => 'Published',
            'published_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
];
