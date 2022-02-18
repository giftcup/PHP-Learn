<?php
    include 'test.php';         // links to a file, if file not, it throws a warning and the rest of the page loades
    include_once 'test.php';        //if the document has been included before it doesn't include again.
    require 'test.php';         // throws a failure error if file doesn't exist
    require_once 'test.php';        //stops the website if linking is done multiple times in a row