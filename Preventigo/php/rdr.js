const express = require('express');
const app = express();
var fs = require('fs');
const validate = require('./validate');
require('./common');

var router = express.Router();
module.exports = router;
module.exports.callBackAfterLogin=callBackAfterLogin;

router.get('/', function (req, res) {
secure_code = req.query.c;
qrcode_scanned= !req.query.man_inp?1:0;
console.log("route : "+uid);
   if(uid)
   {
      var response = validate.validateCode(req.query.c,req.query.man_inp);
      if(response.page_idx == 1)
         redirectToPage('/Preventigo/search-product.html',res);
      else if(response.page_idx == 2)
         redirectToPage('/Preventigo/false_page.html',res);
   }
   else
      redirectToPage('/Preventigo/index.html',res);  
})

function callBackAfterLogin(res)
{
   console.log("code "+secure_code);
   if(secure_code)
   {
      var response = validate.validateCode(secure_code,0);
     
      if(response.page_idx == 1)
         redirectToPage('/Preventigo/search-product.html',res);
      else if(response.page_idx == 2)
         redirectToPage('/Preventigo/false_page.html',res);
   }
   else
      redirectToPage('/Preventigo/index.html',res);  
}

function redirectToPage(pageUrl,res)
{
  
   fs.readFile(base_path+pageUrl,function(err,data){
      if(err) 
      {
          res.writeHead(200, {'Content-Type': 'text/html'});
          res.write(err);
      }
      else
      {
         res.writeHead(200, {'Content-Type': 'text/html','Content-Length':data.length});
         res.write(data);
      }
      res.end();
   });
}

