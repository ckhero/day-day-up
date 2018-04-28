1 文字添加  中英文（imageloadfont 无法ttf，需要ttf转成gdf，工具难找，故而使用 imagettftext代替 imageloadfont和imagechar的搭配）<br>  
2 创建画布 推荐使用imagecreatetruecolor，读取图片  imagecreatefrom(png|jpeg|gif)<br>  
3 颜色填充  imagefilledrectangle<br>  
4 虚线 imagesetstyle和imageline 搭配<br>  
5 缩略图 imagecopyresampled() <br>  将一幅图像中的一块正方形区域拷贝到另一个图像中，平滑地插入像素值，因此，尤其是，减小了图像的大小而仍然保持了极大的清晰度。（缩略图   图片剪切）<br>  
6 加噪点 imagesetpixel<br>  <br>  

7  灰度 imagefilter<br>   

推荐使用<br>   

https://github.com/kosinix/grafika/<br>  
https://segmentfault.com/a/1190000007411281<br>  