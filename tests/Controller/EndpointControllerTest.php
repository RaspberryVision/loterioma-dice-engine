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
 * @package    App\Engine\PlayingDice
 * @author     Rafal Malik <rafalmalik.info@gmail.com>
 * @copyright  04.2020 Raspberry Vision
 */
class EndpointControllerTest extends WebTestCase
{
    private ?KernelBrowser $client;

    public function setUp(): void
    {
        $this->client = static::createClient([], [
            'HTTP_HOST' => 'localhost:10001',
        ]);
    }

    /**
     * Test for HTTP action `http://localhost:10001/index.php/endpoint/run`.
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
        $this->client->request($testCase['method'], '/endpoint/run');

        // Check that response status code is expected
        $this->assertEquals($testCase['statusCode'], $this->client->getResponse()->getStatusCode());

        // Check that response content type is application/json
        $this->assertEquals(
            'application/json',
            $this->client->getResponse()->headers->get('Content-Type')
        );

        // Check that headers contains valid network component hash
        $this->assertEquals(
            $testCase['componentHash'],
            $this->client->getResponse()->headers->get('LM-COMPONENT-HASH')
        );
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
     * Test for HTTP action `http://localhost:10001/index.php/endpoint/status`.
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
    public function testStatus(array $testCase): void
    {
        // Make HTTP request to endpoint
        $this->client->request($testCase['method'], '/endpoint/status');

        // Check that response status code is expected
        $this->assertEquals($testCase['statusCode'], $this->client->getResponse()->getStatusCode());

        // Check that response content type is application/json
        $this->assertEquals(
            'application/json',
            $this->client->getResponse()->headers->get('Content-Type')
        );

        // Check that headers contains valid network component hash
        $this->assertEquals(
            $testCase['componentHash'],
            $this->client->getResponse()->headers->get('LM-COMPONENT-HASH')
        );

        // Check that response content contains key status
        $this->assertArrayHasKey(
            'status',
            json_encode($this->client->getResponse()->getContent(), true)
        );

        // Check that response content contains key services
        $this->assertArrayHasKey(
            'services',
            json_encode($this->client->getResponse()->getContent(), true)
        );
    }

    /**
     * DataProvider for testRun method.
     *
     * @return \Generator
     */
    public function providerTestStatus(): ?\Generator
    {
        yield [[
            'method' => 'POST',
            'statusCode' => '405',
            'componentHash' => md5('dice-engine')
        ]];
        yield [[
            'method' => 'GET',
            'statusCode' => '200',
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
}
