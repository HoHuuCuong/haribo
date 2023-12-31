<?php

/**
 *
 * Eloquent Table Configuration File
 *
 * @package EloquentTable
 */
return [

    /*
     * Add as many attributes as you like here. These will
     * exist on all tables unless you specifically call the
     * attributes method on the returned collection itself.
     *
     * @var array
     */
    'default_table_attributes' => [

        'class' => 'table table-responsive-lg table-bordered table-sm mb-0'

    ],

    /*
     * Add as many attributes you like here. These
     * attributes will exist on all table columns
     * which have been specifically set to be hidden
     * using the hidden() function on the collection
     * itself.
     *
     * @var array
     */
    'default_hidden_column_attributes' => [

        'class' => 'd-none d-sm-block',

    ],

    /*
     * These class names are used for showing the icons
     * for a collection that is currently sorted. If you use
     * something like font awesome, be sure to set the correct
     * classes here, such as 'fa fa-sort-desc'
     *
     * @var array
     */
    'default_sorting_icons' => [

        'sort_class' => 'fas fa-sort',
        'asc_sort_class' => 'fas fa-angle-up',
        'desc_sort_class' => 'fas fa-angle-down',

    ],

];