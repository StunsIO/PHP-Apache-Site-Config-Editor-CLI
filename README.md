# Apache Site Configuration Manager

This PHP script provides a set of functions for generating, editing, and parsing Apache configuration files. It simplifies the process of managing virtual hosts and directives, making it easier to customize your Apache server.

## Table of Contents

- [About the Project](#about-the-project)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Usage](#usage)
- [Functions](#functions)
- [Examples](#examples)
- [License](#license)

## About the Project

The Apache Configuration Manager is a PHP script designed to streamline the management of Apache configuration files. It includes functions for generating Apache configurations from JSON input, editing directives, and parsing existing configurations.

## Getting Started

### Prerequisites

To run this script, you'll need:
- PHP (PHP 5.4 or higher) installed on your system.
- Access to the Apache configuration file you want to edit.

### Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/StunsIO/PHP-Apache-Site-Config-Editor-CLI.git
   ```

### Usage
   ```bash
   php apache_config_cli.php <file_path> <directive> <key> <value>
   ```
- `<file_path>`: Path to the Apache configuration file.
- `<directive>`: The directive to edit.
- `<key>`: The key to edit within the directive.
- `<value>`: The new value for the specified key.

### Functions
1. `generate_apache_config($config)`
   Generates an Apache configuration from a JSON/Array input.
2. `edit_apache($config_string, $directive, $key, $value)`
   Edits an Apache directive with a new value.
3. `parse_apache_config($file_path)`
   Parses an Apache configuration file and returns it as an associative array.

### Examples
   ```bash
   php apache_config_cli.php /etc/apache2/sites-available/default-ssl.conf 'VirtualHost *:443' 'DocumentRoot' '/var/www/html'
   ```
### License
[![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)
