<?php
# save single request
if (!isset($correct)) {
    die();
}

# ist die PHP-Erweiterung "mongodb" vorhanden
if (!extension_loaded("mongodb")) {
    die('Bitte die PHP-MongoDB-Erweiterung installieren');
}
