<?php

return [
    
    /*
    |--------------------------------------------------------------------------
    | Routes group config
    |--------------------------------------------------------------------------
    |
    | The default group settings for the elFinder routes.
    |
    */
    
    'route'          => [
        'prefix'     => 'translations',
        'middleware' => 'web',
        'auth',
    ],
    /**
     * Enable deletion of translations
     *
     * @type boolean
     */
    'delete_enabled' => true,
    
    /**
     * Exclude specific groups from Laravel Translation Manager.
     * This is useful if, for example, you want to avoid editing the official Laravel language files.
     *
     * @type array
     *
     *    array(
     *        'pagination',
     *        'reminders',
     *        'validation',
     *    )
     */
    'exclude_groups' => [],
    
    /**
     * Exclude specific languages from Laravel Translation Manager.
     *
     * @type array
     *
     *    array(
     *        'fr',
     *        'de',
     *    )
     */
    'exclude_langs'  => [],
    
    /**
     * Export translations with keys output alphabetically.
     */
    'sort_keys '     => false,
    
    'trans_functions'    => [
        'trans',
        'trans_choice',
        'Lang::get',
        'Lang::choice',
        'Lang::trans',
        'Lang::transChoice',
        '@lang',
        '@choice',
        '__',
        '$trans.get',
    ],
    
    /**
     * Enable pagination of translations
     *
     * @type boolean
     */
    'pagination_enabled' => true,
    
    /**
     * Define number of translations per page
     *
     * @type integer
     */
    'per_page'           => 40,
    
    /* ------------------------------------------------------------------------------------------------
     | Set Views options
     | ------------------------------------------------------------------------------------------------
     | Here you can set The "extends" blade of index.blade.php
    */
    'layout'             => 'admin::layouts.master',
    /**
     * Choose which  template to use [bootstrap3, bootstrap4 ]
     */
    'template'           => 'bootstrap4',

];
