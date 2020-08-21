<?php

session_start();

require_once("./src/core/coreutils.php");

require_once("./src/core/constants.php");

require_once("./src/core/sessions.php");

require_once("./src/core/routes.php");

print(render(INDEX_URL,getDictionary()));
