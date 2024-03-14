<?php

if (!function_exists('flash')) {
    /**
     * @param string $message
     * @param string $style
     *
     * @return void
     */
    function flash(string $message, string $style = 'success'): void
    {
        session()->flash('flash.banner', $message);
        session()->flash('flash.bannerStyle', $style);
    }
}
