<?php


namespace App\Skippaz\Admin;


trait AdminTrait {

    public function formattedCreatedDate()
    {
        if ($this->created_at->diffInDays() > 30)
        {
            return $this->created_at->toFormattedDateString();
        } else
        {
            return $this->created_at->diffForHumans();
        }
    }

    public function formattedUpdatedDate()
    {
        if ($this->updated_at->diffInDays() > 30)
        {
            return $this->updated_at->toFormattedDateString();
        } else
        {
            return $this->updated_at->diffForHumans();
        }
    }

    public function formatPublishDateTime($d) {
        if(!$d)
            return null;

        $oldDate = strtotime( $d );
        //$newDate = date( 'Y-m-d H:i:s', $olddate );
        $newDate = date( 'd/m/Y H:i A', $oldDate );
        return $newDate;
    }


    /**
     *  Check slug (uri).
     * Generate, validate and make unique
     *
     * use of SluggableTrait
     *
     * @param $slug
     * @param $id
     * @return mixed
     */
    public function slugCheck($slug, $id){

        $this->setAttribute($this->getKeyName(), $id);

//        $config = \App::make('config')->get('eloquent-sluggable::config');
        $config = \Config::get('sluggable');
        $this->sluggable = array_merge( $config, $this->sluggable );
        if( $this->needsSlugging()) {
            $slug = $this->generateSlug($slug);
            $slug = $this->validateSlug($slug);
            $slug = $this->makeSlugUnique($slug);
        }
        return $slug;
    }

}