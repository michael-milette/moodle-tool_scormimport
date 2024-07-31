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
 * CLI script to import SCORM packages in bulk.
 *
 * This script allows the user to import SCORM packages into a specified category
 * in bulk from a given directory. It can be executed from the command line with
 * various options to specify the category ID and the directory containing the SCORM packages.
 *
 * Usage:
 *     php import_scorm.php [--category=<id>] [--directory=<path>]
 *     php import_scorm.php -h | --help
 *
 * Options:
 *     -h --help               Show this help message
 *     --category=<id>         Category ID to create courses in [default: 1]
 *     --directory=<path>      Directory containing SCORM packages [default: current directory]
 *
 * @package    tool_scormimport
 * @subpackage cli
 * @copyright  2024 TNG Consulting Inc. (https://tngconsulting.ca)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 * Note: Initial version of this script was generated with assistance from Claude 3.5, an AI model by Anthropic.
 */

define('CLI_SCRIPT', true);

require(__DIR__ . '/../../../../config.php');
require_once($CFG->libdir . '/clilib.php');
require_once($CFG->dirroot . '/admin/tool/scormimport/classes/task/import_scorm.php');

// Set up the command line arguments.
$usage = "Import SCORM packages in bulk.

Usage:
    php import_scorm.php [--category=<id>] [--directory=<path>]
    php import_scorm.php -h | --help

Options:
    -h --help               Show this help message
    --category=<id>         Category ID to create courses in [default: 1]
    --directory=<path>      Directory containing SCORM packages [default: current directory]
";

list($options, $unrecognized) = cli_get_params([
    'help' => false,
    'category' => 1,
    'directory' => getcwd(),
], [
    'h' => 'help',
]);

if ($unrecognized) {
    $unrecognized = implode(PHP_EOL . '  ', $unrecognized);
    cli_error(get_string('cliunknowoption', 'core_admin', $unrecognized));
}

if ($options['help']) {
    cli_writeln($usage);
    exit(0);
}

$task = new \scormimport\task\import_scorm();
$task->set_custom_data([
    'category' => $options['category'],
    'directory' => $options['directory'],
]);
$task->execute();
