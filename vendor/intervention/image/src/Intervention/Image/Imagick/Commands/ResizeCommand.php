<?php

namespace Intervention\Image\Imagick\Commands;

class ResizeCommand extends \Intervention\Image\Commands\AbstractCommand
{
    /**
     * Resizes image dimensions
     *
     * @param  \Intervention\Image\Image $image
     * @return boolean
     */
    public function execute($image)
    {
        $width = $this->argument(0)->value();
        $height = $this->argument(1)->value();
        $constraints = $this->argument(2)->type('closure')->value();

        // resize box
        $resized = $image->getSize()->resize($width, $height, $constraints);

        // modify image
        $image->getCore()->resizeImage($resized->getWidth(), $resized->getHeight(), \Imagick::FILTER_BOX, 1);

        return true;
    }
}
