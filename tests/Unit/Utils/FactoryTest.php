<?php
/*
 * A PHP Library to handle a JSON API body in an OOP way.
 * Copyright (C) 2015-2018  Artur Weigandt  https://wlabs.de/kontakt

 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Art4\JsonApiClient\Tests\Utils;

use Art4\JsonApiClient\Utils\Factory;

class FactoryTest extends \Art4\JsonApiClient\Tests\Fixtures\TestCase
{
    /**
     * @test
     */
    public function testInjectACustomClass()
    {
        $factory = new Factory([
            'Default' => 'stdClass',
        ]);

        $this->assertInstanceOf('Art4\JsonApiClient\Utils\FactoryInterface', $factory);
        $this->assertInstanceOf('stdClass', $factory->make('Default'));
    }

    /**
     * @test parse throw Exception if input is invalid jsonapi
     */
    public function testMakeAnUndefindedClassThrowsException()
    {
        $factory = new Factory();

        $this->setExpectedException(
            'Art4\JsonApiClient\Exception\FactoryException',
            '"NotExistent" is not a registered class'
        );

        $class = $factory->make('NotExistent');
    }
}
