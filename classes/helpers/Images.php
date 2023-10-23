<?php  

namespace Classes\Helpers ;
class Images {
    public $img_name, $img_tmp_name, $img_new_name ;
    
    public function __construct( $img)
    {
        $this-> img_name = $img['name'] ;
        $this-> img_tmp_name = $img['tmp_name'] ;
        $imgExt = pathinfo( $this-> img_name,PATHINFO_EXTENSION) ;
        $this->img_new_name = uniqid().'.'. $imgExt ;
    }

    public function upload()
    {
        move_uploaded_file($this->img_tmp_name,'../images/'.$this->img_new_name) ;
    }
}
?>