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
 * Front-end class.
 *
 * @package availability_mobileapp
 * @copyright Juan Leyva <juan@moodle.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace availability_mobileapp;
use cm_info;
use section_info;
use stdClass;


/**
 * Front-end class.
 *
 * @package availability_mobileapp
 * @copyright Juan Leyva <juan@moodle.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class frontend extends \core_availability\frontend {
    /**
     * Gets a list of string identifiers that are required in JavaScript for this plugin.
     *
     * @return array Array of required string identifiers
     */
    protected function get_javascript_strings() {
        return ['requires_app', 'requires_notapp', 'label_access'];
    }

    /**
     * Decides whether this plugin should be available in a given course.
     *
     * @param stdClass $course Course object
     * @param cm_info|null $cm Course-module currently being edited (null if none)
     * @param section_info|null $section Section currently being edited (null if none)
     */
    protected function allow_add($course, ?cm_info $cm = null, ?section_info $section = null) {
        global $CFG, $DB;

        // Check if Web Services are enabled.
        if (!$CFG->enablewebservices) {
            return false;
        }

        // Check if Mobile services are enabled.
        $mobileservice = $DB->get_record('external_services', ['shortname' => MOODLE_OFFICIAL_MOBILE_SERVICE, 'enabled' => 1]);
        // Rare case, the official service is disabled but the local_mobile services are enabled.
        $extraservice = $DB->get_record('external_services', ['shortname' => 'local_mobile', 'enabled' => 1]);

        if (!$mobileservice && !$extraservice) {
            return false;
        }

        return true;
    }
}
