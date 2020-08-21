<?php

session_start();
require_once("./src/core/constants.php");

require_once(COREUTILS_URL);

require_once(SESSIONS_URL);

require_once(ROUTES_URL);

print(render(INDEX_URL,getDictionary()));