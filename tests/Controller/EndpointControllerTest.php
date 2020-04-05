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
    /**
     * Test for HTTP action `http://localhost:10001/index.php/endpoint/run`.
     * Checking:
     * - route is available,
     * - route is available only for POST method,
     * - action return json format,
     * - route required params is content.
     */
    public function testRun()
    {

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
     */
    public function testStatus()
    {

    }
}
