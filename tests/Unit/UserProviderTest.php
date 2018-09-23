<?php

namespace Tests\Functional;

use App\Model\ApiUser;
use App\Model\ApiUserCollection;
use App\Provider\UserProvider;

class UserProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public function getProperlyParams()
    {
        return [
            [1, 5],
            [2000, 5],
            [5, 5],
            [5, 20],
            [0, 0],
            [-5, -20],
            [-5, 20],
            [5, -20],
        ];
    }

    /**
     * @dataProvider getProperlyParams
     * @param int $page
     * @param int $perPage
     */
    public function testUserProvider(int $page, int $perPage)
    {
        $userProvider = new UserProvider();
        $collection = $userProvider->listUsers($page, $perPage);
        $this->assertInstanceOf(
            ApiUserCollection::class,
            $collection,
            '$collection is not instance of ApiUserCollection'
        );
        $this->assertContainsOnlyInstancesOf(
            ApiUser::class,
            $collection->getData(),
            '$collection->getData() not only contain ApiUser'
        );
        $this->assertLessThanOrEqual(
            $perPage >0 ? $perPage : UserProvider::DEFAULT_PER_PAGE,
            count($collection->getData()),
            "Data amount higher than set in perPage param"
        );
        $this->assertEquals(
            $perPage >0 ? $perPage : UserProvider::DEFAULT_PER_PAGE,
            $collection->getPerPage(),
            "perPage param in UserProvider don't match with ApiUserCollection"
        );
        $this->assertEquals(
            $page >0 ? $page : UserProvider::DEFAULT_START_PAGE,
            $collection->getPage(),
            "page param in UserProvider don't match with ApiUserCollection"
        );
        $this->assertGreaterThanOrEqual(
            0,
            $collection->getTotalPages(),
            "Total pages in returned collection should be higher or equal 0"
        );
        $this->assertGreaterThanOrEqual(
            0,
            $collection->getTotal(),
            "Total in returned collection should be higher or equal 0"
        );
    }
}
