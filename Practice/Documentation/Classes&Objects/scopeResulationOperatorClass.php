<!-- ::class -->

<?php

// namespace NS{
//     class ClassName{

//     }
//     echo ClassName::class;
// }

// Object name resolution

namespace NP{
    class ClassName{

    }
}
$c = new ClassName();
print $c::class;

