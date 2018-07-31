<?php
namespace App\Skippaz\Services;


use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Intervention\Image\Image;
use Spatie\Glide\GlideImage;
use Intervention\Image\ImageManagerStatic as ImageNew;


trait UploadService {

    /**
     * Handle Upload
     * @param string $inputName
     * @param string $directory
     * @param null $object
     * @param bool $yearMonth
     * @return mixed|string
     */
    public function upload($inputName = '', $directory = '', $object = null, $yearMonth = false)
    {

        try
        {
            if (Input::hasFile($inputName))
            {
                $file = Input::file($inputName);
                $type = $file->getMimeType();
                // filename
                $fileName = str_replace(' ', '_', Str::ascii($file->getClientOriginalName()));



                if ($yearMonth)
                { // create year/month subdirectories
                    $yearMonth = date('Y') . '/' . date('m');
                    $directory .= '/' . $yearMonth;
                }

                $path = public_path($directory);


                // check if exists
                $fileName = $this->renameFileIfExist($path, $fileName);


                $move = $file->move($path, $fileName);

                if($type!="application/pdf")
                {
                    $move2 = ImageNew::make($move->getRealPath());

                    $he = $move2->height();
                    $wi = $move2->width();
                    if($he<$wi){
                        $move2->resize(1280, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    } else {
                        $move2->resize(null, 1280, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    }
                    $move2->save();
                }
//
                if ($move)
                {
                    return $yearMonth ? $yearMonth . '/' . $fileName : $fileName;

                } else
                {
                    die('File cannot be saved to disk');
                }
            } else return $object ? $object->$inputName : '';


        } catch (\Exception $e)
        {
            die($e->getMessage());
        }

    }


    public function deleteFiles($object, $inputName, $directory)
    {

        // delete files
        $file = public_path(\Config::get('project.uploads_folder') . $directory . '/' . $object->$inputName);

        return File::delete($file);
    }


    /**
     * Rename uploaded file, if already exists in directory
     * (file_1.ext, file_2.ext, ...)
     *
     * @param $path
     * @param $fileName
     * @return mixed
     */
    private function renameFileIfExist($path, $fileName)
    {
        $actualName = pathinfo($fileName, PATHINFO_FILENAME);
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $originalName = $actualName;

        $i = 1;
        while (file_exists($path . '/' . $actualName . '.' . $extension))
        {
            $actualName = (string) $originalName . '_' . $i;
            $fileName = $actualName . "." . $extension;
            $i++;
        }

        return $fileName;
    }


    /**
     * Max upload size from php.ini
     * min(post_max_size, upload_max_filesize)
     *
     * @return mixed
     */
    function getMaxFileuploadSize()
    {
        $maxUploadSize = min($this->convertSizeToNum(ini_get('post_max_size')), $this->convertSizeToNum(ini_get('upload_max_filesize')));

        return $maxUploadSize;
    }

    /**
     * Transforms the php.ini notation for numbers (like '2M') to an integer (2*1024*1024 in this case)
     *
     * @param $size
     * @return int|string
     */
    private function convertSizeToNum($size)
    {
        $l = substr($size, -1);
        $ret = substr($size, 0, -1);
        switch (strtoupper($l))
        {
            case 'P':
                $ret *= 1024;
            case 'T':
                $ret *= 1024;
            case 'G':
                $ret *= 1024;
            case 'M':
                $ret *= 1024;
            case 'K':
                $ret *= 1024;
                break;
        }

        return $ret;
    }

    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }

}