<?php

namespace App\Repositories\Images;

interface ImagesRepositoryInterface
{

    public function showall();
    public function showallimagesonroom($id);
    public function destroyRoom($room_image);
    public function restoreRoom($room_image);
}
