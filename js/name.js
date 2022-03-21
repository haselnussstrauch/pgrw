function nameAuswahlChanged(id) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('name_details').innerHTML=this.responseText;
      }
    };
    xmlhttp.open("GET","php/name.ajax.php?action=get_details_table&id="+id,true);
    xmlhttp.send();

    document.getElementById("projekt_id").value = id;
}

function addName() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

        obj = JSON.parse(this.responseText);

        document.getElementById('name_details').innerHTML=obj.html;
        reloadSelect(obj.id);

      }
    };

    var name = encodeURIComponent(document.getElementById("filter_name").value);

    xmlhttp.open("GET","php/name.ajax.php?action=add&name="+name,true);
    xmlhttp.send();
}

function rename(id) {

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

      obj = JSON.parse(this.responseText);

      document.getElementById('name_details').innerHTML=obj.html;
      reloadSelect(obj.id);

    }
  };

  var name = encodeURIComponent(document.getElementById("neuerName").value);

  xmlhttp.open("GET","php/name.ajax.php?action=rename&name="+name+"&id="+id,true);
  xmlhttp.send();
}

function reloadSelect(id) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('herstellerAuswahlSelect').innerHTML=this.responseText;
      }
    };
    xmlhttp.open("GET","php/name.ajax.php?action=get_select&id="+id,true);
    xmlhttp.send();
} 

function addStimme(id){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        obj = JSON.parse(this.responseText);

        document.getElementById('name_details').innerHTML=obj.html;
        reloadSelect(obj.id);
      }
    };
    xmlhttp.open("GET","php/name.ajax.php?action=add_stimme&id="+id,true);
    xmlhttp.send();
}

function delStimme(id){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      obj = JSON.parse(this.responseText);

      document.getElementById('name_details').innerHTML=obj.html;
      reloadSelect(obj.id);
    }
  };
  xmlhttp.open("GET","php/name.ajax.php?action=del_stimme&id="+id,true);
  xmlhttp.send();
}