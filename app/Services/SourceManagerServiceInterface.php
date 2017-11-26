<?php


namespace App\Services;


interface SourceManagerServiceInterface
{

    /**
     * @return SourceGrabberServiceInterface[]
     */
    public function getActiveGrabbers();

}