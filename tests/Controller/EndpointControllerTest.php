<?php
/**
 * LoteriomaDiceEngine - application enabling the operation of gambling cubes.
 *
 * The application consists of a dice game engine based on a pseudo-randomity for which
 * the external RNG component is used. The application is only responsible for handling
 * the game logic and forwards its results to the Core component. Data used in the operation
 * of the application are downloaded from the DataStore component.
 *
 * See more: https://raspberryvision.github.io/loterioma-dice-engine/.
 *
 * DiceEngine - casino dice game server.
 * @see https://github.com/RaspberryVision/loterioma-dice-engine
 *
 * This code is part of the LoterioMa casino system.
 * @see https://github.com/RaspberryVision/loterioma
 *
 * Created by Rafal Malik.
 * 15:47 02.04.2020, Warsaw/Zabki - DELL
 */

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Functional tests for EndpointController.
 * @category   WebTest
 * @package    App\Tests\Controller
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  04.2020 Raspberry Vision
 */
class EndpointControllerTest extends WebTestCase
{
    private ?KernelBrowser $client;

    public function setUp(): void
    {
        $this->client = static::createClient([], [
            'HTTP_HOST' => 'loterioma_dice_engine',
        ]);
    }

    /**
     * Test for HTTP action `http://localhost:10001/run`.
     * Checking:
     * - route is available,
     * - route is available only for POST method,
     * - action return json format,
     * - response has header LM-COMPONENT-HASH = md5(dice-engine)
     * - route required params is content.
     *
     * @dataProvider providerTestRun
     * @param array $testCase
     */
    public function testRun(array $testCase): void
    {
        // Make HTTP request to endpoint
        $this->client->request($testCase['method'], '/play');

        // Check that response status code is expected
        $this->assertEquals($testCase['statusCode'], $this->client->getResponse()->getStatusCode());

        if (200 === $testCase['statusCode']) {
            // Check that response content type is application/json
            $this->assertTrue(
                $this->client->getResponse()->headers->contains(
                    'Content-Type',
                    'application/json'
                ),
                'the "Content-Type" header is "application/json"'
            );

            // Check that headers contains valid network component hash
            $this->assertEquals(
                $testCase['componentHash'],
                $this->client->getResponse()->headers->get('LM-COMPONENT-HASH')
            );
        }
    }

    /**
     * DataProvider for testRun method.
     *
     * @return \Generator
     */
    public function providerTestRun(): ?\Generator
    {
        yield [[
            'method' => 'POST',
            'statusCode' => '200',
            'componentHash' => md5('dice-engine')
        ]];
        yield [[
            'method' => 'GET',
            'statusCode' => '405',
            'componentHash' => md5('dice-engine')
        ]];
        yield [[
            'method' => 'PUT',
            'statusCode' => '405',
            'componentHash' => md5('dice-engine')
        ]];
        yield [[
            'method' => 'PATH',
            'statusCode' => '405',
            'componentHash' => md5('dice-engine')
        ]];
    }

    /**
     * Test for HTTP action `http://localhost:10001/status`.
     * Checking:
     * - route is available,
     * - route is available only for GET method,
     * - action return json format,
     * - response has keys:
     *  - `status` which is integer type,
     *  - `services` which is array type AND contains `RNG`, `Core`, `DataStore` with status 0
     *
     * @dataProvider providerTestStatus
     * @param array $testCase
     */
//    public function testStatus(array $testCase): void
//    {
//        // Make HTTP request to endpoint
//        $this->client->request($testCase['method'], '/status');
//
//        // Check that response status code is expected
//        $this->assertEquals($testCase['statusCode'], $this->client->getResponse()->getStatusCode());
//
//        if (200 === $testCase['statusCode']) {
//            // Check that response content type is application/json
//            $this->assertTrue(
//                $this->client->getResponse()->headers->contains(
//                    'Content-Type',
//                    'application/json'
//                ),
//                'the "Content-Type" header is "application/json"'
//            );
//
//            // Check that headers contains valid network component hash
//            $this->assertEquals(
//                $testCase['componentHash'],
//                $this->client->getResponse()->headers->get('LM-COMPONENT-HASH')
//            );
//
//            // Check that response is the same as expected
//            $this->assertEquals(
//                    json_encode($testCase['response']),
//                    $this->client->getResponse()->getContent()
//            );
//        }
//    }
//
//    /**
//     * DataProvider for testRun method.
//     *
//     * @return \Generator
//     */
//    public function providerTestStatus(): ?\Generator
//    {
//        yield [[
//            'method' => 'POST',
//            'statusCode' => '405',
//            'componentHash' => md5('dice-engine')
//        ]];
//        yield [[
//            'method' => 'GET',
//            'statusCode' => 200,
//            'componentHash' => md5('dice-engine'),
//            'response' => [
//                'status' => 0,
//                'services' => [
//                    'rng' => [
//                        'status' => 0
//                    ],
//                    'core' => [
//                        'status' => 0
//                    ],
//                    'data-store' => [
//                        'status' => 0
//                    ],
//                ]
//            ]
//        ]];
//        yield [[
//            'method' => 'PUT',
//            'statusCode' => '405',
//            'componentHash' => md5('dice-engine')
//        ]];
//        yield [[
//            'method' => 'PATH',
//            'statusCode' => '405',
//            'componentHash' => md5('dice-engine')
//        ]];
//    }
}
