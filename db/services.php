<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

use local_instanceinfoapi\external;

/**
 * local altamar external functions and service definitions.
 *
 * @package    local_altamar
 * @copyright  2018 3iPunt Mitxel Moriana <mitxel@tresipunt.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$functions = [
    'local_instanceinfoapi_get_site_info' => [
        'methodname' => 'get_site_info',
        'classname' => external::class,
        'classpath' => 'local/altamar/classes/external.php',
        'description' => 'Get instance information (moodle.net registration data and basic stats)',
        'type' => 'read',
    ],
];

$services = [
    'Instance information API services' => [
        'functions' => [
            'local_instanceinfoapi_get_site_info',
        ],
        'enabled' => 1,
        'restrictedusers' => 1,
        'shortname' => 'local_instanceinfoapi',
        'downloadfiles' => 0,
        'uploadfiles' => 0,
    ],
];
