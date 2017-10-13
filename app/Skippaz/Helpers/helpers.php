<?php

/**
 * Fetch Text Block (by selector)
 *
 * @param $selector
 * @return string
 */
function textBlock($selector)
{
//    $item = \App\TextBlock::whereSelector($selector)->first();

    $item = \Cache::remember('text_blocks.' . $selector, config('project.cache_time'), function() use ($selector) {
        return \App\TextBlock::whereSelector($selector)->first();
    });

    if(! $item)
        return '<div class="messages"><div class="msg info"><p>Text Block not found <br><small>[ ' . $selector . ' ]</small></p></div></div>';

    //$returnUrl = Request::url();

    $text = $item->body;
//
//    if ( ! Auth::guest() and Auth::user()->isAdmin())
//    {
//        $text .= ' <a class="edit-link" href="' . url('admin/text_blocks', $item->id) . '/edit?return_url=' . $returnUrl . '">Edit This</a>';
//    }

    return $text;

}

/**
 * Get Page URI (based on selector)
 * @param $selector
 * @return string
 */
function pageLink($selector)
{
//
    $item = Cache::remember('page.links.' . $selector, Config::get('project.cache_time'), function () use ($selector)
    {
        return \App\Page::whereSelector($selector)->select('uri')->first();
    });

//    $item = \App\Page::whereSelector($selector)->select('uri')->first();

    if ($item)
        return route('page', $item->uri);

    return route('home');
}


/**
 * Marks current route/route pattern active in navigation
 *
 * @param $route
 * @param string $activeClass
 * @return string
 */
function setNavRouteActive($route, $activeClass = 'current')
{

        $currentRoute = Route::getCurrentRoute() ? Route::getCurrentRoute()->getName() : '' ;

        if (is_array($route))
        {
            $active = array_filter($route, function ($route) use ($currentRoute)
            {
                return fnmatch($route, $currentRoute);
            });
        } else
        {
            $active = fnmatch($route, $currentRoute);
        }

        return $active ? $activeClass : '';

}


/**
 * Path to front-end assets
 *
 * @param $path
 * @param null $secure
 * @return string
 */
function front_asset($path, $secure = null)
{
    return asset('html/' . $path, $secure);
}

/**
 * Adds http:// to URL (if missing)
 *
 * @param string $str
 * @return string
 */
function prep_url($str = '')
{
    if ($str == 'http://' OR $str == '')
    {
        return '';
    }

    $url = parse_url($str);
    if ( ! $url OR ! isset($url['scheme']))
    {
        // hash
        if (isset($url['fragment']) and ! isset($url['path']))
        {
            return $str;
        }

        $str = 'http://' . $str;
    }

    return $str;
}


/**
 * Check if an integer is in range of numbers
 *
 * @param $int
 * @param $min
 * @param $max
 * @return bool
 */
function checkIfInRange($int,$min,$max){
    return ($min <= $int and $int <= $max);
}


/**
 * Orientation of the tooltip
 *
 * @param $key
 * @return string
 */
function mapTooltipOrientation($key) {
    if(checkIfInRange($key, 1, 8) or checkIfInRange($key, 52, 55) or checkIfInRange($key, 58, 64)  )
        return 'pull-left';

    if(checkIfInRange($key, 26, 37))
        return 'pull-right';

    return '';
}