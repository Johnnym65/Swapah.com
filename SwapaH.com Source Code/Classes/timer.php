<?php

$target = mktime(0, 0, 0, 2, 10, 2012) ;

$today = time () ;

$difference =($target-$today) ;

$days =(int) ($difference/86400) ;
$hours =

print "Our event will occur in $days days, $hours hours";

?>