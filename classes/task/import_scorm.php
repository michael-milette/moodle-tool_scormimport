<?php
// This file is part of SCORM Import for Moodle - https://moodle.org/
//
// SCORM Import is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// SCORM Import is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * SCORM Import CLI Script
 *
 * This script provides a command-line interface for bulk importing SCORM packages
 * into Moodle. It creates a new course for each SCORM package and imports the
 * package into that course.
 *
 * @package    tool_scormimport
 * @copyright  2024 TNG Consulting Inc. (https://tngconsulting.ca)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 * Note: Initial version of this script was generated with assistance from Claude 3.5, an AI model by Anthropic.
 *
 * Usage:
 * php import_scorm.php [--category=<id>] [--directory=<path>]
 * php import_scorm.php -h | --help
 *
 * @param integer $category  The ID of the category to create courses in. Default is 1.
 * @param string  $directory The path to the directory containing SCORM packages.
 *                           Default is the current working directory.
 *
 * Example:
 * php import_scorm.php --category=5 --directory=/path/to/scorm/packages
 */

namespace scormimport\task;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/course/lib.php');
require_once($CFG->dirroot . '/mod/scorm/lib.php');
require_once($CFG->dirroot . '/mod/scorm/locallib.php');

/**
 * Class import_scorm
 *
 * This class handles the import of SCORM packages into Moodle.
 * It scans a specified directory for SCORM zip files, and for each file,
 * it creates a new course and imports the SCORM package into it.
 *
 * Usage:
 * - Instantiate the class.
 * - Call the execute() method to start the import process.
 *
 * Example:
 * $importer = new import_scorm();
 * $importer->execute();
 *
 * @package    tool_scormimport
 */
class import_scorm {

    /**
     * Executes the SCORM import process.
     *
     * This method scans the specified directory for SCORM zip files.
     * For each zip file found, it creates a new course in the specified category
     * and imports the SCORM package into the newly created course.
     *
     * @return void
     */
    public function execute() {
        global $DB, $CFG;

        $data = $this->get_custom_data();
        $categoryid = $data['category'];
        $directory = $data['directory'];

        foreach (glob($directory . '/*.zip') as $zipfile) {
            $filename = pathinfo($zipfile, PATHINFO_FILENAME);

            // Create a new course.
            $course = create_course((object)[
                'fullname' => $filename,
                'shortname' => $filename,
                'category' => $categoryid,
            ]);

            // Prepare SCORM module data.
            $module = $DB->get_record('modules', ['name' => 'scorm'], '*', MUST_EXIST);
            $moduleinfo = new \stdClass();
            $moduleinfo->modulename = 'scorm';
            $moduleinfo->course = $course->id;
            $moduleinfo->section = 0; // Add to first section.
            $moduleinfo->name = $filename;
            $moduleinfo->scormtype = SCORM_TYPE_LOCAL;
            $moduleinfo->packagefilepath = $zipfile;

            // Add the SCORM activity to the course.
            try {
                $cmid = scorm_add_instance($moduleinfo, null);
                mtrace("SCORM package imported successfully. Course: {$course->id}, Module: {$cmid}");
            } catch (\Exception $e) {
                mtrace("Error importing SCORM package {$filename}: " . $e->getMessage());
            }
        }
    }
}
