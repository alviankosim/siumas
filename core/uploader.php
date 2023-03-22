<?php

class Uploader
{

    private $param_name = '';
    private $is_valid = false;
    private $images_name = [];

    public function __construct()
    {
        //Do your magic here
    }

    public function validate($param_name)
    {
        // Get reference to uploaded image
        $image_file = $_FILES[$param_name];
        // var_dump($image_file);exit;

        // validating first
        if (!(isset($image_file) && isset($image_file['name']) && is_array($image_file['name']) && count($image_file['name']) > 0)) {
            return 'Image does not exist';
        }

        $images = $image_file['name'];
        $flag = true;
        $messaged = '';
        for ($i = 0; $i < count($images); $i++) {
            // Exit if image file is zero bytes
            if (filesize($image_file["tmp_name"][$i]) <= 0) {
                $flag = false;
                $messaged = 'One of the uploaded file has no contents.';
                break;
            }

            // Exit if is not a valid image file
            $image_type = exif_imagetype($image_file["tmp_name"][$i]);
            if (!$image_type) {
                $flag = false;
                $messaged = 'One of the uploaded file is not image.';
                break;
            }
        }
        if (!$flag) {
            return $messaged;
        }


        $this->images_name = $images;
        $this->is_valid = true;
        $this->param_name = $param_name;

        return $this->is_valid;
    }

    public function upload($param_name, $location_name)
    {
        $valid_images = [];

        // revalidate if it's not already validated
        if (!($param_name == $this->param_name && $this->is_valid == true)) {
            $this->validate($param_name);
        }

        $image_file = $_FILES[$param_name];
        for ($i = 0; $i < count($this->images_name); $i++) {

            $image_type = exif_imagetype($image_file["tmp_name"][$i]);
            // Get file extension based on file type, to prepend a dot we pass true as the second parameter
            $image_extension = image_type_to_extension($image_type, true);
            // Create a unique image name
            $image_name = bin2hex(random_bytes(16)) . $image_extension;
            // Move the temp image file to the images directory
            move_uploaded_file(
                // Temp image location
                $image_file["tmp_name"][$i],

                // New image location
                $location_name . $image_name
            );
            $valid_images[] = $image_name;
        }

        return $valid_images;
    }
}
