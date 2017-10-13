<?php

namespace App\Skippaz\Services;

use App\SeoManager;

trait MetaTags
{

    /**
     * Get or set Meta Tags
     *
     * @param null   $item         Object with meta data attributes (meta_title, meta_desc, meta_keys)
     * @param string $defaultTitle Default Meta title that would be used, if item doesn't have one
     * @param string $defaultDesc  Default Meta description
     * @param string $defaultKeys  Default Meta keywords
     */
    public function metaTags($item = null, $defaultTitle = null, $defaultDesc = null, $defaultKeys = null)
    {
        $metaData = [];

        if ($item) { // if item (object) is passed, get meta tags from it (or default ones if item don't have them)
            $metaData['title'] = empty( $item->meta_title ) ? $defaultTitle : $item->meta_title;
            $metaData['desc']  = empty( $item->meta_desc ) ? $defaultDesc : $item->meta_desc;
            $metaData['keys']  = empty( $item->meta_keys ) ? $defaultKeys : $item->meta_keys;
        } elseif (isset( $defaultTitle ) or isset( $defaultDesc ) or isset( $defaultKeys )) { // no item, but default meta tags passed
            $metaData['title'] = $defaultTitle;
            $metaData['desc']  = $defaultDesc;
            $metaData['keys']  = $defaultKeys;
        } else { // try to pull from SEO Manager
            $metaData = $this->getFromSeoManager();
        }

        // Add to view (composer)
        view()->composer('layouts.partials.meta_tags', function ($view) use ($metaData) {
            $view->with('metaData', $metaData);
        });

    }


    /**
     * Get meta tags from SEO Manager
     * (based on url of the page)
     *
     * @return array
     */
    private function getFromSeoManager()
    {
        $seoManager   = new SeoManager();
        $requestedUrl = \Request::url();

        $seoManagerMetaData = $seoManager->whereUrl($requestedUrl)->select('meta_title', 'meta_desc',
            'meta_keys')->first();

        if ($seoManagerMetaData) {
            $metaData['title'] = $seoManagerMetaData->meta_title;
            $metaData['desc']  = $seoManagerMetaData->meta_desc;
            $metaData['keys']  = $seoManagerMetaData->meta_keys;

            return $metaData;
        }

        return [];
    }

}