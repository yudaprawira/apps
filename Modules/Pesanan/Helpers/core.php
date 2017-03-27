<?php
function createInvoice()
{
    return 'BQ'.substr(rand(),0,2).time().substr(rand(),0,1);
}
?>