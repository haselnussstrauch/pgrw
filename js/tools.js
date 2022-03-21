function filter(id_search, id_select) {

    var keyword = document.getElementById(id_search).value;
    var select = document.getElementById(id_select);

    if(keyword.toLowerCase().substring(0,4) == "#id:")
    {
        var id = keyword.toLowerCase().split(':')[1];
        for (var i = 0; i < select.length; i++) {
            if(select.options[i].value == id)
            {
                //found
                $(select.options[i]).removeAttr('disabled');
                $(select.options[i]).show();
            }
            else
            {
                $(select.options[i]).attr('disabled', 'disabled');
                $(select.options[i]).hide();
            }
        }

        select.value=id;
    }
    else
    {
        for (var i = 0; i < select.length; i++) {
            var txt = select.options[i].text.toLowerCase();
            if (!txt.match(keyword.toLowerCase())) {
                $(select.options[i]).attr('disabled', 'disabled');
                $(select.options[i]).hide();
            } else {
                $(select.options[i]).removeAttr('disabled');
                $(select.options[i]).show();
            }
    
        }
    }
  }

function logIn()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

        location.reload();

      }
    };

    var pass = document.getElementById("pass").value;

    xmlhttp.open("GET","php/login.php?pass="+pass,true);
    xmlhttp.send();
}