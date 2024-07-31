# SCORM Import for Moodle LMS

![PHP](https://img.shields.io/badge/PHP-v7.4%20to%20v8.3-blue.svg)
![Moodle](https://img.shields.io/badge/Moodle-v4.1%20to%20v4.4-orange.svg)
[![GitHub Issues](https://img.shields.io/github/issues/michael-milette/moodle-tool_scormimport.svg)](https://github.com/michael-milette/moodle-tool_scormimport/issues)
[![Contributions welcome](https://img.shields.io/badge/contributions-welcome-green.svg)](#contributing)
[![License](https://img.shields.io/badge/License-GPL%20v3-blue.svg)](#license)

IMPORTANT! This is currently under development and completely untested. DO NOT USE!

# Table of Contents

- [SCORM Import for Moodle LMS](#scorm-import-for-moodle-lms)
- [Table of Contents](#table-of-contents)
  - [Description](#description)
  - [Features](#features)
  - [Requirements](#requirements)
- [Download SCORM Import for Moodle](#download-scorm-import-for-moodle)
  - [Installation](#installation)
  - [Usage](#usage)
    - [Batch Processing](#batch-processing)
- [Motivation for this plugin](#motivation-for-this-plugin)
- [Further Information](#further-information)
- [License](#license)

## Description

The `SCORM Import` plugin allows users to create Moodle LMS courses based on SCORM packages from the command line. This tool is designed to streamline the process of importing SCORM packages for Moodle, making it easier to manage and deploy e-learning content.

[(Back to top)](#table-of-contents)

## Features

- Create Moodle single activity courses and import SCORM packages via command line.
- Batch processing of multiple SCORM packages.
- Easy integration with existing Moodle installations.

[(Back to top)](#table-of-contents)

## Requirements

This plugin requires Moodle 4.1+ from https://moodle.org/ .

[(Back to top)](#table-of-contents)

# Download SCORM Import for Moodle

The most recent development release can be found at:
https://github.com/michael-milette/moodle-tool_scormimport

[(Back to top)](#table-of-contents)

## Installation

1. Download the plugin from the [GitHub](https://github.com/michael-milette/moodle-tool_scormimport).
2. Extract the downloaded file to the `admin/tool` directory of your Moodle installation.
3. Visit the Site Administration > Notifications page to complete the installation.

[(Back to top)](#table-of-contents)

## Usage

1. Ensure CLI access:

Make sure you have command-line access to your Moodle server and the necessary permissions.

2. Open your command line interface.
3. Navigate to the Moodle root directory.
4. Run the following command to create a SCORM package:

```sh
php admin/tool/scormimport/cli/create_scorm.php PARAMETERS TO BE ADDED
```

[(Back to top)](#table-of-contents)

### Batch Processing

For batch creation of single-activity courses containing a signle SCORM activity, place all your SCORM ZIP files in a single directory on the server and create a Bash script to automate the process. Here's an example (be sure to customize it!):

[(Back to top)](#table-of-contents)

# Motivation for this plugin

The development of this plugin was motivated by our own experience in Moodle implementations, features requested by our clients and topics discussed in the Moodle forums. The project is sponsored and supported by TNG Consulting Inc.

[(Back to top)](#table-of-contents)

# Further Information

For further information regarding the SCORM Import plugin, support or to report a bug, please visit the project page at:

https://github.com/michael-milette/moodle-tool_scormimport

[(Back to top)](#table-of-contents)

# License

Copyright © 2024 TNG Consulting Inc. - https://www.tngconsulting.ca/

This file is part of SCORM Import for Moodle - https://moodle.org/

SCORM Import is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

SCORM Import is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with SCORM Import.  If not, see <https://www.gnu.org/licenses/>.

[(Back to top)](#table-of-contents)
