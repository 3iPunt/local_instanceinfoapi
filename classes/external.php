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

/**
 * This is the external API for this plugin.
 *
 * @package    local_admin_announcement
 * @copyright  2018 3iPunt <mitxel@tresipunt.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_instanceinfoapi;

use coding_exception;
use external_api;
use external_function_parameters;
use external_multiple_structure;
use external_single_structure;
use external_value;
use moodle_exception;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/externallib.php');
require_once($CFG->dirroot . '/webservice/externallib.php');

/**
 * This is the external API for this plugin.
 *
 * @copyright  2018 3iPunt <mitxel@tresipunt.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class external extends external_api {
    /**
     * Returns description of method parameters
     *
     * @return external_function_parameters
     */
    public static function get_site_info_parameters() {
        return new external_function_parameters([
            // none
        ]);
    }

    /**
     * @return array site info
     * @throws coding_exception
     * @throws moodle_exception
     */
    public static function get_site_info() {
        return api::get_site_info();
    }

    /**
     * Returns description of method result value
     *
     * @return external_single_structure
     * @since Moodle 2.2
     */
    public static function get_site_info_returns() {
        return new external_single_structure(
            array(
                // Moodle.net registration data
                'name' => new external_value(PARAM_RAW, ''),
                'description' => new external_value(PARAM_RAW, ''),
                'contactname' => new external_value(PARAM_RAW, ''),
                'contactemail' => new external_value(PARAM_RAW, ''),
                'contactphone' => new external_value(PARAM_RAW, ''),
                'imageurl' => new external_value(PARAM_RAW, ''),
                'privacy' => new external_value(PARAM_RAW, ''),
                'street' => new external_value(PARAM_RAW, ''),
                'regioncode' => new external_value(PARAM_RAW, ''),
                'countrycode' => new external_value(PARAM_RAW, ''),
                'geolocation' => new external_value(PARAM_RAW, ''),
                'contactable' => new external_value(PARAM_RAW, ''),
                'emailalert' => new external_value(PARAM_RAW, ''),
                'emailalertemail' => new external_value(PARAM_RAW, ''),
                'commnews' => new external_value(PARAM_RAW, ''),
                'commnewsemail' => new external_value(PARAM_RAW, ''),
                'language' => new external_value(PARAM_RAW, ''),
                'policyagreed' => new external_value(PARAM_RAW, ''),
                'mobileservicesenabled' => new external_value(PARAM_RAW, ''),
                'mobilenotificationsenabled' => new external_value(PARAM_RAW, ''),
                'registereduserdevices' => new external_value(PARAM_RAW, ''),
                'registeredactiveuserdevices' => new external_value(PARAM_RAW, ''),
                'courses' => new external_value(PARAM_RAW, ''),
                'users' => new external_value(PARAM_RAW, ''),
                'enrolments' => new external_value(PARAM_RAW, ''),
                'posts' => new external_value(PARAM_RAW, ''),
                'questions' => new external_value(PARAM_RAW, ''),
                'resources' => new external_value(PARAM_RAW, ''),
                'badges' => new external_value(PARAM_RAW, ''),
                'issuedbadges' => new external_value(PARAM_RAW, ''),
                'participantnumberaverage' => new external_value(PARAM_RAW, ''),
                'modulenumberaverage' => new external_value(PARAM_RAW, ''),
                'moodlerelease' => new external_value(PARAM_RAW, ''),
                'url' => new external_value(PARAM_RAW, ''),

                // external data (original)
                'sitename' => new external_value(PARAM_RAW, 'site name'),
                'username' => new external_value(PARAM_RAW, 'username'),
                'firstname' => new external_value(PARAM_TEXT, 'first name'),
                'lastname' => new external_value(PARAM_TEXT, 'last name'),
                'fullname' => new external_value(PARAM_TEXT, 'user full name'),
                'lang' => new external_value(PARAM_LANG, 'Current language.'),
                'userid' => new external_value(PARAM_INT, 'user id'),
                'siteurl' => new external_value(PARAM_RAW, 'site url'),
                'userpictureurl' => new external_value(PARAM_URL, 'the user profile picture.
                    Warning: this url is the public URL that only works when forcelogin is set to NO and guestaccess is set to YES.
                    In order to retrieve user profile pictures independently of the Moodle config, replace "pluginfile.php" by
                    "webservice/pluginfile.php?token=WSTOKEN&file="
                    Of course the user can only see profile picture depending
                    on his/her permissions. Moreover it is recommended to use HTTPS too.'),
                'functions' => new external_multiple_structure(new external_single_structure(array(
                    'name' => new external_value(PARAM_RAW, 'function name'),
                    'version' => new external_value(PARAM_TEXT, 'The version number of the component to which the function belongs')
                ), 'functions that are available')),
                'downloadfiles' => new external_value(PARAM_INT, '1 if users are allowed to download files, 0 if not', VALUE_OPTIONAL),
                'uploadfiles' => new external_value(PARAM_INT, '1 if users are allowed to upload files, 0 if not', VALUE_OPTIONAL),
                'release' => new external_value(PARAM_TEXT, 'Moodle release number', VALUE_OPTIONAL),
                'version' => new external_value(PARAM_TEXT, 'Moodle version number', VALUE_OPTIONAL),
                'mobilecssurl' => new external_value(PARAM_URL, 'Mobile custom CSS theme', VALUE_OPTIONAL),
                'advancedfeatures' => new external_multiple_structure(new external_single_structure(array(
                    'name' => new external_value(PARAM_ALPHANUMEXT, 'feature name'),
                    'value' => new external_value(PARAM_INT, 'feature value. Usually 1 means enabled.')
                ), 'Advanced features availability'), 'Advanced features availability', VALUE_OPTIONAL),
                'usercanmanageownfiles' => new external_value(PARAM_BOOL, 'true if the user can manage his own files', VALUE_OPTIONAL),
                'userquota' => new external_value(PARAM_INT, 'user quota (bytes). 0 means user can ignore the quota', VALUE_OPTIONAL),
                'usermaxuploadfilesize' => new external_value(PARAM_INT, 'user max upload file size (bytes). -1 means the user can ignore the upload file size', VALUE_OPTIONAL),
                'userhomepage' => new external_value(PARAM_INT, 'the default home page for the user: 0 for the site home, 1 for dashboard', VALUE_OPTIONAL),
                'siteid' => new external_value(PARAM_INT, 'Site course ID', VALUE_OPTIONAL),
                'sitecalendartype' => new external_value(PARAM_PLUGIN, 'Calendar type set in the site.', VALUE_OPTIONAL),
                'usercalendartype' => new external_value(PARAM_PLUGIN, 'Calendar typed used by the user.', VALUE_OPTIONAL),
            )
        );
    }
}
