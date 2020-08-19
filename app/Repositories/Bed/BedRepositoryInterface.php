<?php

namespace App\Repositories\Bed;

interface BedRepositoryInterface
{
    public function search($bed);
    public function showall();
    public function paginate();
    
    public function showallBedonRoom($id);
    
    public function showBed($Bed);
    public function destroyBed($Bed);
    public function restoreBed($Bed);
}
