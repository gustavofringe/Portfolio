<?php
function debug($var)
{
    $debug = debug_backtrace();
    ?>
    <div class="container">
                <pre>
                    <strong>Debug</strong>
                        <p><?= print_r($var); ?></p>
                </pre>
    </div>
    <?php
    //die();
}
