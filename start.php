<?php
/*
  Laravel bundle support layer. You only need it if you're using Laravel.
*/

require_once __DIR__.DS.'squall.php';

if ( $init = Bundle::option('squall', 'init') ) {
  $init = 'Squall\\'.($init === true ? 'initEx' : $init);
  $init(Bundle::option('squall', 'ns', '\\'), Bundle::option('squall', 'name', 'S'));
}
