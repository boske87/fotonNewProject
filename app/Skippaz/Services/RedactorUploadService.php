<?php
namespace App\Skippaz\Services;


use App\Http\Controllers\Controller;
use Config;
use Illuminate\Support\Str;
use Input;
use Log;
use Response;
use Validator;

class RedactorUploadService extends Controller {


    /**
     * Readactor file upload
     *
     * @param string $directory
     * @return \Illuminate\Http\JsonResponse
     */
    public function fileUpload($directory = '')
    {
        return $this->redactorUpload($directory, 'file_upload');
    }

    /**
     * Redactor image upload
     *
     * @param string $directory
     * @return \Illuminate\Http\JsonResponse
     */
    public function imageUpload($directory = '')
    {

        return $this->redactorUpload($directory, 'image_upload');
    }

    /**
     * Handle Redactor Upload
     *
     * @param string $directory
     * @param $config
     * @return \Illuminate\Http\JsonResponse
     */
    protected function redactorUpload($directory = '', $config)
    {


        $maxSize = $this->getMaxFileuploadSize();


        //handle post_max_size "exception"
        if ((empty($_FILES) && empty($_POST) && isset($_SERVER['REQUEST_METHOD']) && strtolower($_SERVER['REQUEST_METHOD']) == 'post')) { //catch file overload error...

            return json_encode(['error' => sprintf(config('redactor.upload_max_size_message'), $this->formatBytes($maxSize))]);
        }


        try {
            $file = Input::file('file');

            // validation
            if (config('redactor.' . $config . '.validation_rules')) {
                $rules = config('redactor.' . $config . '.validation_rules');
                $v = Validator::make(Input::only('file'), ['file' => $rules]);
                if ($v->fails()) {
//                    return Response::json(['error' => $v->errors()->first()]);
                    return Response::json(['error' => 'validate']);
                }
            }

            // validate size (from config)
            if (config('redactor.' . $config . '.max_size')) {
                $size = $file->getSize();
                $maxConfigSize = $this->convertSizeToNum(config('redactor.' . $config . '.max_size'));

                if ($size > $maxConfigSize) {
                    return Response::json(['error' => sprintf(config('redactor.upload_max_size_message'), $this->formatBytes($maxConfigSize))]);
                }
            }


            // filename
            $fileName = str_replace(' ', '_', Str::ascii($file->getClientOriginalName()));

            if (Input::get('subdir')) { // create year/month subdirectories
                $directory .= '/' . date('Y') . '/' . date('m');
            }
            $path = public_path('uploads/' . $directory);

            // check if exists
            $fileName = (config('redactor.' . $config . '.overwrite')) ? $fileName : $this->renameFileIfExist($path, $fileName);

            $move = $file->move($path, $fileName);
            if ($move) {
                return Response::json([
                    'filelink' => asset('/uploads/' . $directory . '/' . $fileName),
                    'filename' => $fileName
                ]);
            } else {
                return Response::json(['error' => 'File cannot be saved to disk']);
            }

        } catch (Exception $e) {
            Log::debug($e->getMessage(), ['context' => 'Redactor Uploader']);

            return Response::json(['error' => sprintf(Config::get('redactor.upload_max_size_message'), $this->formatBytes($maxSize))]);
        }

        return Response::json(['error' => 'File cannot be uploaded']);
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
        while (file_exists($path . '/' . $actualName . '.' . $extension)) {
            $actualName = (string)$originalName . '_' . $i;
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
        switch (strtoupper($l)) {
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
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }

}