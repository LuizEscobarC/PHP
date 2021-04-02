<html>
<body>
  <?php
    function html_img($url, $alt = null, $height = null, $width = null ){
      $html = '<img src="' . $url .'"';
      if (isset($alt)){
        $html.= ' alt="' . $alt . '"';
      }
      if (isset($height)){
        $html.= ' height="' . $height . '"';
      }
      if (isset($width)){
        $html.= ' widht="' . $width . '"';
      }
      $html .= '/>';
      return $html;
    }
  ?>
  </body>
</html>