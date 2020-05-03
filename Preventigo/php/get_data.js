var express = require('express');
var fs = require('fs');
require('./common');
var url = require('url');
var router = express.Router();
module.exports = router;


router.get('/', function (req, res) {
    var tag_idx =0;
    // console.log("Url : "+req.url);
   
    if(req.query.tag_idx)
    tag_idx = req.query.tag_idx;
    if(uid)
    {
        res.send(uid);
    }
    else
    {
        var jsonObj = {'result':0};
        res.send(jsonObj);
    } 
})


