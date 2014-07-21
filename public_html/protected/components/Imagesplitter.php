<?php

/**
 * Split large images into n small pieces
 *
 * Split large images into small equal-sized pieces to prevent
 * easy copying of images.
 *
 * @Original author   Jiang Kuan <kuan.jiang@gmail.com>
 * @version  v1.1 2007/10/01
 * @package  ImageSplitter
 *
 * @Modified by Sameer Borate http://www.codediesel.com
 * @version v1.2 2013/04/06
 * 
 */

class ImageSplitter {
    
    /**
     * Output image type, available values are IMAGETYPE_PNG, IMAGETYPE_JPEG and IMAGETYPE_GIF. default value: IMAGETYPE_PNG
     * @access public
     */
     public $outputType = IMAGETYPE_PNG;
    
    /**
     * Source image filename
     * @var string
     * @access private
     */


	private $imagePath="Images";
	public function setImagePath($imgPath){
		$this->imagePath=$imgPath;
	}

    private $src;
    
    /**
     * Source image (resource)
     * @var resource
     * @access private
     */
    private $srcImage;
    
    /**
     * Source image width
     * @var int
     * @access private
     */
    private $srcWidth;
	public function getSrcWidth(){
		return $this->srcWidth;
	}
    
    /**
     * Source image height
     * @var int
     * @access private
     */
    private $srcHeight;
	public function getSrcHeight(){
		return $this->srcHeight;
	}


   // $offsetY = ($this->srcHeight / $tileYNo) * $i;
    //$offsetX = ($this->srcWidth / $tileXNo) * $j;

    
    private $tileSizeX;

    public function getTileSizeX()
    {
        return $this->tileSizeX;
    }

    private $tileSizeY;
    public function getTileSizeY()
    {
        return  $this->tileSizeY;
    }
	
    
    /**
     * Source image type
     * @var int
     * @access private
     */
    private $srcType;
    
    /**
     * Source image mime type
     * @var string
     * @access private
     */
    private $srcMimeType;
    
    /**
     * Canvas width
     * @var int
     * @access private
     */
    private $width;
    
    /**
     * Canvas height
     * @var int
     * @access private
     */
    private $height;
    
    private $offsetX = 0;
    private $offsetY = 0;
    
    private $countX = 0;
    private $countY = 0;
    
    private $startX = 0;
    private $startY = 0;

    private $panoID;
    public function getPanoID(){

        return $this->panoID;
    }
    
 
    /**
     * Load a source image
     * @access public
     * @param string|resources $src If $src is a string, it will be treated as an filename; if $src is resource type, it will be load directly
     * @return bool whether the source image is load successfully
     */
    public function Load($src){
        if(is_null($src)) return false;
        
        
        if(is_file($src)){
            $this->src = $src;
            
            $info = getimagesize($src);
            if(!$info) return false;
            
            list($this->srcWidth, $this->srcHeight, $this->srcType, $tmp1, $tmp2, $this->srcMimeType) = array_values($info);
            
            $supported_format = array();
            $types = imagetypes();
            if($types & IMG_GIF) $supported_format[]=IMAGETYPE_GIF;
            if($types & IMG_JPG) $supported_format[]=IMAGETYPE_JPEG;
            if($types & IMG_PNG) $supported_format[]=IMAGETYPE_PNG;
            if($types & IMG_WBMP) $supported_format[]=IMAGETYPE_WBMP;
            if($types & IMG_XPM) $supported_format[]=IMAGETYPE_XBM;
            
            if(!in_array($this->srcType, $supported_format)) return false;
        }
    
        
        return true;
    }
    
  
    
    public function Split() {
        
        if(!$this->srcImage) {
            $this->srcImage = imagecreatefromstring(file_get_contents($this->src));
        }
        
        for($i=0; $i<3; $i++)
        {
            if(function_exists('imagecreatetruecolor')) {
                $im = imagecreatetruecolor($this->srcWidth, $this->srcHeight / 3);
            } else {
                $im = imagecreate($this->srcWidth, $this->srcHeight / 3);
            }
            
            $offset = ($this->srcHeight / 3) * $i;
            if(!imagecopyresampled($im, $this->srcImage, 0, 0, 0, $offset, $this->srcWidth, $this->srcHeight / 3, $this->srcWidth, $this->srcHeight / 3))
                return false;
            
            $imagename = substr($this->src, 0, strlen($this->src) - 4);
            $imageextension = substr($this->src, strlen($this->src) - 3, 3);
            
            $ret2 = $this->__output($im, $imagename . "-" . $i . "." . $imageextension);
        }
 
    }

	public function Split2D($property_id,$point_id,$tileXNo,$tileYNo){

		if(!$this->srcImage) {
          

            $this->tileSizeX=$this->srcWidth / $tileXNo;
            $this->tileSizeY=$this->srcHeight / $tileYNo;

            $this->srcImage = imagecreatefromstring(file_get_contents($this->src));
        }

	
		for($i=0; $i<$tileYNo; $i++)
		{
				for($j=0; $j<$tileXNo; $j++)
				{
					
					if(function_exists('imagecreatetruecolor')) 
					{
						$im = imagecreatetruecolor($this->srcWidth/$tileXNo, $this->srcHeight /$tileYNo );
					} else 
					{
						$im = imagecreate($this->srcWidth/$tileXNo, $this->srcHeight / $tileYNo);
					}

					$offsetY = ($this->srcHeight / $tileYNo) * $i;
					$offsetX = ($this->srcWidth / $tileXNo) * $j;
					 if(!imagecopyresampled($im, $this->srcImage, 0, 0, $offsetX, $offsetY, $this->srcWidth/$tileXNo, $this->srcHeight / $tileYNo, $this->srcWidth/$tileXNo, $this->srcHeight / $tileYNo))
						return false;
					//$imagename = substr($this->src, 0, strlen($this->src) - 4);
					$imagename="pr-".$property_id."-pt-".$point_id;
					$this->panoID=$imagename;
                    $imageextension = substr($this->src, strlen($this->src) - 3, 3);
					$ret2 = $this->__output($im, $this->imagePath."/".$imagename . "-" . $j . "-".$i."_s1." . $imageextension);
				}
		}
	}
    
    /**
     * Release the source image's resource
     * @access public
     */
    public function Free(){
        if($this->srcImage) imagedestroy($this->srcImage);
    }
    
    /**
     * Get all tiles
     * @access private
     * @param resource $res Image resource to be output
     * @param string $dest Output filename, null to output to the browser directly
     */
    private function __output($res, $dest = null){
        
        switch($this->outputType){
            case IMAGETYPE_GIF:
                return imagegif($res, $dest);
            case IMAGETYPE_JPEG:
                return imagejpeg($res, $dest);
            default:
                return imagepng($res, $dest);
        }
    }
}

?>