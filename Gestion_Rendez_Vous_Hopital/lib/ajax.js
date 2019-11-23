/*function numTelPatientSuggestion()
{
    var tel = document.getElementById('tel');
    var xhr;
    if(window.XMLHttpRequest)
    {
        xhr = new XMLHttpRequest();
    }
    else if ( window.ActiveXObject)
    {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var data = "numTel" + tel;
        xhr.open("POST","TelPatient.php",true);
        xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        xhr.send(data);
        xhr.onreadystatechange = display_data;
    function display_data()
    {
        if (xhr.readyState == 4)
        {
            if(xhr.status == 200)
            {
                document.getElementById("suggestion").innerHTML = xhr.responseText;
            }
            else
            {
                alert("Erreur avec la requete!!!")
            }
        }
    }
}
*/
function tel_suggestion()
{
var tel = document.getElementById("num_tel").value;
var xhr;
 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
var data = "tel_name=" + tel;
     xhr.open("POST", "lib/TelPatient.php", true); 
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
     xhr.send(data);
	 xhr.onreadystatechange = display_data;
	function display_data() {
	 if (xhr.readyState == 4) {
      if (xhr.status == 200) {
       //alert(xhr.responseText);	   
	  document.getElementById("suggestion").innerHTML = xhr.responseText;
      } else {
        alert('There was a problem with the request.');
      }
     }
    }
    if(num_tel.value.length != 9)
    {
        document.getElementById("id_patient").value = ""
    }
}
    mes_liens = document.getElementById("suggestion")
    mes_liens.addEventListener("click", function(e)
    {
      
        var my_classe = e.target.className
        if (my_classe === "lien")
        {
            if (e.target.innerHTML)
            {
                document.getElementById("num_tel").value = e.target.innerHTML;
                
                document.getElementById("id_patient").value = e.target.nextSibling.nextSibling.nextSibling.nextSibling.innerHTML;
                mes_liens.style.visibility="hidden";
                
            }
            else
            {
                document.getElementById("num_tel").value = e.target.textContent;
                document.getElementById("id_patient").value = e.target.nextSibling.nextSibling.nextSibling.nextSibling.innerHTML;
            }
        }
        e.preventDefault();
        e.stopPropagation();
    },false);
    