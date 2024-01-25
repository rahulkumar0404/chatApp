<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <style type="text/css">
    form {
      margin: auto;
      padding: 10px;
      /* background-color: aqua; */
      width: 100%;
      height: 100%;
      max-width: 600px;
      display: flex;
      min-height: 320px;
      flex-direction: column;
      color: #111111;
      box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; ;
    }

    input[type='text'],
    input[type='password'] {
      padding: 10px;
      margin: 10px;
      width: 95%;
      border: solid 1px grey;
      border-radius: 3px;
    }

    input[type='button'] {
      width: 98.5%;
      cursor: pointer;
      margin: 10px;
      background-color: #1e75d2;
      color: #ffffff;
      height: 35px;
      border-radius: 10px;
      border: solid 1px #ffffff;
    }

    input[type='radio'] {
      width: fit-content;
      transform: scale(1.3);
      padding: 10px;
    }
    #signup-header{
        background-color: #485b6c;
        font-size: 40px;
        text-align: center;
        font-family: headFace;
        width: 100%;
        color: white;
        margin-bottom: 18px;
        display: flex;
        flex-direction: column;
    }
    #signup-wrapper {
        max-width: 65vw;
        min-height: 699px;
        margin: auto;
        padding: 10px;
        color: white;
        font-family: myFOnt;
        font-size: 15px;
    }
    #back_to_login {
        font-size: 12px;
        font-family: myFont;
        text-align: center;
        cursor: pointer;
    }

  </style>
  <body>
    <div id="signup-wrapper">
        <div id="signup-header">
            <span>My Chat</span>
            <!-- <span id="back_to_login">Login</span> -->
        </div>
      <form id="myForm">
        <input type="text" name="username" placeholder="Username" /><br />
        <input type="text" name="email" placeholder="Email" /><br />
        <div
          style="
            display: flex;
            flex-direction: column;
            justify-content: space-between;
          "
        >
          <div style="margin: 10px; display: flex;"
            ><span style="text-align: center;">Gender: </span>
            <div style="display: flex;width: 89%; justify-content: space-evenly;">
                <div>
                <input type="radio" name="gender" value="Male"/><span style="padding-left: 7px; text-align: center;"
              >Male</span
            >
            </div>
            <div>
            <input type="radio" name="gender" value="Female" /><span  style="padding-left: 7px; text-align: center;">Female</span>
          </span>
          </div>
          </div>
        </div>
        <input type="password" name="password" placeholder="Password" /><br />
        <input
          type="password"
          name="confirmpassword"
          placeholder="Confirm Password"
        /><br />
        <input type="button" value="Sign Up" id="signup_button"/>
        <!-- <input type="button" value="Login" id="signup_button"/> -->
      </form>
      <div>
        <p id="back_to_login">Already Have An Account? Back to Login</p>
      </div>
    </div>
  </body>
</html>

<script type="text/javascript">
  function _(element){
    return document.getElementById(element)
  }

  let signup_button = _("signup_button")
  // console.log(signup_button)

  signup_button.addEventListener("click", collect_data)

  function collect_data(){
    let myForm = _("myForm")
    // console.log(myForm)
    let inputs = myForm.getElementsByTagName("INPUT")
    var data = {}
    for(let i = inputs.length - 1; i>=0; i--){
      let key = inputs[i].name
      console.log(key)
      switch(key){
        case "username": 
          data.username = inputs[i].value
          break;
        case "email": 
          data.email = inputs[i].value
          break;
        case "gender":
          if(inputs[i].checked){
            data.gender = inputs[i].value 
          }
          break;
        case "password":
          data.password = inputs[i].value 
          break;
        case "confirmpassword": 
          data.confirmpassword = inputs[i].value
          break;
      }
    }
    // console.log(data)
    send_data(data, "signup")
  }

  function send_data(data, type){
    let xml = new XMLHttpRequest()

    xml.onload = function (){
      if(xml.readyState == 4 || xml.status == 200){
        alert(xml.responseText);
      }
    }

      data.data_type = type
      let data_string = JSON.stringify(data)
      xml.open("POST", "api.php", true)

      xml.send(data_string)

  }
</script>
