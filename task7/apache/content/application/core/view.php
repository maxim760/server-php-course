<?php
class View
{
    public function generate($content_view, $data = null)
    {
        include 'application/views/'.$content_view;
    }
}