<?php

namespace App\Repositories\Region;

interface RegionRepositoryInterface
{
    public function search($region);
    public function showall();
    public function paginate();
    public function showRegion($region);
    public function destroyRegion($region);
    public function restoreRegion($region);
}
