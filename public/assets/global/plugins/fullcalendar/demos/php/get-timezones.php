<?php
/**
 * Copyright (c) 2019. 
 * sanjay kranthi  kranthi0987@gmail.com
 */

//--------------------------------------------------------------------------------------------------
// This script outputs a JSON array of all timezones (like "America/Chicago") that PHP supports.
//
// Requires PHP 5.2.0 or higher.
//--------------------------------------------------------------------------------------------------

echo json_encode(DateTimeZone::listIdentifiers());
