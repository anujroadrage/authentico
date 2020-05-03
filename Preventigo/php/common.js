global.secure_code = "sad";
global.uid = "";
global.session_id = "";
global.secure_code_data ={mode:0};
global.manual_input =0;
global.base_path =0;
global.qrcode_scanned =0;
module.exports.breakCode = breakCode;

function breakCode(code)
{
  var codeSegArr = code.split('-');
  if(codeSegArr.length<2 || codeSegArr.length>5)
  return 0;

  secure_code_data.mode =codeSegArr[0];
  if(secure_code_data.mode  == 1)
  {
    secure_code_data.company_code     = codeSegArr[1];
    secure_code_data.keycode          = codeSegArr[2];
    return 1;
  }
  else if(secure_code_data.mode ==2 || secure_code_data.mode ==3)
  {
    secure_code_data.company_code     = codeSegArr[1];
    secure_code_data.product_profile  = codeSegArr[2];
    secure_code_data.product_list     = codeSegArr[3];
    secure_code_data.keycode          = codeSegArr[4];
    return 1;
  }
  else 
  {
    secure_code_data.message = "mode is out of bound";
    return 0;
  }

}



