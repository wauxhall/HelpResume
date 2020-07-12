<?php

namespace App\Http\Controllers;

use App\Dto\ProfileDto;
use App\Registry\DataCollectorsRegistry;
use App\Services\MLService;
use App\Services\SiteDetectionService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function getProfile(Request $request, SiteDetectionService $siteResolveService, MLService $mlService, DataCollectorsRegistry $registry, ProfileDto $profileDto)
    {
        $siteDto = $siteResolveService->getSite($request);

        $siteCode = $siteDto->getCode();
        $dataCollector = $registry->get($siteCode);

        $mlDto = $dataCollector->collect($siteDto);

        $mlDto->setSiteCode($siteCode);

        $mlResponse = $mlService->sendRequest($mlDto);

        $profileDto->setFirstName($mlDto->getFirstName());
        $profileDto->setLastName($mlDto->getLastName());
        $profileDto->setAge($mlDto->getAge());
        $profileDto->setActualAge($mlDto->isActualAge());
        $profileDto->setProfession($mlResponse['proffession']);
        $profileDto->setSkills($mlResponse['skills']);
        $profileDto->setPsycho($mlResponse['psycho']);

        return response()->json($profileDto->toArray());
    }
}
