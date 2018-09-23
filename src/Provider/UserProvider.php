<?php

namespace App\Provider;

use App\Model\ApiUser;
use App\Model\ApiUserCollection;

class UserProvider implements UserProviderInterface
{
    const METHOD_GET = "GET";
    const API_URL_USERS = "https://reqres.in/api/users";
    const GET_PARAM_PAGE = "page";
    const GET_PARAM_PER_PAGE = "per_page";
    const GUZZLE_OPTION_QUERY = "query";
    const DEFAULT_PER_PAGE = 10;
    const DEFAULT_START_PAGE = 1;


    /**
     * @param Int $page
     * @param Int $perPage
     * @return ApiUserCollection
     */
    public function listUsers(?Int $page, ?Int $perPage): ApiUserCollection
    {
        $page > 0 ? : $page = self::DEFAULT_START_PAGE;
        $perPage > 0 ? : $perPage = self::DEFAULT_PER_PAGE;
        $page = $page ?? self::DEFAULT_START_PAGE;
        $perPage = $perPage ?? self::DEFAULT_PER_PAGE;
        return $this->arrayToApiUserCollection($this->makeGETRequest(
            self::API_URL_USERS,
            [self::GET_PARAM_PAGE => $page, self::GET_PARAM_PER_PAGE => $perPage]
        ));
    }

    private function makeGETRequest(string $url, array $getParameters): array
    {
        $curl = curl_init();
        $query = http_build_query($getParameters);
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url. "?" . $query
        ));
        $resp = curl_exec($curl);
        curl_close($curl);

        return json_decode($resp, true);
    }
    private function arrayToApiUserCollection(array $jsonArray): ApiUserCollection
    {
        $apiCollection = new ApiUserCollection(
            $jsonArray["page"],
            $jsonArray["per_page"],
            $jsonArray["total"],
            $jsonArray["total_pages"]
        );
        foreach ($jsonArray["data"] as $user) {
            $apiCollection->addData(new ApiUser($user["id"], $user["first_name"], $user["last_name"], $user["avatar"]));
        }
        return $apiCollection;
    }
}
