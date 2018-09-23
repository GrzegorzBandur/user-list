<?php

namespace App\Model;

class ApiUserCollection implements ApiCollectionInterface
{
    /** @var int */
    private $page;
    /** @var int */
    private $perPage;
    /** @var int */
    private $total;
    /** @var int */
    private $totalPages;
    /** @var ApiUser[]|array */
    private $data;

    /**
     * ApiUserCollection constructor.
     * @param int $page
     * @param int $perPage
     * @param int $total
     * @param int $totalPages
     */
    public function __construct(int $page = 1, int $perPage = 1, int $total = 0, int $totalPages = 0)
    {
        $this->page = $page;
        $this->perPage = $perPage;
        $this->total = $total;
        $this->totalPages = $totalPages;
        $this->data = [];
    }

    /**
     * @return ApiUser[]
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @return int
     */
    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    public function addData(ApiUser $apiUser)
    {
        $this->data[] = $apiUser;
    }

    public function removeData(ApiUser $apiUser)
    {
        $searchKey = array_search($apiUser, $this->data);
        if ($searchKey!==false) {
            unset($this->data[$searchKey]);
        }
    }
}
