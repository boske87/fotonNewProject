<?php namespace App\Http\Controllers\Admin;

use Response;

class UtilitiesAdminController extends AdminController {

    /**
     * Save new order
     *
     * @param $tableName
     * @return \Illuminate\Http\JsonResponse
     */
    public function reorderSave($tableName)
    {

       // order string to array
            $order = trim(\Request::input('order'), ';');
            $order = explode(';', $order);

            $i = 1;
            foreach ($order as $recordID)
            {

                \DB::table($tableName)->where('id', '=', $recordID)->update(['ordering' => $i]);
                $i++;
            }


        return Response::json(['status' => 'ok', 'url' => \Request::all() ]);
    }



    public function revertHistory($revisionId)
    {
        $revision = \DB::table('revisions')->whereId($revisionId)->first();

        // model name
        $model = $revision->revisionable_type;
        $model = new $model;

        // find item and update field with old value from revision
        $item = $model::find($revision->revisionable_id);
        $item->update([$revision->key => $revision->old_value]);

        return redirect()->back()->withFlashMessage('Item successfully reverted to this revision')->withFlashType('success');
    }

    /**
     * Slug edit (uri)
     *
     * @return mixed
     */
    public function saveSlug()
    {
        if ( \Request::ajax() ) {

            $data = \Request::all();

            $model = $data['model'];
            $model = new $model;

            $item = $model::find($data['id']);
            $slug = $model->slugCheck($data['slug'], $data['id']);

            $item->$data['field_name'] = $slug;
            $item->save();

            return $slug;
        }
    }
}