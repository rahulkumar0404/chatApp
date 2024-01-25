<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ChapApp</title>
    <link href="style.css" rel="stylesheet" />
  </head>
  <body>
    <div id="wrapper">
      <div id="left_pannel">
        <div style="padding: 10px">
          <img id="profile_pannel_img" src="./ui/images/user3.jpg" />
          <br />
          Kelly Hardson
          <br />
          <span style="font-size: 14px; opacity: 0.5"
            >kellyhardson@gmail.com</span
          >
        </div>
        <br />
        <br />
        <br />
        <br />
        <div style="display: flex; flex-direction: column; margin-left: 10px">
          <label for="radio_chat" id="label_chat"
            >Chat <img src="ui/icons/chat.png"
          /></label>
          <label for="radio_contacts" id="label_contacts"
            >Contacts <img src="ui/icons/contacts.png"
          /></label>
          <label for="radio_settings" id="label_settings"
            >Settings <img src="ui/icons/settings.png"
          /></label>
        </div>
      </div>
      <div id="right_pannel">
        <div id="header">
          <p>My Chat</p>
        </div>
        <div id="container" style="display: flex">
          <div id="inner_left_pannel"></div>
          <input
            type="radio"
            id="radio_chat"
            name="my-chat"
            style="display: none"
          />
          <input
            type="radio"
            id="radio_contacts"
            name="my-chat"
            style="display: none"
          />
          <input
            type="radio"
            id="radio_settings"
            name="my-chat"
            style="display: none"
          />
          <div id="inner_right_pannel"></div>
        </div>
      </div>
    </div>
  </body>
</html>

<script type="text/javascript">
  function _(element) {
    return document.getElementById(element);
  }
  let label = _('label_chat');

  label.addEventListener('click', function () {
    let inner_pannel = _('inner_left_pannel');
    let ajax = new XMLHttpRequest();

    ajax.onload = function () {
      console.log(ajax.status);
      if (ajax.status == 200 || ajax.readyState == 4) {
        inner_pannel.innerHTML = ajax.responseText;
      }
    };

    ajax.open('POST', 'file.php', true);

    ajax.send();
  });
</script>
