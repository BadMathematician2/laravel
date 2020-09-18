<?php


namespace App\Packages\Helpers;


use Illuminate\Http\UploadedFile;

/**
 * Class MimeValidator
 * @package App\Packages\Helpers
 */
class MimeValidator
{

    private array $mimes = [
        'image' => [
            'image/jpeg',
            'image/png',
            'image/webp',
            'image/pjpeg',
            'image/vnd.wap.wbmp',
        ]
    ];

    /**
     * @param string $mime
     */
    public function addMimeMime(string $mime)
    {
        $e = explode('/', $mime);
        [$type, $mime] = $e;
        $this->mimes[$type][] = $mime;
    }


    /**
     * @param null $type
     * @return string[]|\string[][]
     */
    public function getMime($type = null)
    {
        if(null !== $type) {
            return $this->mimes[$type] ?? [];
        }
        return $this->mimes;
    }

    // validators
    /**
     * @param UploadedFile $file
     * @param $allowList
     * @return bool
     */
    public function validate(UploadedFile $file, $allowList) : bool
    {
        return in_array($file->getMimeType(), $allowList);
    }

    /**
     * @param UploadedFile $file
     * @return bool
     */
    public function isValidImage(UploadedFile $file)
    {
        return $this->validate($file, $this->getMime('image'));
    }


    /**
     * @param UploadedFile $file
     * @return bool
     */
    public function isValidText(UploadedFile $file)
    {
        return $this->validate($file, $this->getMime('text'));
    }


}
