<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use App\Services\MetalArchives;
use App\Jobs\UploadImage;

class AlbumCreated
{
    use Dispatchable, SerializesModels;

    public $review;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($album)
    {
        $album->fill($albumInfo);
        $album->save();

        dispatch(new UploadImage($album));
    }
}
