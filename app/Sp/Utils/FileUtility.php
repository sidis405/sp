<?php

namespace Sp\Utils;

use Storage;

class FileUtility {

    // protected $paths = ['foglietto' => 'foglietti_illustrativi', 'scheda' => 'schede_tecniche'];
    
    protected $paths = ['image' => 
                            [
                                'folder' => 'immagini',
                                'disk' => 'media'
                            ]

                        ];

    public function putfile($article_id, $type, $file)
    {
        $filename = $this->makeFilename($article_id, $type,  $file);
        
        if(Storage::disk($this->paths[$type]['disk'])->put($filename, file_get_contents($file->getRealPath()))){
            return $filename;
        }

        return false;

    }

    public function getFile($path)
    {
        if(Storage::disk('uploads')->has($path)){

            $mimetype = Storage::disk('uploads')->mimeType($path);
            $contents = Storage::disk('uploads')->get($path);

            return ['mimetype' => $mimetype, 'contents' => $contents];

        }

        return false;
    }

    protected function makeFilename($article_id, $type,  $file )
    {

        return $this->paths[$type]['folder'] . '/'  . $this->makeId($article_id) . '-' . $file->getClientOriginalName();
    }

    protected function makeId($article_id)
    {
        return md5(bcrypt($article_id . microtime()));
    }

}