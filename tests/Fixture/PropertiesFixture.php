<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PropertiesFixture
 */
class PropertiesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'mls' => 'Lorem ip',
                'address' => 'Lorem ipsum dolor sit amet',
                'beds' => 1,
                'baths' => 1,
                'sq_ft' => 1,
                'price' => 1,
                'date' => '2023-08-29',
            ],
        ];
        parent::init();
    }
}
