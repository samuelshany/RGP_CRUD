<?php

namespace App\Helpers;

use App\Models\Lang;

function getLangs()
{
    return Lang::selection()->active()->get();
}
function getLangs2()
{
    return Lang::selections()->active()->get();
}
