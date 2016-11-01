<?php
    if ( $ERROR_MESSAGE != '' )
        echo "<div class='errorMsg'>
                <i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> " . $ERROR_MESSAGE . "
              </div>";

    if ( $SUCCESS_MESSAGE != '' )
        echo "<div class='successMsg'>
                <i class=\"fa fa-check\" aria-hidden=\"true\"></i> " . $SUCCESS_MESSAGE . "
              </div>";
?>
