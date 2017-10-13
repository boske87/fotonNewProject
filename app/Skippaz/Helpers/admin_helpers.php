<?php

use Carbon\Carbon;

function admin_asset($path, $secure = null)
{
    return asset('assets/admin/' . $path, $secure);
}

function admin_sort_links($name)
{
    $route = Route::currentRouteName();

    $getParameters = Request::except('sortBy', 'order');

    $links = '<div class="pull-right">
                    <a title="Sort ascending" href="' . route($route, ['sortBy' => $name, 'order' => 'asc'] + $getParameters) . '"><span class="entypo entypo-chevron-up"></span></a>
                    <a title="Sort descending" href="' . route($route, ['sortBy' => $name, 'order' => 'desc'] + $getParameters) . '"><span class="entypo entypo-chevron-down"></span></a>
               </div>';

    return $links;
}

function admin_reorder_link($title = 'Reorder Items')
{
    $route = Route::currentRouteName();
    $getParameters = Request::except('sortBy', 'order');

    $link = '<a class="cms-options-filter-action btn btn-success pull-right" type="button"'
        . ' href="' . route($route, ['reorder_mode' => 1] + $getParameters) . '">'
        . '<span class="entypo entypo-list"></span> ' . $title
        . '</a>';

    return $link;
}


function isReorderMode()
{
    $reorder_mode = Request::input('reorder_mode');

    return $reorder_mode ? true : false;
}

/**
 * User Type level
 *
 * @param $userType
 * @return mixed
 */
function userTypeLevel($userType) {
    return Config::get('users.user_types.' . $userType .'.level');
}

/**
 * User Type Name
 * (based on level)
 * @param $userTypeLevel
 * @return string
 */
function userTypeName($userTypeLevel) {
    $userTypes = Config::get('users.user_types');
    $userTypeName = '';
    foreach( $userTypes as $item ) {
        if($item['level'] == $userTypeLevel) {
            $userTypeName = $item['name'];
            break;
        }
    }
    return $userTypeName;
}

function publish_date_format($item)
{
    if($item->publish_date)
        return date('m/d/Y g:i A', strtotime($item->publish_date));

    return null;
}

function admin_publish_status($item)
{
    $status = '';
    $statusClass = '';

    switch ($item->publish_status) {
        case "future":
            if ( $item->publish_date < Carbon::now() ) {
                $status = 'Published';
                $statusClass = 'publish';
            } else {
                $status = 'Scheduled';
                $statusClass = 'schedule';
            }
            break;
        case "publish":
            $status = 'Published';
            $statusClass = 'publish';
            break;
        case "draft":
            $status = 'Draft';
            $statusClass = 'draft';
            break;
        default:
            echo "Not set";
    }

    $formattedDateTitle = $item->publish_date->format('m/d/Y @ g:i A');
    $formattedDate = $item->publish_date->toFormattedDateString();


    return '<div class="publish-status"><span class="' . $statusClass . '">' . $status . '<span title="'. $formattedDateTitle .'"><br>' . $formattedDate . '</span></span></div>';
}


/**
 * Marks active menu item
 *
 * @param $path
 * @param string $active
 * @return string
 */
function setAdminActive($path, $active = 'active')
{

    return Request::segment(2) == $path ? $active : '';
}

/**
 * Marks active menu item (with id segment)
 *
 * @param $path
 * @param $id
 * @param string $active
 * @return string
 */
function setAdminActiveWithId($path, $id,$active = 'active')
{

    return (Request::segment(2) == $path and Request::segment(4) == $id) ? $active : '';
}

