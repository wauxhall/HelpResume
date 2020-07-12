<?php

namespace App\Services;

use App\Dto\SiteDto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use League\Uri\Exceptions\SyntaxError;
use League\Uri\Uri;

class SiteDetectionService
{
    private $sitesAvailable;
    private $siteDto;

    public function __construct(SiteDto $siteDto)
    {
        $this->sitesAvailable = config('sites.available');
        $this->siteDto = $siteDto;
    }

    public function getSite(Request $request): SiteDto
    {
        $this->validate($request);

        $link = $request->input('link');

        try {
            $urlParts = Uri::createFromString($link);
        } catch(SyntaxError $e) {

        }

        $siteCode = $this->detectAvailableSite($urlParts->getHost());

        $this->buildSiteDto($urlParts, $siteCode);

        return $this->siteDto;
    }

    public function detectAvailableSite(string $host): string
    {
        $host = preg_replace('/^www\./', '', $host);
        $siteCode = '';

        foreach ($this->sitesAvailable as $code => $site) {
            if ($host === $site['host'] || in_array($host, $site['redirects'])) {
                $siteCode = $code;
            }
        }

        if (!$siteCode) {
            throw new \Exception('Ошибка: задана неверная ссылка.');
        }

        return $siteCode;
    }

    public function buildSiteDto(Uri $urlParts, string $siteCode)
    {
        $site   = $this->sitesAvailable[$siteCode];
        $host   = $site['host'];
        $scheme = $site['scheme'];
        $path   = trim($urlParts->getPath(), '/');

        $this->siteDto->setScheme($scheme);
        $this->siteDto->setHost($host);
        $this->siteDto->setPath($path);
        $this->siteDto->setQuery($urlParts->getQuery());
        $this->siteDto->setHash($urlParts->getFragment());
        $this->siteDto->setCode($siteCode);
    }

    public function validate(Request $request): void
    {
        $validator = Validator::make($request->all(), [
            'link' => 'required|url|max:1023'
        ]);

        if ($validator->fails()) {
            throw new \Exception('Ошибка: введите корректный url.');
        }
    }
}
