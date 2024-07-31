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
 * Version information for the SCORM Import plugin.
 *
 * This file contains the version information for the SCORM Import plugin,
 * including the current version, required Moodle version, and the plugin's component name.
 *
 * @package    tool_scormimport
 * @copyright  2024 TNG Consulting Inc. (https://tngconsulting.ca)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.
 */

defined('MOODLE_INTERNAL') || die();

$plugin->version   = 2024073000;        // The current plugin version (Date: YYYYMMDDXX).
$plugin->requires  = 2023100900;        // Requires this Moodle version.
$plugin->component = 'tool_scormimport';  // Full name of the plugin (used for diagnostics).
$plugin->release   = 'v0.0.1';          // Human-readable version name.
$plugin->maturity  = MATURITY_ALPHA;    // This version's maturity level.
