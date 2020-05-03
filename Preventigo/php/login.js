var MongoClient = require('mongodb').MongoClient;
var mongoUrl = 'mongodb://localhost:27017'; 
var express = require('express');
var rdr = require('./rdr');
var app = express();
require('./common');
var router = express.Router();
module.exports = router;


router.get('/', function (req, res) {   
    if(req.query.mode==1)
    {
        var _user_name = req.query.username;
        var _password = req.query.password;
       
        if(_user_name&&_password)
        {
            MongoClient.connect(mongoUrl, { useUnifiedTopology: true },function(err, db) {
                if (err) throw err;
                var dbo = db.db("preventigo");
                dbo.collection("user_info").find({$and:[{email:_user_name},{password:_password}]}).toArray(function(err,result){
                    if(err) throw err;
                    var jsonObj;
                    if(result.length==1)
                    {
                        uid = _user_name;
                        jsonObj = {'result':'1',"code":secure_code,'redirect_idx':''+qrcode_scanned};
                        // if(qrcode_scanned==1)
                        // {
                        //     rdr.callBackAfterLogin(res);
                        //     return;
                        // }
                    }   
                    else
                        jsonObj = {'result':'0','message':'Email or password is incorrect.'};
                    
                    res.send(jsonObj);
                    db.close();
                })
              });
        }
        else
        {
            var jsonObj = {'result':'0','message':'Enter all fields'};
            res.send(jsonObj);
        }
        
    }
    if(req.query.mode==11)
    {
        var _firstname = req.query.firstname;
        var _lastname = req.query.lastname;
        var _email = req.query.email;
        var _password = req.query.password;
        if(_firstname&&_lastname&&_email&&_password)
        {
            MongoClient.connect(mongoUrl, { useUnifiedTopology: true },function(err, db) {
                if (err) throw err;
                var dbo = db.db("preventigo");
                dbo.collection("user_info").find({email:_email}).toArray(function(err,result){
                    if(err) throw err;
                    if(result.length==0)
                    {
                        var myobj = { firstname: _firstname,lastname:_lastname,email:_email,password:_password};
                        dbo.collection("user_info").insertOne(myobj, function(err, result) {
                            if (err) throw err;
                            console.log("1 document inserted");
                            db.close();
                            var jsonObj = {'result':'0','message':'1 document inserted'};
                            res.send(jsonObj);
                        });
                    }
                    else
                    {
                        var jsonObj = {'result':'0','message':'Email already exist.'};
                        res.send(jsonObj);
                        db.close();
                    }
                    
                })
              });
        }
        else
        {
            var jsonObj = {'result':'0','message':'Enter all fields'};
            res.send(jsonObj);
        }

        // save username from database     
       
   
    }
    else if(req.query.mode==2)
    {

    }
    else if(req.query.mode==3)
    {

    }
    else if(req.query.mode==4)
    {

    }
    
  
})


