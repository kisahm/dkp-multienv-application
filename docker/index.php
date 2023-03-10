<?php
echo "
<!DOCTYPE html>
<html>
<head>
<title>Hello Cluster</title>
<style>
body {
  margin: 0px;
  font: 20px 'RobotoRegular', Arial, sans-serif;
  font-weight: 100;
  height: 100%;
  color: #0f1419;
}
div.info {
  display: table;
  background: #e8eaec;
  padding: 20px 20px 20px 20px;
  border: 1px dashed black;
  border-radius: 10px;
  margin: 0px auto auto auto;
}
div.info p {
    display: table-row;
    margin: 5px auto auto auto;
}
div.info p span {
    display: table-cell;
    padding: 10px;
}
img {
    width: 176px;
    margin: 36px auto 36px auto;
    display:block;
}
div.smaller p span {
    color: #3D5266;
}
h1, h2 {
  font-weight: 100;
}
div.check {
    padding: 0px 0px 0px 0px;
    display: table;
    margin: 36px auto auto auto;
    font: 12px 'RobotoRegular', Arial, sans-serif;
}
#footer {
    position: fixed;
    bottom: 36px;
    width: 100%;
}
#center {
    width: 400px;
    margin: 0 auto;
    font: 12px Courier;
}

</style>
</head>
<body>
<img alt='NGINX Logo' src='https://assets.d2iq.com/production/assets/pages/brand/logo/logo-positive@1x.jpg'/>
<div class='info'>
<p><span>Environment:</span> <span>";
echo $_ENV["NODE_ENVIRONMENT"];
echo "</span></p><p><span>Namespace&nbsp;name:</span> <span>";
echo $_ENV["NAMESPACE"];
echo "</span></p>
<p><span>Pod&nbsp;name:</span> <span>";
echo $_ENV["POD_NAME"];
echo "</span></p><p><span>Go&nbsp;to:</span> <span><a href='hello/env/";
echo $_ENV["NODE_ENVIRONMENT"];
echo ".php'>Cluster</a></span></p>
</div>
</body>
</html>";
?>