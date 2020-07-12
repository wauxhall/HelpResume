<?php

namespace App\Contracts;

use App\Dto\SiteDto;

interface DataCollectorInterface
{
    public function collect(SiteDto $siteDto);
}
