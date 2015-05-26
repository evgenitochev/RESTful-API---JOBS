<?php

function view($location)
{
    if (file_exists("../App/Views/" . $location)) {
        return file_get_contents("../App/Views/" . $location);
    }

}