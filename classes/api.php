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


namespace local_instanceinfoapi;

use coding_exception;
use core\hub\registration;
use core_webservice_external;
use moodle_exception;

defined('MOODLE_INTERNAL') || die();


class api {
    /**
     * Calculates and prepares site information to send to moodle.net as part of registration or update
     *
     * @param array $defaults default values for inputs in the registration form (if site was never registered before)
     * @return array site info
     * @throws coding_exception
     * @throws moodle_exception
     */
    public static function get_site_info(array $defaults = []) {
        // Get Moodle.net registration info + basic site stats.
        $siteinfo = registration::get_site_info($defaults);

        // Get the site info that is usually requested by the apps (not including $USER related info).
        $externalsiteinfo = core_webservice_external::get_site_info();

        // We could add here any extra info we would like to get.
        $extrainfo = [];

        return array_merge($siteinfo, $externalsiteinfo, $extrainfo);
    }
}
