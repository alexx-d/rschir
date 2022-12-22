<?php
class View
{
    function generate($template_view, $data = null)
    {
        include 'view/'.$template_view;
    }
}