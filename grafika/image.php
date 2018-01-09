<?php
require_once 'src/autoloader.php';
use Grafika\Grafika;
use Grafika\Color;

class GrafikaImage {
    private $__editor;
    public function __construct(){
        $this->__editor = Grafika::createEditor();
    }
    /* thumbnailExact 固定尺寸缩放类型。就是不管图片长宽比，全部缩小到指定宽高，可能导致图片变形
     * $imageFile处理前图片
     * $targetFile处理后图片
     * $width缩略图宽
     * $height缩略图高
     */
    public function thumbnailExact($imageFile,$targetFile,$width,$height){ //固定比例缩放
        $this->__editor->open($image ,$imageFile);
        $this->__editor->resizeExact($image , $width,$height);
        $this->__editor->save($image ,$targetFile);
    }
    /* thumbnailFill 居中剪裁。就是把较短的变缩放到指定宽高，然后将长边的大于指定宽高的部分居中剪裁掉，图片不会变形。
     * $imageFile处理前图片
     * $targetFile处理后图片
     * $width缩略图宽
     * $height缩略图高
     */
    public function thumbnailFill($imageFile,$targetFile,$width,$height){ //固定比例缩放
        $this->__editor->open($image ,$imageFile);
        $this->__editor->resizeFill($image , $width,$height);
        $this->__editor->save($image ,$targetFile);
    }
    /* thumbnailExactWidth 等宽缩放。和第一种功能相似，最终宽为指定宽度，等比缩放，高度不管。
     * $imageFile处理前图片
     * $targetFile处理后图片
     * $width缩略图宽
     * 
     */
    public function thumbnailExactWidth($imageFile,$targetFile,$width){ //固定比例缩放
        $this->__editor->open($image ,$imageFile);
        $this->__editor->resizeExactWidth($image , $width);
        $this->__editor->save($image ,$targetFile);
    }
    /* thumbnailExactHeight 等宽缩放。和第一种功能相似，最终宽为指定高度，等比缩放，宽度不管。
     * $imageFile处理前图片
     * $targetFile处理后图片
     * $height缩略图高
     *
     */
    public function thumbnailExactHeight($imageFile,$targetFile,$height){ //固定比例缩放
        $this->__editor->open($image ,$imageFile);
        $this->__editor->resizeExactHeight($image , $height);
        $this->__editor->save($image ,$targetFile);
    }
    /*
     * imageCut 图片智能剪裁
     * $type 值范围top-left,top-center,top-right,center-left,center,center-right,bottom-left,bottom-center,bottom-right        
     */
    public function imageCut($imageFile,$targetFile,$width,$height,$type='smart'){
        $this->__editor->open( $image, $imageFile);
        $this->__editor->crop( $image, $width, $height, $type );
        $this->__editor->save( $image, $targetFile);
    }
    /*
     * 压缩gif图片
     * $imageFile处理前图片
     * $targetFile处理后图片
     * $width缩略图宽
     * $height缩略图高 
     */
    public function compressGif($imageFile,$targetFile,$width,$height){
        $this->__editor->open( $image, $imageFile);
        $this->__editor->resizeFit( $image, $width, $height);
        $this->__editor->save( $image, $targetFile);
    }
    /*
     * 移除gif效果
     */
    public function removeGifEffect($imageFile,$targetFile){
        $this->__editor->open( $image, $imageFile);
        $this->__editor->flatten( $image, $width, $height);
        $this->__editor->save( $image, $targetFile);
    }
    /*
     * 图片合并
     */
    public function imageMerge($imageFile1,$imageFile2,$targetFile,$type='normal',$transparency=1,$position='center'){
        $this->__editor->open($image1 , $imageFile1);
        $this->__editor->open($image2 , $imageFile2);
        $this->__editor->blend ( $image1, $image2 , $type, $transparency, $position);
        $this->__editor->save($image1,$targetFile);
    }
    /*
     * 图片加文字
     */
    public function imageText($imageFile,$text,$size=12,$x=0,$y=0,$color,$font='',$angle=0,$targetFile){
        $color = new Color("#000000");
        $this->__editor->open($image , $imageFile);
        $this->__editor->text($image ,$text,$size,$x,$y,$color,$font,$angle);
        $this->__editor->save($image,$targetFile);
    }
}