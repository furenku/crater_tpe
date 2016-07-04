$(document).foundation();

u = new FrontEndUtils();

$(document).ready(function(){

   $('.imgLiquid.imgLiquidFill').imgLiquid();

   $('.imgLiquid.imgLiquidNoFill').imgLiquid({
      fill:false
   });

   u.vcenter();

});
