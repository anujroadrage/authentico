const common =require('./common');
module.exports.validateCode =validateCode;
var response ={result:0};
if(!session_id)
{
    // Start New Session
}

function validateCode(code,man_inp)
{
    manual_input = man_inp?manual_input+1:0;
    var code_res = common.breakCode(code);
    response.result = code_res;
    if(!code_res)check_false_code(); // if code is false
    return response;
}

// check if code is entered manually, if yes then give user three chances to correct it.

function check_false_code()
{

console.log(manual_input);
    if(manual_input<3)
    {
        response.page_idx = 1;
        response.message  = "Show SearchCodePage";
    }
    else
    {
        response.page_idx = 2;
        response.message = "Show false code page";
    }
}

function redirect_num_of_rows(numOfRows,pageToRedirect)
{
    switch(numOfRows)
    {
        case 0:
            {
                
            }
            break;
        case 1:
            {

            }
            break;
        default:
            {

            }
            break;
    }
   
}



