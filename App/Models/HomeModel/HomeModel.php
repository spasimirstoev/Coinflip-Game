<?php 
namespace App\Models\HomeModel;

class HomeModel
{
	/**
	 * Create a thumbnail
	 */
	public function createThumbnail($pathToImages, $pathToThumbs, $thumbWidth)
	{	
		// open the directory
  		$dir = opendir( $pathToImages );
		  // loop through it, looking for any/all JPG files:
		  while (($fname = readdir($dir)) !== false) {
		    // parse path for the extension
		    $info = pathinfo($pathToImages . $fname, PATHINFO_EXTENSION);
		    	// continue only if this is a JPEG image
			    if ( strtolower($info == 'jpg' ))
			    {
			     // load image and get image size
			      $img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );
			      $width = imagesx( $img );
			      $height = imagesy( $img );

			      // calculate thumbnail size
			      $new_width = $thumbWidth;
			      $new_height = floor( $height * ( $thumbWidth / $width ) );

			      // create a new temporary image
			      $tmp_img = imagecreatetruecolor( $new_width, $new_height );

			      // copy and resize old image into new image 
			      imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

			      // save thumbnail into a file
			      imagejpeg( $tmp_img, "{$pathToThumbs}{$fname}" );
			    }
		  }
		  // close the directory
		  closedir( $dir );
	}

}